<?php
function traduz_data($data){
	if ($data == "" OR $data == "000-00-00") {
		return "";
	}
	$dados = explode("-", $data);
	$nova_data = "{$dados[2]}/{$dados[1]}/{$dados[0]}";
	return "$nova_data";
}
function traduz_favorito($favorito){
	if ($favorito == 1) {
		return "Sim";
	}
	return "Não";
}
function temPost(){
	if (count($_POST) > 0) {
		return true;
	}
	return false;
}