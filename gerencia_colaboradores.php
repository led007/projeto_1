<?php 
include_once('valida_sessao.php');
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

	$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
	/*if (password_verify('12345', $hash)) {
	    echo 'Password is valid!';
	} else {
	    echo 'Invalid password.'. '<br>';
	}*/

	if($_POST['senha'] != '' && $_POST['senha'] != $_POST['confirma_senha']) {
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
	$id = $_POST['id'];


	if($nome == '' || $cpf == '' || $email == '' ) {
		$mensagem = "Nome, CPF, email e senha são obrigatórios!";

		header("Location: form_usuario.php?mensagem={$mensagem}&alert=danger");
		exit;
	}

	if($id == ''){


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
		}else {
			if($_POST['senha'] != '') {
				$string_senha = ", senha = '{$senha}' ";
			} else {
				$string_senha = '';
			}
			$sql = "UPDATE colaboradores SET 
				nome = '{$nome}',
				cpf = '{$cpf}',
				email = '{$email}',
				cep = '{$cep}',
				logradouro = '{$logradouro}',
				numero = '{$numero}' ,
				complemento = '{$complemento}' ,
				bairro = '{$bairro}' ,
				cidade = '{$cidade}',
				estado = '{$estado}'
				{$string_senha}
				WHERE id = {$id};";
		}

	if(mysqli_query($conexao, $sql)) {
		$mensagem = 'Salvo com sucesso!';
		$alert = 'success';

	}else {
		$mensagem = 'Erro ao salvar: ' . mysqli_error($conexao);
		$alert = 'danger';
	}

	header("Location: colaboradores.php?mensagem={$mensagem}&alert=$alert");
} else if(isset($_GET['id']) && $acao == 'get') {
	$id = $_GET['id'];

	$sql = "SELECT nome, cpf, email,telefone, logradouro,numero, bairro, cidade, estado,cep FROM colaboradores WHERE id = {$id}";
	$qr = mysqli_query($conexao, $sql);
	$colaborador = mysqli_fetch_assoc($qr);
	echo json_encode($colaborador);
}



 ?>