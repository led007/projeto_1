<?php 
include_once('bd/conexao.php');

$acao = $_GET['acao'] ?? 'redirect';
//deletar, salvar, alterar

if(isset($_GET['id']) && $acao == 'deletar') {
	$id = $_GET['id'];

	$sql = "DELETE FROM categoria WHERE id = {$id}";

	$qr = mysqli_query($conexao, $sql);

	$mensagem = 'Excluído com sucesso!';

	header("Location: categorias.php?mensagem={$mensagem}&alert=success");
} else if($acao == 'salvar') {

	$categoria = $_POST['categoria'];
	$tipo = $_POST['tipo'];

	$sql = "INSERT INTO categoria (categoria, tipo) VALUES ('$categoria', '$tipo');";

	if(mysqli_query($conexao, $sql)) {
		$mensagem = 'Salvo com sucesso!';
		$alert = 'success';

	}else {
		$mensagem = 'Erro ao salvar: ' . mysqli_error($conexao);
		$alert = 'danger';
	}

	header("Location: categorias.php?mensagem={$mensagem}&alert={$alert}");
}



 ?>