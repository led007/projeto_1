<?php 
include_once('../bd/conexao.php');

$acao = $_GET['acao'] ?? 'redirect';
//deletar, salvar, alterar
$metodo = $_SERVER['REQUEST_METHOD'];

if(isset($_GET['id']) && $acao == 'deletar' && $metodo == 'DELETE') {
	$id = $_GET['id'];
	if ($id == '' || !is_numeric($id)) {
		$data['mensagem'] = 'ID é obrigatório e deve ser númerico';
		$data['alert'] = 'danger';
		http_response_code(400);
		echo json_encode($data);
		exit;
	}

	$sql = "DELETE FROM servicos WHERE id = {$id}";
	$qr = mysqli_query($conexao, $sql);

	$data['mensagem'] = 'Excluido com sucesso!';
	$data['alert'] = 'success';
	http_response_code(200);
	echo json_encode($data);
	exit;
}if ($acao == 'listar' && $metodo == 'GET') {
	
	$sql = "SELECT s.*, c.categoria 
			FROM servicos s 
			LEFT JOIN categoria c ON c.id = s.categoria_id";
	$qr = mysqli_query($conexao, $sql);
	$servicos = mysqli_fetch_all($qr, MYSQLI_ASSOC);
	$data['mensagem'] = 'Dados carregados com sucesso';
	$data['alert'] = 'success';
	$data['dados'] = $servicos;
	http_response_code(200);
	echo json_encode($data);
	exit;
} else if(isset($_GET['id']) && $_GET['acao'] == 'exibir' && $metodo == 'GET') {
	$id = $_GET['id'];
	if($id == '' || !is_numeric($id)) {
		$data['mensagem'] = 'ID é obrigatório e deve ser númerico';
	    $data['alert'] = 'danger';
		http_response_code(400);
		echo json_encode($data);
		exit;
	}
	$sql = "SELECT s.id, s.codigo, s.nome, s.descricao, s.preco, c.categoria 
			FROM servicos s 
			LEFT JOIN categoria c ON c.id = s.categoria_id
			WHERE s.id =  {$id}";
	$qr = mysqli_query($conexao, $sql);
	$servico = mysqli_fetch_assoc($qr);
	if ($servico == null) {
	$data['mensagem'] = 'Registro não encontrado';
    $data['alert'] = 'danger';
	http_response_code(400);
	echo json_encode($data);
	exit;
	}

	$data['mensagem'] = 'Dados carregados com sucesso!';
    $data['alert'] = 'success';
    $data['dados'] = $servico;
	http_response_code(200);
	echo json_encode($data);
	exit;

} else if($acao == 'salvar' && $metodo == 'POST') {

	$codigo = $_POST['codigo'];
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];
	$preco = $_POST['preco'];
	$categoria_id = $_POST['categoria_id'];
	$id = $_POST['id'];

	if ($id == '') {
		$sql = "INSERT INTO servicos (codigo, nome, descricao, preco, categoria_id,usuario_id) VALUES ('$codigo', '$nome', '$descricao', '$preco', '$categoria_id',1);";
	} else {
		$sql = "UPDATE servicos SET 
		              codigo = '{$codigo}',
		              nome = '{$nome}',
		              descricao = '{$descricao}',
		              preco = '{$preco}',
		              categoria_id = '{$categoria_id}'
		              WHERE id = {$id}";
	}
	
	if(mysqli_query($conexao, $sql)) {
		$mensagem = 'Salvo com sucesso!';
		$alert = 'success';

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

	$sql_dados = "SELECT * FROM servicos WHERE id = " . $id;
	$qr_dados = mysqli_query($conexao, $sql_dados);
	$servico = mysqli_fetch_assoc($qr_dados);

    $data['dados'] = $servico;
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