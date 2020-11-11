<?php
include_once('../bd/conexao.php');

$acao = $_GET['acao'] ?? 'redirect';
//deletar, salvar, exibir, listar
$metodo = $_SERVER['REQUEST_METHOD'];

if(isset($_GET['id']) && $acao == 'deletar' && $metodo == 'DELETE') {
	$id = $_GET['id'];
	if($id == '' || !is_numeric($id)) {
		$data['mensagem'] = 'ID é obrigatório e deve ser numérico';
	    $data['alert'] = 'danger';
		http_response_code(400);
		echo json_encode($data);
		exit;
	}

	$sql = "DELETE FROM produtos WHERE id = {$id}";
	$qr = mysqli_query($conexao, $sql);

	$data['mensagem'] = 'Excluído com sucesso!';
    $data['alert'] = 'success';
	http_response_code(200);
	echo json_encode($data);
	exit;
}if($acao == 'listar' && $metodo == 'GET') {
	
	$sql = "SELECT * FROM produtos";
	$qr = mysqli_query($conexao, $sql);
	$equipamentos = mysqli_fetch_all($qr, MYSQLI_ASSOC);

	$data['mensagem'] = 'Dados carregados com sucesso!';
    $data['alert'] = 'success';
    $data['dados'] = $equipamentos;
	http_response_code(200);
	echo json_encode($data);
	exit;
} else if(isset($_GET['id']) && $_GET['acao'] == 'exibir' && $metodo == 'GET') {
	$id = $_GET['id'];
	if($id == '' || !is_numeric($id)) {
		$data['mensagem'] = 'ID é obrigatório e numérico';
	    $data['alert'] = 'danger';
		http_response_code(400);
		echo json_encode($data);
		exit;
	}
	$sql = "SELECT * FROM produtos WHERE id = {$id}";
	$qr = mysqli_query($conexao, $sql);
	$equipamento = mysqli_fetch_assoc($qr);
	if($equipamento == null) {
		$data['mensagem'] = 'Registro não encontrado';
	    $data['alert'] = 'danger';
		http_response_code(400);
		echo json_encode($data);
		exit;
	}

	$data['mensagem'] = 'Dados carregados com sucesso!';
    $data['alert'] = 'success';
    $data['dados'] = $equipamento;
	http_response_code(200);
	echo json_encode($data);
	exit;
}else if($acao == 'salvar' && $metodo == 'POST') {

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
		$data['mensagem'] = 'Salvo com sucesso!';
		$data['alert'] = 'success';

		if($id == '') {
			$id = mysqli_insert_id($conexao);
		}

	}else {
		$data['mensagem'] = 'Erro ao salvar: ' . mysqli_error($conexao);
		$data['alert'] = 'danger';
		http_response_code(400);
		echo json_encode($data);
		exit;
	}

	$sql_dados = "SELECT * FROM produtos WHERE id = " . $id;
	$qr_dados = mysqli_query($conexao, $sql_dados);
	$produto = mysqli_fetch_assoc($qr_dados);

    $data['dados'] = $produto;
	http_response_code(201);
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