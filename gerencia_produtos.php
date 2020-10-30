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

	header("Location: produtos.php?mensagem={$mensagem}&alert={$alert}");

} else if ($acao == 'salvar') {

	$codigo = $_POST['codigo'];
	$nome = $_POST['nome'];
	$categoria_id = $_POST['categoria_id'];
	$estoque = $_POST['estoque'];
	$data_compra = $_POST['data_compra'];
	$usuario_id = $_POST['usuario_id'];
	$preco = $_POST['preco'];
	$id = $_POST['id'];

	if($codigo == '' || $nome == '' || $preco == ''){

		$mensagem = "Código, Nome e Preço são obrigatórios";

		header("Location: form_produtos.php?mensagem=}$mensagem}&alert=danger");
		exit;
	}
	
	if($id == ''){
		$sql = "INSERT INTO produtos 
			(codigo, nome, categoria_id, estoque, data_compra, usuario_id, preco) 
			VALUES
			('$codigo', '$nome', '$categoria_id', '$estoque', '$data_compra', '$usuario_id', $preco);";
	} else {
		$sql = "UPDATE produtos
				SET 
					codigo 			= '{$codigo}',
					nome 			= '{$nome}',
					categoria_id 	= '{$categoria_id}',
					estoque 		= '{$estoque}',
					data_compra 	= '{$data_compra}',
					usuario_id 		= '{$usuario_id}',
					preco 			= '{$preco}'
				WHERE id = $id";
	}

	if(mysqli_query($conexao, $sql)) {
		$mensagem = 'Salvo com sucesso!';
		$alert = 'success';

	}else {
		$mensagem = 'Erro ao salvar: ' . mysqli_error($conexao);
		$alert = 'danger';
	}

	header("Location: produtos.php?mensagem={$mensagem}&alert={$alert}");

}

?>