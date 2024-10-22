<!DOCTYPE html>
<?php 

$message = array_key_exists('message',$_SESSION) ? $_SESSION['message'] : false ;
var_dump($message);
var_dump($_SESSION);
if($message){
    echo "<script>alert('" . $message . "')</script>";
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuario</title>
</head>
<body>
    
    <button></button>

    <form method="post" action="">
    <label for="Name">Nome </label><input type="text" id="Name" name="Name" />
    <label for="User">Usuario </label><input type="text" id="User" name="User" />
    <label for="Password">Senha </label><input type="text" id="Password" name="Senha" />
    <input type="submit"/>
    </form>
</body>
</html>