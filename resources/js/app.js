import './bootstrap';
import '../css/app.css';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Inicializar máscara de moeda quando o DOM estiver pronto
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM carregado - inicializando máscaras');
    
    initCurrencyMask();
    initDateMask();
    initPhoneMask();
    initTimeMask();
});

// MÁSCARA DE MOEDA
function initCurrencyMask() {
    const currencyInputs = document.querySelectorAll('.currency-input');
    console.log('Inputs de moeda encontrados:', currencyInputs.length);
    
    currencyInputs.forEach(input => {
        console.log('Aplicando máscara de moeda em:', input.id);
        
        // Formatar valor inicial se existir
        if (input.value && input.value !== '') {
            const numValue = parseFloat(input.value);
            if (!isNaN(numValue)) {
                input.value = formatCurrency(numValue);
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
            e.target.value = formatCurrency(value);
        });
        
        // Antes de submeter o form, converte para formato numérico
        const form = input.closest('form');
        if (form && !form.hasAttribute('data-currency-listener')) {
            form.setAttribute('data-currency-listener', 'true');
            
            form.addEventListener('submit', function(e) {
                currencyInputs.forEach(currInput => {
                    if (currInput.value && currInput.value !== '') {
                        const numericValue = parseCurrency(currInput.value);
                        
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
function formatCurrency(value) {
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
function parseCurrency(value) {
    if (typeof value !== 'string') return value;
    
    // Remove R$, pontos de milhar e substitui vírgula por ponto
    const cleaned = value
        .replace('R$', '')
        .replace(/\s/g, '')
        .replace(/\./g, '')
        .replace(',', '.');
    
    return parseFloat(cleaned) || 0;
}

// MÁSCARA DE DATA
function initDateMask() {
    const dateInputs = document.querySelectorAll('.date-input');
    console.log('Inputs de data encontrados:', dateInputs.length);
    
    dateInputs.forEach(input => {
        console.log('Aplicando máscara de data em:', input.id);
        
        // Formatar valor inicial se existir (formato ISO para BR)
        if (input.value && input.value !== '') {
            input.value = formatDateDisplay(input.value);
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
            
            // Aplica a máscara DD/MM/YYYY
            if (value.length <= 2) {
                e.target.value = value;
            } else if (value.length <= 4) {
                e.target.value = value.slice(0, 2) + '/' + value.slice(2);
            } else {
                e.target.value = value.slice(0, 2) + '/' + value.slice(2, 4) + '/' + value.slice(4, 8);
            }
        });
        
        // Antes de submeter o form, converte para formato ISO (YYYY-MM-DD)
        const form = input.closest('form');
        if (form && !form.hasAttribute('data-date-listener')) {
            form.setAttribute('data-date-listener', 'true');
            
            form.addEventListener('submit', function(e) {
                dateInputs.forEach(dateInput => {
                    if (dateInput.value && dateInput.value !== '') {
                        const isoDate = parseDate(dateInput.value);
                        
                        if (isoDate) {
                            // Cria input hidden com valor ISO
                            const hiddenInput = document.createElement('input');
                            hiddenInput.type = 'hidden';
                            hiddenInput.name = dateInput.getAttribute('name');
                            hiddenInput.value = isoDate;
                            
                            // Remove o name do input visível
                            dateInput.removeAttribute('name');
                            
                            form.appendChild(hiddenInput);
                        }
                    }
                });
            });
        }
    });
}

// Formata data ISO (2025-12-08) para exibição (08/12/2025)
function formatDateDisplay(value) {
    if (!value) return '';
    
    // Se já está no formato DD/MM/YYYY, retorna
    if (value.includes('/')) return value;
    
    // Se está no formato ISO (YYYY-MM-DD)
    if (value.includes('-')) {
        const parts = value.split('-');
        if (parts.length === 3) {
            return `${parts[2]}/${parts[1]}/${parts[0]}`;
        }
    }
    
    return value;
}

// Converte data BR (DD/MM/YYYY) para ISO (YYYY-MM-DD)
function parseDate(value) {
    if (!value || typeof value !== 'string') return '';
    
    // Se já está no formato ISO, retorna
    if (value.match(/^\d{4}-\d{2}-\d{2}$/)) return value;
    
    // Se está no formato DD/MM/YYYY
    const match = value.match(/^(\d{2})\/(\d{2})\/(\d{4})$/);
    if (match) {
        const [, day, month, year] = match;
        return `${year}-${month}-${day}`;
    }
    
    return '';
}

// MÁSCARA DE TELEFONE
function initPhoneMask() {
    const phoneInputs = document.querySelectorAll('.phone-input');
    console.log('Inputs de telefone encontrados:', phoneInputs.length);
    
    phoneInputs.forEach(input => {
        console.log('Aplicando máscara de telefone em:', input.id);
        
        // Formatar valor inicial se existir
        if (input.value && input.value !== '') {
            input.value = formatPhoneDisplay(input.value);
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
            
            // Aplica a máscara (XX) XXXXX-XXXX ou (XX) XXXX-XXXX
            e.target.value = formatPhoneDisplay(value);
        });
    });
}

// Formata telefone para exibição
function formatPhoneDisplay(value) {
    if (!value) return '';
    
    // Remove tudo exceto números
    value = value.replace(/\D/g, '');
    
    // Aplica a máscara conforme o tamanho
    if (value.length <= 2) {
        return `(${value}`;
    } else if (value.length <= 6) {
        return `(${value.slice(0, 2)}) ${value.slice(2)}`;
    } else if (value.length <= 10) {
        return `(${value.slice(0, 2)}) ${value.slice(2, 6)}-${value.slice(6)}`;
    } else {
        // Celular com 9 dígitos
        return `(${value.slice(0, 2)}) ${value.slice(2, 7)}-${value.slice(7, 11)}`;
    }
}

// MÁSCARA DE HORA
function initTimeMask() {
    const timeInputs = document.querySelectorAll('.time-input');
    console.log('Inputs de hora encontrados:', timeInputs.length);
    
    timeInputs.forEach(input => {
        console.log('Aplicando máscara de hora em:', input.id);
        
        // Formatar valor inicial se existir
        if (input.value && input.value !== '') {
            input.value = formatTimeDisplay(input.value);
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
            
            // Limita a 4 dígitos
            if (value.length > 4) {
                value = value.slice(0, 4);
            }
            
            // Aplica a máscara HH:MM
            if (value.length <= 2) {
                e.target.value = value;
            } else {
                e.target.value = value.slice(0, 2) + ':' + value.slice(2, 4);
            }
        });
        
        // Validação ao sair do campo
        input.addEventListener('blur', function(e) {
            const value = e.target.value;
            if (value && value.length === 5) {
                const [hours, minutes] = value.split(':');
                const h = parseInt(hours);
                const m = parseInt(minutes);
                
                // Valida hora (00-23) e minutos (00-59)
                if (h > 23 || m > 59) {
                    alert('Hora inválida! Use o formato HH:MM (00:00 até 23:59)');
                    e.target.value = '';
                }
            }
        });
    });
}

// Formata hora para exibição (HH:MM)
function formatTimeDisplay(value) {
    if (!value) return '';
    
    // Se já tem :, retorna
    if (value.includes(':')) return value;
    
    // Remove tudo exceto números
    value = value.replace(/\D/g, '');
    
    if (value.length <= 2) {
        return value;
    } else {
        return value.slice(0, 2) + ':' + value.slice(2, 4);
    }
}
