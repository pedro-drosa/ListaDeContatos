<?php
include"banco.php";
removerContato($conexao,$_GET['id']);
header("Location:contatos.php");
die();
