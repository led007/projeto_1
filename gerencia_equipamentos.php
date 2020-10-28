<?php 
include_once('bd/conexao.php');

$acao = $_GET['acao'] ?? 'redirect';
//deletar, salvar, alterar

if(isset($_GET['id']) && $acao == 'deletar') {
	$id = $_GET['id'];

	$sql = "DELETE FROM equipamentos WHERE id = {$id}";


	if(mysqli_query($conexao, $sql)) {
		$mensagem = 'Excluído com sucesso!';
		$alert = 'success';

	}else {
		$mensagem = 'Erro ao tentar excluir, verifique se o dado não está relacionado com outro registro!';
		$alert = 'danger';

	}


	header("Location: equipamentos.php?mensagem={$mensagem}&alert={$alert}");
} else if($acao == 'salvar') {
	
	$codigo = $_POST['codigo'];
	$nome = $_POST['nome'];
	$categoria = $_POST['categoria'];
	$preco = $_POST['preco'];
	$data = $_POST['data_compra'];

	$sql = "INSERT INTO equipamentos 
			(nome, categoria, preco, data_compra, codigo) 
			VALUES
			('$nome', '$categoria','$preco', '$data_compra', '$codigo');";


	mysqli_query($conexao, $sql);
	

	$mensagem = 'Salvo com sucesso!';

	header("Location: equipamentos.php?mensagem={$mensagem}&alert=success");

}



 ?>