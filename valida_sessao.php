<?php 
session_start();
$pagina_atual = explode('/', $_SERVER['PHP_SELF']);

if(end($pagina_atual) != 'index.php' && !isset($_SESSION['nome'])){
  session_destroy();
  header("Location: index.php?alert=danger&mensagem=Sem permissão de acesso.");
  exit;
} 
?>