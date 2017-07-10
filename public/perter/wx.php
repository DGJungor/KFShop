<?php
require './wx_Model.php';

define("TOKEN", "perter");

$wechatObj = new wxModel();

if (isset($_GET['echostr'])){
	$wechatObj->valid();
}else{
	$wechatObj->responseMsg();
}
