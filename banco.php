<?php
	$dbServer = "localhost";
	$dbUser = "root";
	$dbPass = "";
	$dbName = "contatos";

	$conexao = mysqli_connect($dbServer,$dbUser,$dbPass,$dbName);
	if (mysqli_connect_error($conexao)) {
		echo "Erro na conexão". mysqli_connect_error();
		die();
	}

	function exibirContatos($conexao){
		$query = "SELECT * FROM contatos ORDER BY nome";
		$result = mysqli_query($conexao,$query);
		$contatos = array();
		while ($contato = mysqli_fetch_assoc($result)) {
			$contatos[] = $contato;
		}
		return $contatos;
	}
	function cadastrarContatos($conexao,$contato){
		$query = "INSERT INTO contatos (nome,telefone,email,descricao,sexo,nascimento,favorito) 
		VALUES (
				'{$contato['nome']}',
				'{$contato['telefone']}',
				'{$contato['email']}',
				'{$contato['descricao']}',
				'{$contato['sexo']}',
				'{$contato['nascimento']}',
				'{$contato['favorito']}'
			)";
mysqli_query($conexao, $query);
}
function buscarContato($conexao,$id){
	$query = 'SELECT * FROM contatos WHERE id ='.$id;
	$result = mysqli_query($conexao,$query);
	return mysqli_fetch_assoc($result);
}
function editarContato($conexao,$contato){
	$query = " UPDATE contatos SET
			   		nome = '{$contato['nome']}',
			   		telefone = '{$contato['telefone']}',
			   		email = '{$contato['email']}',
			   		descricao = '{$contato['descricao']}',
			   		sexo = '{$contato['sexo']}',
			   		nascimento = '{$contato['nascimento']}',
			   		favorito = {$contato['favorito']}
			   	WHERE id = {$contato['id']} 
	";
	mysqli_query($conexao,$query);
	header("Location:contatos.php");
	die();
}
function removerContato($conexao,$id){
	$query = "DELETE FROM contatos WHERE id = {$id}";
	mysqli_query($conexao,$query);
}