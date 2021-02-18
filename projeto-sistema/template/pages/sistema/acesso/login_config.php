<?php
  session_start();
  
  $nome = $_POST['name_user'];
  $senha = $_POST['password_user'];

  require('../../../conect_bd.php');

  $result = "SELECT * FROM users WHERE name_user = '$nome' AND password_user = '$senha'";

  if(($result) > 0 )
  {
    $_SESSION['name_user'] = $nome;
    $_SESSION['password_user'] = $senha;
    header('location:../../../index.php');
  }
  else{
      unset ($_SESSION['name_user']);
      unset ($_SESSION['password_user']);
      header('location:login_user.php');
    }
?>