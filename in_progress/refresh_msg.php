<?php
require_once 'includes/php_header.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){ // pour la sécurisation
  http_response_code(403);
  die();
}

if(!isset($_SESSION['user']['id'])){
  http_response_code(403);
  die();
}

extract($_POST);
if(!isset($id_msg)) $id_msg=0;
$Chat = new Chat($id_channel);
$lastMessages = $Chat->getLastMessage($id_msg);
die(json_encode($lastMessages));
