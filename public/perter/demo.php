<?php
	require('wx_Model.php');
	$wxobj = new wxModel;
	$res = $wxobj->getUserOpenId();
	var_dump($res);
	// var_dump($_GET);
	// echo "<hr>";
	echo $res['openid']."用户的唯一标识<br>";
	echo $res['nickname']."用户昵称<br>";
	echo $res['sex']."性别<br>";
	echo $res['province']."用户个人资料填写的省份<br>";
	echo $res['city']."普通用户个人资料填写的城市<br>";
	echo $res['country']."国家<br>";
	echo $res['headimgurl']."用户头像<br>";
	// echo $res['privilege']."用户特权信息<br>";
	// echo $res['unionid']."只有在用户将公众号绑定到微信开放平台帐号后，才会出现该字段<br>";
?>
