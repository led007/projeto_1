<?php 
include_once('bd/conexao.php');

$acao = $_GET['acao'] ?? 'redirect';
//deletar, salvar, alterar

if(isset($_GET['id']) && $acao == 'deletar') {
	$id = $_GET['id'];

	$sql = "DELETE FROM fornecedores WHERE id = {$id}";


	if(mysqli_query($conexao, $sql)) {
		$mensagem = 'Excluído com sucesso!';
		$alert = 'success';

	}else {
		$mensagem = 'Erro ao tentar excluir, verifique se o dado não está relacionado com outro registro!';
		$alert = 'danger';

	}


	header("Location: fornecedores.php?mensagem={$mensagem}&alert={$alert}");
} else if($acao == 'salvar') {
	
	$cnpj = $_POST['cpf'];
	$fantasia = $_POST['fantasia'];
	$razao_social = $_POST['razao_social'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
	$nome_contato = $_POST['nome_contato'];
	$cep = $_POST['cep'];
	$logradouro = $_POST['logradouro'];
	$numero = $_POST['numero'];
	$complemento = $_POST['complemento'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$id = $_POST['id'];

	if($id == ''){

		$sql = "INSERT INTO fornecedores 
			(razao_social, fantasia, cnpj, email, telefone, nome_contato, cep ,logradouro, numero, complemento, bairro, cidade, estado,usuario_id) 
			VALUES
			('$razao_social', '$fantasia','$cnpj', '$email', '$telefone', '$nome_contato', '$cep','$logradouro','$numero', '$complemento', '$bairro', '$cidade', '$estado','1');";


	}else {
		$sql = "UPDATE fornecedores SET 
		razao_social = '{$razao_social}',
		fantasia = '{$fantasia}',
		cnpj = '{$cnpj}',
		email = '{$email}',
		telefone = '{$telefone}',
		nome_contato = '{$nome_contato}',
		cep = '{$cep}',
		logradouro = '{$logradouro}',
		numero = '{$numero}' ,
		complemento = '{$complemento}' ,
		bairro = '{$bairro}' ,
		cidade = '{$cidade}',
		estado = '{$estado}'
		WHERE id = {$id};";

	}



	if(mysqli_query($conexao, $sql)) {
		$mensagem = 'Salvo com sucesso!';
		$alert = 'success';

	}else {
		$mensagem = 'Erro ao salvar: ' . mysqli_error($conexao);
		$alert = 'danger';
	}

	header("Location: fornecedores.php?mensagem={$mensagem}&alert={$alert}");

} else if(isset($_GET['id']) && $acao == 'get') {
	$id = $_GET['id'];
	$sql = "SELECT * FROM fornecedores WHERE id = {$id}";
	$qr = mysqli_query($conexao, $sql);

	$fornecedor = mysqli_fetch_assoc($qr);
	echo json_encode($fornecedor);
}




 ?>