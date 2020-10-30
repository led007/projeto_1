<?php 
include_once('bd/conexao.php');

$acao = $_GET['acao'] ?? 'redirect';
//deletar, salvar, alterar

if(isset($_GET['id']) && $acao == 'deletar') {
	$id = $_GET['id'];

	$sql = "DELETE FROM colaboradores WHERE id = {$id}";


	if(mysqli_query($conexao, $sql)) {
		$mensagem = 'Excluído com sucesso!';
		$alert = 'success';

	}else {
		$mensagem = 'Erro ao tentar excluir, verifique se o dado não está relacionado com outro registro!';
		$alert = 'danger';

	}


	header("Location: colaboradores.php?mensagem={$mensagem}&alert={$alert}");
} else if($acao == 'salvar') {

	$senha = md5($_POST['senha']);
	$confirma_senha = md5($_POST['confirma_senha']);

	if($senha != $confirma_senha) {
		$mensagem = "A senha e a confirmação devem ser iguais";

		header("Location: form_usuario.php?mensagem={$mensagem}&alert=danger");
		exit;
	}

	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$logradouro = $_POST['logradouro'];
	$cep = $_POST['cep'];
	$numero = $_POST['numero'];
	$complemento = $_POST['complemento'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];

	if($nome == '' || $cpf == '' || $senha == '' || $email == '' ) {
		$mensagem = "Nome, CPF, email e senha são obrigatórios!";

		header("Location: form_usuario.php?mensagem={$mensagem}&alert=danger");
		exit;
	}



	$sql = "INSERT INTO colaboradores 
			(nome, 
			cpf, 
			email, 
			telefone, 
			cep, 
			logradouro, 
			numero, 
			complemento, 
			bairro, 
			cidade, 
			estado, 
			senha) 
			VALUES
			('$nome', '$cpf', '$email', '$telefone', '$cep','$logradouro','$numero', '$complemento', '$bairro', '$cidade', '$estado', '$senha');";


	if(mysqli_query($conexao, $sql)) {
		$mensagem = 'Salvo com sucesso!';
		$alert = 'success';

	}else {
		$mensagem = 'Erro ao salvar: ' . mysqli_error($conexao);
		$alert = 'danger';
	}

	header("Location: colaboradores.php?mensagem={$mensagem}&alert=$alert");
}



 ?>