<?php
$senha = "1234";
// não usar pois é fácil de descobrir $criptografada = md5($senha);
$hash = password_hash($senha, PASSWORD_DEFAULT);
//$sql = "SELECT * FROM usuarios WHERE senha = '$criptografada'";
echo $hash;
//echo password_verify($senha, '$2y$10$Dh/NBSgzvjnzyGCLOP8tmeue0YLgxTnZetjN6tFXfN3XBgjJbPynq');
?>