// Máscara de moeda brasileira para inputs
export function initCurrencyMask() {
    const currencyInputs = document.querySelectorAll('.currency-input');
    
    currencyInputs.forEach(input => {
        // Formatar valor inicial se existir
        if (input.value && input.value !== '') {
            const numValue = parseFloat(input.value);
            if (!isNaN(numValue)) {
                input.value = formatCurrencyDisplay(numValue);
            }
        }
        
        // Adicionar evento de input
        input.addEventListener('input', function(e) {
            let value = e.target.value;
            
            // Remove tudo exceto números
            value = value.replace(/\D/g, '');
            
            // Se vazio, limpa o campo
            if (value === '') {
                e.target.value = '';
                return;
            }
            
            // Converte para número e divide por 100 (centavos)
            value = (parseInt(value) || 0) / 100;
            
            // Formata como moeda
            e.target.value = formatCurrencyDisplay(value);
        });
        
        // Antes de submeter o form, converte para formato numérico
        const form = input.closest('form');
        if (form && !form.hasAttribute('data-currency-listener')) {
            form.setAttribute('data-currency-listener', 'true');
            
            form.addEventListener('submit', function(e) {
                currencyInputs.forEach(currInput => {
                    if (currInput.value && currInput.value !== '') {
                        const numericValue = parseCurrencyValue(currInput.value);
                        
                        // Cria input hidden com valor numérico
                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = currInput.getAttribute('name');
                        hiddenInput.value = numericValue;
                        
                        // Remove o name do input visível
                        currInput.removeAttribute('name');
                        
                        form.appendChild(hiddenInput);
                    }
                });
            });
        }
    });
}

// Formata valor para exibição (R$ 1.234,56)
function formatCurrencyDisplay(value) {
    const numValue = typeof value === 'string' ? parseFloat(value) : value;
    
    if (isNaN(numValue)) return 'R$ 0,00';
    
    return numValue.toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

// Converte valor formatado de volta para número (1234.56)
function parseCurrencyValue(value) {
    if (typeof value !== 'string') return value;
    
    // Remove R$, pontos de milhar e substitui vírgula por ponto
    const cleaned = value
        .replace('R$', '')
        .replace(/\s/g, '')
        .replace(/\./g, '')
        .replace(',', '.');
    
    return parseFloat(cleaned) || 0;
}
