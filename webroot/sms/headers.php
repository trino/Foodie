<?php

function http_all(){
	$data = getallheaders();
	$data["content"] = file_get_contents('php://input');
	return $data;
}
	

	print_r (http_all());
?>