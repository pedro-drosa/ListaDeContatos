<?php
session_start();
include"banco.php";
include"ajudantes.php";
$exibirTabela = false;
$temErros = false;
$errosValidacao = array();
if (temPost()) {
	$contato = array();
	$contato['id'] = $_POST['id'];
	if (isset($_POST['nome']) && strlen($_POST['nome']) > 0) {
		$contato['nome'] = $_POST['nome'];
	}else{
		$temErros = true;
		$errosValidacao['nome'] = "O nome do contato é obrigatório!";
	}
	if (isset($_POST['telefone'])) {
		$contato['telefone'] = $_POST['telefone'];
	}else{
		$contato['telefone'] = '';
	}
	if (isset($_POST['email'])) {
		$contato['email'] = $_POST['email'];
	}else{
		$contato['email'] = '';
	}
	if (isset($_POST['descricao'])) {
		$contato['descricao'] = $_POST['descricao'];
	}else{
		$contato['descricao'] = '';
	}
	if ($_POST['sexo'] == 0) {
		$contato['sexo'] = "Masculino";
	}else{
		$contato['sexo'] = "Feminino";
	}
	if (isset($_POST['nascimento'])) {
		$contato['nascimento'] = $_POST['nascimento'];
	}else{
		$contato['nascimento'] = '';
	}
	if (isset($_POST['favorito'])) {
		$contato['favorito'] = 1;
	}else{
		$contato['favorito'] = 0;
	}
	if (!$temErros) {
		editarContato($conexao,$contato);
		header("Location:contatos.php");
		die();
	}
}
$contato = buscarContato($conexao,$_GET['id']);

$contato['nome']=(isset($_POST['nome']) ? $_POST['nome'] : $contato['nome']);
$contato['telefone']=(isset($_POST['telefone']) ? $_POST['telefone'] : $contato['telefone']);
$contato['email']=(isset($_POST['email']) ? $_POST['email'] : $contato['email']);
$contato['descricao']=(isset($_POST['descricao']) ? $_POST['descricao'] : $contato['descricao']);
$contato['sexo']=(isset($_POST['sexo']) ? $_POST['sexo'] : $contato['sexo']);
$contato['nascimento']=(isset($_POST['nascimento']) ? $_POST['nascimento'] : $contato['nascimento']);
$contato['favorito']=(isset($_POST['favorito']) ? $_POST['favorito'] : $contato['favorito']); 

include"template.php";
