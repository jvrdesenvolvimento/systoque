<?php
// Conexão com o banco de dados
require "comum.php";

// Inicia sessões
session_start();

// Recupera o login
$email = isset($_POST["email"]) ? addslashes(trim($_POST["email"])) : FALSE;
// Recupera a senha, a criptografando em MD5
$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE;

// Usuário não forneceu a senha ou email
if(!$email || !$senha)
{
    echo "Favor preencher e-mail e senha!";
    exit;
}

/*
* Executa a consulta no banco de dados.
* Caso o número de linhas retornadas seja 1 o email é válido,
* caso 0, inválido.
*/
$SQL = "SELECT id, nome, email, senha, tipo
        FROM usuario
        WHERE email = '" . $email . "'";
$result_id = @mysql_query($SQL) or die("Erro no banco de dados!");
$total = @mysql_num_rows($result_id);

// Caso o usuário tenha digitado um email válido o número de linhas será 1..
if($total)
{
    // Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão
    $dados = @mysql_fetch_array($result_id);

    // Agora verifica a senha
    if(!strcmp($senha, $dados["senha"]))
    {
        // TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário
        $_SESSION["id_usuario"]   = $dados["id"];
        $_SESSION["nome_usuario"] = stripslashes($dados["nome"]);
        $_SESSION["permissao"]    = $dados["tipo"];
        header("Location: index.php");
        exit;
    }
    // Senha inválida
    else
    {
        echo "Senha inválida!";
        exit;
    }
}
// Email inválido
else
{
    echo "E-mail inexistente!";
    exit;
}
?>