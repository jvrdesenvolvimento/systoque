<?php
// Conex�o com o banco de dados
require "comum.php";

// Inicia sess�es
session_start();

// Recupera o login
$email = isset($_POST["email"]) ? addslashes(trim($_POST["email"])) : FALSE;
// Recupera a senha, a criptografando em MD5
$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE;

// Usu�rio n�o forneceu a senha ou email
if(!$email || !$senha)
{
    echo "Favor preencher e-mail e senha!";
    exit;
}

/*
* Executa a consulta no banco de dados.
* Caso o n�mero de linhas retornadas seja 1 o email � v�lido,
* caso 0, inv�lido.
*/
$SQL = "SELECT id, nome, email, senha, tipo
        FROM usuario
        WHERE email = '" . $email . "'";
$result_id = @mysql_query($SQL) or die("Erro no banco de dados!");
$total = @mysql_num_rows($result_id);

// Caso o usu�rio tenha digitado um email v�lido o n�mero de linhas ser� 1..
if($total)
{
    // Obt�m os dados do usu�rio, para poder verificar a senha e passar os demais dados para a sess�o
    $dados = @mysql_fetch_array($result_id);

    // Agora verifica a senha
    if(!strcmp($senha, $dados["senha"]))
    {
        // TUDO OK! Agora, passa os dados para a sess�o e redireciona o usu�rio
        $_SESSION["id_usuario"]   = $dados["id"];
        $_SESSION["nome_usuario"] = stripslashes($dados["nome"]);
        $_SESSION["permissao"]    = $dados["tipo"];
        header("Location: index.php");
        exit;
    }
    // Senha inv�lida
    else
    {
        echo "Senha inv�lida!";
        exit;
    }
}
// Email inv�lido
else
{
    echo "E-mail inexistente!";
    exit;
}
?>