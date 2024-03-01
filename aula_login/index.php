<?php
  include('conexao.php');

  if(isset($_POST['email']) || isset($_POST['senha'])){
    if(strlen($_POST['email']) == 0) {
        echo"prencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo 'prencha sua senha';
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha =$mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM cadastrados WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die('Falha na execução do código sql:' . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("location: painel.php");

        } else{
            echo"Falha ao logar!";
        }
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <form action="" method="POST">
        <h1>Acessar Conta</h1>
       <p>
         <label for="">E-mail</label>
         <input type="text" name="email">
       </p>
       <p>
         <label for="">Senha</label>
         <input type="text" name="senha">
       </p>
       <p>
          <Button type="submit">Entrar</Button>
       </p>
    </form>
</body>
</html>