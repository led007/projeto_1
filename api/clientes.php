<?php
include_once('../bd/conexao.php');

$acao = $_GET['acao'] ?? 'redirect';

//deletar, salvar, exibir, listar

$metodo = $_SERVER['REQUEST_METHOD'];

if(isset($_GET['id']) && $acao == 'deletar' && $metodo == 'DELETE') {
	$id = $_GET['id'];
	if($id == ''){
		$data['mensagem'] = 'ID e obrigatório';
		$data['alert'] = 'danger';
		http_response_code(400);
		echo json_encode($data);
		exit;
	}

	$sql = "DELETE FROM clientes WHERE id = {$id}";
	$qr = mysqli_query($conexao, $sql);

	$data['mensagem'] = 'Dados excluídos com sucesso!';
	$data['alert'] = 'success';
	http_response_code(200);
	echo json_encode($data);
	exit;

}if($acao == 'listar' && $metodo == 'GET'){

	$sql = 'SELECT * FROM clientes';
	$qr = mysqli_query($conexao, $sql);
	$clientes = mysqli_fetch_all($qr, MYSQLI_ASSOC);

	$data['mensagem'] = 'Dados carregados com sucesso!';
	$data['alert'] = 'success';
	$data['dados'] = $clientes;
	http_response_code(200);
	echo json_encode($data);
	exit;
}else if(isset($_GET['id']) && $_GET['acao'] == 'exibir' && $metodo == 'GET'){
	$id = $_GET['id'];
	if( $id == ''){
		$data['mensagem'] = 'ID é obrigatório';
		$data['alert'] = 'danger';
		http_response_code(400);
		echo json_encode($data);
		exit;
	}

	$sql = "SELECT nome, cpf, email, telefone, convenio, FROM clientes";
	$qr = mysqli_query($conexao, $sql);
	$clientes = mysqli_fetch_assoc($qr);

	$data['mensagem'] = 'Dados carregados com sucesso!';
	$data['alert'] = 'success';
	$data['dados'] = $clientes;
	http_response_code(200);
	echo json_encode($data);
	exit;
}else if($acao == 'salvar' && $metodo = 'POST'){

	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$convenio = $_POST['convenio'];
	$num_convenio = $_POST['num_convenio'];
	$cep = $_POST['cep'];
	$logradouro = $_POST['logradouro'];
	$numero = $_POST['numero'];
	$complemento = $_POST['complemento'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$usuario_id = $_POST['usuario_id'];
	$id = $_POST['id'];

	if($nome == '' || $email == '' || $cpf == '') {
		$mensagem = "Nome, Email e CPF são obregatórios!";
		$alert = 'danger';
		exit;

	}

	if($id == ''){
		$sql = "INSERT INTO clientes 
				(nome,
				cpf,
				email,
				telefone,
				convenio,
				num_convenio,
				cep,
				logradouro,
				numero,
				complemento,
				bairro,
				cidade,
				estado,
				usuario_id) VALUES ('$nome','$cpf','$email','$telefone','$convenio','$num_convenio','$cep','$logradouro','$numero','$complemento','$bairro','$cidade','$estado','$usuario_id');";
	}else {
		$sql = "UPDATE clientes SET 
				nome = '{$nome}',
				cpf = '{$cpf}',
				email = '{$email}',
				telefone = '{$telefone}',
				convenio = '{$convenio}',
				num_convenio = '{$num_convenio}',
				cep = '{$cep}',
				logradouro = '{$logradouro}',
				numero = '{$numero}',
				complemento = '{$complemento}',
				bairro = '{$bairro}',
				cidade = '{$cidade}',
				estado = '{$estado}',
				usuario_id = '{$usuario_id}'
				WHERE id = '{$id}'";
	}

	if(mysqli_query($conexao, $sql)){
		$mensagem = 'Salvo com sucesso!';
		$alert = 'seccess';

		if($id == ''){
			$id = mysqli_insert_id($conexao);
		}

	}else{
		$mensagem = 'Error ao salvar' . mysqli_error($conexao);
		$alert = 'danger';
	}

	$data['mensagem'] = $mensagem;
	$data['alert'] = $alert;
	$data['dados'] = $id;
	http_response_code(200);
	echo json_encode($data);
	exit;

}else{
	$data['mensagem'] = 'Método não permitido!';
	$data['alert'] = 'danger';
	http_response_code(405);
	echo json_encode($data);
	exit;
}

?>