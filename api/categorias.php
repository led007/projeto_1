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

	$sql = "DELETE FROM categoria WHERE id = {$id}";
	$qr = mysqli_query($conexao, $sql);

	$data['mensagem'] = 'Excluído com sucesso!';
    $data['alert'] = 'success';
	http_response_code(200);
	echo json_encode($data);
	exit;
}if($acao == 'listar' && $metodo == 'GET') {
	
	$sql = "SELECT * FROM categoria";
	$qr = mysqli_query($conexao, $sql);
	$categorias = mysqli_fetch_all($qr, MYSQLI_ASSOC);

	$data['mensagem'] = 'Dados carregados com sucesso!';
    $data['alert'] = 'success';
    $data['dados'] = $categorias;
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
	$sql = "SELECT id, categoria, tipo FROM categoria WHERE id = {$id}";
	$qr = mysqli_query($conexao, $sql);
	$categoria = mysqli_fetch_assoc($qr);
	if($categoria == null) {
		$data['mensagem'] = 'Registro não encontrado';
	    $data['alert'] = 'danger';
		http_response_code(400);
		echo json_encode($data);
		exit;
	}

	$data['mensagem'] = 'Dados carregados com sucesso!';
    $data['alert'] = 'success';
    $data['dados'] = $categoria;
	http_response_code(200);
	echo json_encode($data);
	exit;
}else if($acao == 'salvar' && $metodo == 'POST') {

	$categoria = $_POST['categoria'];
	$tipo = $_POST['tipo'];
	$id = $_POST['id'];

	if($id == '') {
		$sql = "INSERT INTO categoria (categoria, tipo) VALUES ('$categoria', '$tipo');";
	} else {
		$sql = "UPDATE categoria SET 
					categoria = '{$categoria}', 
					tipo = '{$tipo}'
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

	$sql_dados = "SELECT * FROM categoria WHERE id = " . $id;
	$qr_dados = mysqli_query($conexao, $sql_dados);
	$categoria = mysqli_fetch_assoc($qr_dados);

    $data['dados'] = $categoria;
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