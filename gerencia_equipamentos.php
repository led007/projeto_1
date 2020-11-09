<?php 
include_once('bd/conexao.php');

$acao = $_GET['acao'] ?? 'redirect';
//deletar, salvar, alterar

if(isset($_GET['id']) && $acao == 'deletar') {
	$id = $_GET['id'];

	$sql = "DELETE FROM produtos WHERE id = {$id}";


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
	$categoria_id = $_POST['categoria_id'];
	$preco = $_POST['preco'];
	$codigo = $_POST['codigo'];
	$data_compra = $_POST['data_compra'] . ' ' . date('H:m:i');
	$id = $_POST['id'];

	if($id == '') {
		$sql = "INSERT INTO produtos 
				(nome, categoria_id, preco, data_compra, codigo, usuario_id) 
				VALUES
				('$nome', '$categoria_id','$preco', '$data_compra','$codigo', 1);";
	} else {
		$sql = "UPDATE produtos SET
					nome = '{$nome}',
					categoria_id = '{$categoria_id}',
					preco = '{$preco}',
					data_compra = '{$data_compra}',
					codigo = '{$codigo}'
				WHERE id = {$id}";
	}


	if(mysqli_query($conexao, $sql)) {
		$mensagem = 'Salvo com sucesso!';
		$alert = 'success';

	}else {
		$mensagem = 'Erro ao salvar: ' . mysqli_error($conexao);
		$alert = 'danger';
	}
	


	header("Location: equipamentos.php?mensagem={$mensagem}&alert={$alert}");

} else if(isset($_GET['id']) && $acao == 'get') {
	$id = $_GET['id'];

	$sql = "SELECT nome, categoria_id, preco, DATE_FORMAT(data_compra, '%d/%m/%Y às %H:%i:%s') as data_compra, codigo FROM produtos WHERE id = {$id}";
	$qr = mysqli_query($conexao, $sql);
	$produto = mysqli_fetch_assoc($qr);
	echo json_encode($produto);
}



 ?>