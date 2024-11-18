<?php

require_once('conexao.php');

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Limpeza e validação dos dados
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $celular = trim($_POST['cel']);
    $senha = password_hash(trim($_POST['senha']), PASSWORD_DEFAULT); // Usar password_hash
    $cpf = trim($_POST['cpf']);
    $cep = trim($_POST['cep']);
    $rua = trim($_POST['rua']);
    $bairro = trim($_POST['bairro']);
    $cidade = trim($_POST['cidade']);
    $complemento = trim($_POST['complemento']);
    $estado = trim($_POST['estado']);
    $n_casa = trim($_POST['numero_casa']);

    $objDb = new db();
    $link = $objDb->conectar();

    // Usar prepared statement para evitar SQL Injection
    $stmt = $link->prepare("SELECT * FROM cliente WHERE NOME_CLIENTE = ?");
    $stmt->bind_param("s", $nome);
    $stmt->execute();
    $resultado = $stmt->get_result()->fetch_assoc();

    if ($resultado) {
        echo "Usuário já existe.";
    } else {
        // Inserir o novo cliente
        $stmt = $link->prepare("INSERT INTO cliente (NOME_CLIENTE, EMAIL_CLIENTE, CELULAR, SENHA_CLIENTE, CPF_CLIENTE) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nome, $email, $celular, $senha, $cpf);

        if ($stmt->execute()) {
            $ultimo_id = $stmt->insert_id;

            // Inserir o endereço
            $stmt = $link->prepare("INSERT INTO endereco (CEP, RUA, BAIRRO, CIDADE, ESTADO, NUMERO_CASA, COMPLEMENTO, N_CLIENTE) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $cep, $rua, $bairro, $cidade, $estado, $n_casa, $complemento, $ultimo_id);

            if ($stmt->execute()) {
                // Atualizar ID do cliente
                $ultimo_id_endereco = $stmt->insert_id;

                $stmt = $link->prepare("UPDATE cliente SET ID_ENDERECO = ? WHERE ID_CLIENTE = ?");
                $stmt->bind_param("ii", $ultimo_id_endereco, $ultimo_id);

                if ($stmt->execute()) {
                    echo 'ID atualizado';
                    
                } else {
                    echo 'Erro ao atualizar ID';
                }

                session_start();
                $_SESSION['usuario'] = $nome;
                $_SESSION['id_usuario'] = $ultimo_id;

                header('Location:meusdados.php');
                exit();
            } else {
                echo 'Erro ao cadastrar endereço';
            }
        } else {
            echo 'Erro ao cadastrar usuário';
        }
    }

    $stmt->close();
    $link->close();
}
?>
