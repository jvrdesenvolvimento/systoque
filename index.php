<?php
// Verificador de sessão
require "verifica.php";

// Conexão com o banco de dados
require "comum.php";

// Imprime mensagem de boas vindas
echo "<center><h1><font face=\"Verdana\" size=2>Bem-Vindo " . $_SESSION["nome_usuario"] . "!<BR>\n</h1></center>";


?>