<?php
/* Conecta-se com o MySQL
 * sintaxe: lugar do banco, usu�rio, senha
 * Aqui em casa eu utilizo senha no banco de dados, caso voc�s n�o utilizem, ou utilizem outra basta modificar o campo abaixo
 */
mysql_connect("localhost", "root", "root");

// Seleciona banco de dados
mysql_select_db("systoque");
?>