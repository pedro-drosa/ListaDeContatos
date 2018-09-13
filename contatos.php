<?php
	session_start();
	include "banco.php";
	include "ajudantes.php";
	$temErros = false;
	$errosValidacao = array();
	$exibirTabela = true;
		if (temPost()) {
			$contato = array();
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
				$contato['sexo'] = $_POST['sexo'];

			if ($_POST['nascimento']) {
				$contato['nascimento'] = $_POST['nascimento'];
			}else{
				$contato['nascimento'] = '';
			}
			if (isset($_POST['favorito'])) {
				$contato['favorito'] = $_POST['favorito'];
			}else{
				$contato['favorito'] = '';
			}
			if (!$temErros) {
				cadastrarContatos($conexao,$contato);
				header("Location:contatos.php");
				die();
			}
		}
	$listaContatos = exibirContatos($conexao);
	$contato = array(
	'id' => 0,
	'nome' => (isset($_POST['nome']) ? $_POST['nome'] : ''),
	'telefone' => (isset($_POST['telefone']) ? $_POST['telefone'] : ''), 
	'email' => (isset($_POST['email']) ? $_POST['email'] : ''), 
	'descricao' =>(isset($_POST['descricao']) ? $_POST['descricao'] : ''), 
	'sexo' => (isset($_POST['sexo']) ? $_POST['sexo'] : 0), 
	'nascimento' => (isset($_POST['nascimento']) ? $_POST['nascimento'] : ''), 
	'favorito' => (isset($_POST['favorito']) ? $_POST['favorito'] : ''), 
);
	include "template.php";