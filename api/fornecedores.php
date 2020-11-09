<?php
include_once('../bd/conexao.php');

$acao = $_GET['acao'] ?? 'redirect';
//deletar, salvar, exibir, listar
$metodo = $_SERVER['REQUEST_METHOD'];

if(isset($_GET['id']) && $acao == 'deletar' && $metodo == 'DELETE') {
	$id = $_GET['id'];
	if($id == '') {
		$data['mensagem'] = 'ID é obrigatório';
	    $data['alert'] = 'danger';
		http_response_code(400);
		echo json_encode($data);
		exit;
	}

	$sql = "DELETE FROM fornecedores WHERE id = {$id}";
	$qr = mysqli_query($conexao, $sql);

	$data['mensagem'] = 'Excluído com sucesso!';
    $data['alert'] = 'success';
	http_response_code(200);
	echo json_encode($data);
	exit;
}if($acao == 'listar' && $metodo == 'GET') {
	
	$sql = "SELECT * FROM fornecedores";
	$qr = mysqli_query($conexao, $sql);
	$categorias = mysqli_fetch_all($qr, MYSQLI_ASSOC);

	$data['mensagem'] = 'Dados carregados com sucesso!';
    $data['alert'] = 'success';
    $data['dados'] = $fornecedores;
	http_response_code(200);
	echo json_encode($data);
	exit;
} else if(isset($_GET['id']) && $_GET['acao'] == 'exibir' && $metodo == 'GET') {
	$id = $_GET['id'];
	if($id == '') {
		$data['mensagem'] = 'ID é obrigatório';
	    $data['alert'] = 'danger';
		http_response_code(400);
		echo json_encode($data);
		exit;
	}
	$sql = "SELECT * FROM fornecedores WHERE id = {$id}";
	$qr = mysqli_query($conexao, $sql);
	$fornecedor = mysqli_fetch_assoc($qr);

	$data['mensagem'] = 'Dados carregados com sucesso!';
    $data['alert'] = 'success';
    $data['dados'] = $fornecedor;
	http_response_code(200);
	echo json_encode($data);
	exit;
}else if($acao == 'salvar' && $metodo == 'POST') {

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

	if($id == '') {
		"INSERT INTO fornecedores 
			(razao_social, fantasia, cnpj, email, telefone, nome_contato, cep ,logradouro, numero, complemento, bairro, cidade, estado,usuario_id) 
			VALUES
			('$razao_social', '$fantasia','$cnpj', '$email', '$telefone', '$nome_contato', '$cep','$logradouro','$numero', '$complemento', '$bairro', '$cidade', '$estado','1');";

	} else {"UPDATE fornecedores SET 
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

		if($id == '') {
			$id = mysqli_insert_id($conexao);
		}

	}else {
		$mensagem = 'Erro ao salvar: ' . mysqli_error($conexao);
		$alert = 'danger';
	}

	$data['mensagem'] = $mensagem;
    $data['alert'] = $alert;
    $data['dados'] = $id;
	http_response_code(200);
	echo json_encode($data);
	exit;

} else {
	$data['mensagem'] = 'Método não permitido!';
    $data['alert'] = 'danger';
	http_response_code(405);
	echo json_encode($data);
	exit;
}



 ?>