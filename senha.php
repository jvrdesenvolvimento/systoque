<?php
/*O usuário e senha padrão são -> email = admin , senha = admin;
 * O código abaixo mostra a conversão de uma senha para criptografia md5, utilizei para cadastrar o primeiro usuário manualmente no banco de dados.
 * Caso queiram gerar novas senhas basta trocar admin pela senha desejada no código abaixo.
 * Para acessar este arquivo cole este link no seu browser -> http://localhost/systoque/senha.php
 */
echo md5("admin");

?>