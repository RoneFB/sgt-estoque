<?php
	function getRequestBody(bool $decoded = true) {
		$body = file_get_contents('php://input');
		if($decoded) $body = json_decode($body);
		return $body;
	}
?>