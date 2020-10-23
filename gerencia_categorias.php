<?php 
include_once('bd/conexao.php');

if(isset($_GET['id'])) {
	$id = $_GET['id'];

	$sql = "DELETE FROM categoria WHERE id = {$id}";

	$qr = mysqli_query($conexao, $sql);

	$mensagem = 'Excluído com sucesso!';

	header("Location: categorias.php?mensagem={$mensagem}&alert=success");
}



 ?>