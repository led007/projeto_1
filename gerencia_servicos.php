<?php 
include_once('bd/conexao.php');

if(isset($_GET['id'])) {
	$id = $_GET['id'];

	$sql = "DELETE FROM servicos WHERE id = {$id}";

	$qr = mysqli_query($conexao, $sql);

	$mensagem = 'Excluído com sucesso!';

	header("Location: servicos.php?mensagem={$mensagem}&alert=success");
}
