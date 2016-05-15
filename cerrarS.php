<?php
 session_start();
  unset($_SESSION["nombre_cliente"]);
  unset($_SESSION["codigo_cliente"]);
  unset($_SESSION["id_cliente"]);
  session_destroy();
  header("Location: index.php");
  exit;
?>