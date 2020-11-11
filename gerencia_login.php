<?php
session_start(); 
include_once('bd/conexao.php');
include_once('bd/lang.php');

if((!isset($_POST['email']) && $_POST['email'] != '') 
	|| (!isset($_POST['senha'])) && $_POST['senha'] != '') {
	$data['mensagem'] = $msg[$lang]['login_obrigatorio'];//exemplo de multi linguagem
    $data['alert'] = 'danger';
	http_response_code(400);
	echo json_encode($data);
	exit;
}

$email = $_POST['email'];
$senha = $_POST['senha'];


$sql = "SELECT id, nome, email, senha, cpf, tentativas
		FROM colaboradores 
		WHERE email = '{$email}'";

$qr = mysqli_query($conexao, $sql);
$usuario = mysqli_fetch_assoc($qr);

if($usuario == null) {
	$data['mensagem'] = $msg[$lang]['login_nao_encontrado'];//exemplo de multi linguagem
    $data['alert'] = 'danger';
	http_response_code(401);
	echo json_encode($data);
	exit;
}

if (password_verify($senha, $usuario['senha'])) {

	if($usuario['tentativas'] >= 3) {
		$data['mensagem'] = 'Usuário excedeu o limite de tentativas e foi bloqueado, por favor contate o administrador do sistema.';
		$data['alert'] = 'danger';
		http_response_code(401);
		echo json_encode($data);
		exit;
	}

    $data['mensagem'] = 'Usuário logado com sucesso, aguarde redirecionamento.';
    $data['alert'] = 'success';

    $sql_tentativas = "UPDATE colaboradores SET tentativas = 0 WHERE id = " . $usuario['id'];
    mysqli_query($conexao, $sql_tentativas);
    
    $_SESSION['id_usuario'] = $usuario['id'];
    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['cpf'] = $usuario['cpf'];
    $_SESSION['email'] = $usuario['email'];

    http_response_code(200);
	echo json_encode($data);
	exit;
} else {
	$tentativas = $usuario['tentativas'];
	if($usuario['tentativas'] >= 3) {
		$data['mensagem'] = 'Usuário excedeu o limite de tentativas e foi bloqueado, por favor contate o administrador do sistema.';
	} else {
		$tentativas++;
		if($tentativas >= 3) {
   			$data['mensagem'] = 'Usuário excedeu o limite de tentativas e foi bloqueado, por favor contate o administrador do sistema.';
		}else {
   			$data['mensagem'] = 'Usuário ou senha incorretos. ' . $tentativas . '/3 tentativas.';
		}
   		$sql_tentativas = "UPDATE colaboradores SET tentativas = {$tentativas} WHERE id = " . $usuario['id'];
   		mysqli_query($conexao, $sql_tentativas);
	}
    $data['alert'] = 'danger';
	http_response_code(401);
	echo json_encode($data);
	exit;
}

?>