<?php
/*O usu�rio e senha padr�o s�o -> email = admin , senha = admin;
 * O c�digo abaixo mostra a convers�o de uma senha para criptografia md5, utilizei para cadastrar o primeiro usu�rio manualmente no banco de dados.
 * Caso queiram gerar novas senhas basta trocar admin pela senha desejada no c�digo abaixo.
 * Para acessar este arquivo cole este link no seu browser -> http://localhost/systoque/senha.php
 */
echo md5("admin");

?>