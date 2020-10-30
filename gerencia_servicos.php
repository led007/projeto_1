<?php 
include_once('bd/conexao.php');

$acao = $_GET['acao'] ?? 'redirect';
//deletar, salvar, alterar

if(isset($_GET['id']) && $acao == 'deletar') {
	$id = $_GET['id'];

	$sql = "DELETE FROM servicos WHERE id = {$id}";
	if(mysqli_query($conexao, $sql)){
	$mensagem = 'Excluído com sucesso!';
	$alert = 'success';

	}else {
		$mensagem = 'Erro ao tentar excluir, verifique se o dado não está relacionado com outro registro!';
		$alert = 'danger';
	}


	
	header("Location: servicos.php?mensagem={$mensagem}&alert={alert}");

} else if ($acao == 'salvar') {

$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$categoria_id = $_POST['categoria_id'];
$usuario_id = $_POST['usuario_id'];
$id = $_POST['id'];

if($id == ''){

	$sql = "INSERT INTO servicos 
			(codigo,  nome,  descricao,  preco, categoria_id,  usuario_id ) 
			VALUES
			('$codigo', '$nome', '$descricao', '$preco', '$categoria_id', '$usuario_id');";
} else {
	$sql = "UPDATE servicos 
			SET
				codigo = '{$codigo}',
				nome = '{$nome}',
				descricao = '{$descricao}',
				preco = '{$preco}',
				categoria_id = '{$categoria_id}',
				usuario_id = '{$usuario_id}'
			WHERE id = $id";
}



	if(mysqli_query($conexao, $sql)) {
		$mensagem = 'Salvo com sucesso!';
		$alert = 'success';

	}else {
		$mensagem = 'Erro ao salvar: ' . mysqli_error($conexao);
		$alert = 'danger';
	}

	header("Location: servicos.php?mensagem={$mensagem}&alert=$alert");

}

?>