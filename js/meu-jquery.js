

        const quantidade = document.getElementById('quantidade');
        const adicionar = document.getElementById('adicionar-unidade');
        const remover = document.getElementById('remover-unidade');
        
        function atualizar(mudanca) {
            // Obtém o valor atual do input e converte para número
            let valor = parseInt(quantidade.value, 10);
            
            // Verifica se o valor atual não é um número, e se for, inicializa com 0
            if (isNaN(valor)) {
                valor = 1;
            }
            
            // Atualiza o valor com base na mudança
            valor += mudanca;
            
            if (valor < 0) {
                valor = 1;
            }

            // Define o novo valor no input
            quantidade.value = valor;
        }

        // Adiciona um event listener ao botão de incremento
        adicionar.addEventListener('click', function() {
            atualizar(1);
        });

        // Adiciona um event listener ao botão de decremento
        remover.addEventListener('click', function() {
            atualizar(-1);
        });