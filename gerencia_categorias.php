<?php
include_once('valida_sessao.php');
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
	$id = $_POST['id'];

	if($id == '') {
		$sql = "INSERT INTO categoria (categoria, tipo) VALUES ('$categoria', '$tipo');";
	} else {
		$sql = "UPDATE categoria SET 
					categoria = '{$categoria}', 
					tipo = '{$tipo}'
				WHERE id = {$id}";
	}

	if(mysqli_query($conexao, $sql)) {
		$mensagem = 'Salvo com sucesso!';
		$alert = 'success';

	}else {
		$mensagem = 'Erro ao salvar: ' . mysqli_error($conexao);
		$alert = 'danger';
	}

	header("Location: categorias.php?mensagem={$mensagem}&alert={$alert}");
}else if(isset($_GET['id']) && $_GET['id'] != '' && $_GET['acao'] == 'get' ) {
	$id = $_GET['id'];
	$sql = "SELECT categoria, tipo FROM categoria WHERE id = {$id}";
	$qr = mysqli_query($conexao, $sql);
	$categoria = mysqli_fetch_assoc($qr);

	echo json_encode($categoria);
}



 ?>