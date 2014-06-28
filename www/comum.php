<?php
/* Conecta-se com o MySQL
 * sintaxe: lugar do banco, usuário, senha
 * Aqui em casa eu utilizo senha no banco de dados, caso vocês não utilizem, ou utilizem outra basta modificar o campo abaixo
 */
mysql_connect("localhost", "root", "root");

// Seleciona banco de dados
mysql_select_db("systoque");
?>