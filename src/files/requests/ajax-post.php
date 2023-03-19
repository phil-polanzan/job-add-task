<?php
require dirname(__DIR__, 3) . '/bootstrap-app.php';

@header('Content-Type: text/html; charset=utf-8');
@header('X-Robots-Tag: noindex');

// TODO add logic for posting values submitted by ajax forms
$data = [
	'status' => 'ok',
	'message' => 'Values stored'
];
echo json_encode($data);
die();