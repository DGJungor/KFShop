<?php
/**
  * wechat php test
  */

//define your token
// file_put_contents('./2.txt', $_GET["echostr"], FILE_APPEND );
class wxModel
{
    private $appid = 'wx664e0e88ff31d504';
    private $appsecret = '0bbb6fd16e14e7770b7f9e3397888230';
    // public $appid     = "wxfa805a245b7f9448";
    // public $appsecret = "71d299ac9d7291012b4c0762eff81d73";
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments

		//获取到微信推送过来的Post数据
        // $poststr = $GLOBALS["HTTP_RAW_POST_DATA"];
        $postStr = file_get_contents('php://input');
        // file_put_contents('./2.txt', $postStr, FILE_APPEND );

        // exit;
        // file_put_contents('./1.txt', $postStr, FILE_APPEND );
      	//extract post data
		if (!empty($postStr)){
            /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
               the best way is to check the validity of xml by yourself */
            libxml_disable_entity_loader(true);
            
            //把$poststr 字符串转换为对象
          	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $msgType = $postObj->MsgType;
            $keyword = trim($postObj->Content);
            $time = time();
            if($msgType == 'event'){
                $event = $postObj->Event;
                if ($event == 'subscribe') {
                    $textTpl = "<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <Content><![CDATA[%s]]></Content>
                                <FuncFlag>0</FuncFlag>
                                </xml>";
                    $msgType = 'text';
                    $contentStr = '欢迎关注小P，小P为您提供最优质的服务';
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;
                }
                if($event == 'CLICK'){
                    $eventkey = $postObj->EventKey;
                    $textTpl = "<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <Content><![CDATA[%s]]></Content>
                                <FuncFlag>0</FuncFlag>
                                </xml>";
                    $msgType = 'text';
                    if($eventkey == '20000'){
                        $contentStr = '<a href="'.$this->getBaseInfo().'">点我</a>';
                    }
                    if($eventkey == '30000'){
                        $contentStr = "<a href='".$this->geterweima()."'>获取二维码</a>";
                    }
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                }
                
            }
            if ($msgType == 'text') {

                if ($keyword == '图文') {
                    $arr = array(
                        array(
                            'title'         => 'perter',
                            'description'   => 'perter is very good',
                            'picurl'        => 'http://img1.tbcdn.cn/tfscom/TB1CraDOpXXXXXSXVXXXXXXXXXX',
                            'url'           => 'http://www.baidu.com',
                        ),
                    );
                    $textTpl =  "<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[news]]></MsgType>
                                <ArticleCount>1</ArticleCount>
                                <Articles>";

                    foreach ($arr as $k => $v) {
                        $textTpl .= "<item>
                                <Title><![CDATA[".$v['title']."]]></Title>
                                <Description><![CDATA[".$v['description']."]]></Description>
                                <PicUrl><![CDATA[".$v['picurl']."]]></PicUrl>
                                <Url><![CDATA[".$v['url']."]]></Url>
                                </item>";
                    }
                    
                    $textTpl .= "</Articles>
                                </xml>";

                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time);
                    echo $resultStr;
                    exit();
                }
                if ($keyword == '美女') {
                    $textTpl = "<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <Image>
                                <MediaId><![CDATA[%s]]></MediaId>
                                </Image>
                                </xml>";
                    $msgType = 'image';
                    $mediaId = 'dGs-TH5Ipw4Pbv8MwuuZoIXxUVn3eLK15E-EYQiZIMvD2kmoifaDG8q3IHv43ZFr';
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $mediaId);
                    echo $resultStr;
                }
                if ($keyword) {

                    $textTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Content><![CDATA[%s]]></Content>
                            <FuncFlag>0</FuncFlag>
                            </xml>";

                    switch ($keyword) {
                    
                        case '123456':
                            $msgType = 'text';
                            $contentStr = '你输入的数字是123456';
                            break;
                        case '1':
                            $msgType = 'text';
                            $contentStr = '你输入的数字是1';
                            break;
                        case '2':
                            $msgType = 'text';
                            $contentStr = '你输入的数字是2';
                            break;
                        default:
                            $contentStr = '您的信息已接收，我们会在第一时间回复您!';
                            break;

                    }
                    $msgType = 'text';

                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;
                }
        }
            
        }else {
            	echo "";
            	exit;
            }
    }
		
	private function checkSignature()
	{
        /*
        1）将token、timestamp、nonce三个参数进行字典序排序
        2）将三个参数字符串拼接成一个字符串进行sha1加密
        3）开发者获得加密后的字符串可与signature对比，标识该请求来源于微信
         */
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
		$token = TOKEN;
		
        $tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}

    public function getData($url, $res='json', $type='get', $arr='')
    {
        $ch = curl_init();

        // 2. 设置cURL选项
        /*
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        */
        curl_setopt($ch, CURLOPT_URL, $url);

        if( $type== 'get' ){
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        }
        if ($type == 'post') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            
        }
        
        // 3. 执行cURL请求
        $ret = curl_exec($ch);

        if($res=='json'){
            if( curl_errno($ch)){
                return curl_error($ch);
            }
            return json_decode($ret, 'true');
        }

        // 4. 关闭资源
        curl_close($ch);

    }

    public function getAccessToken()
    {
        // redis  memcache SESSION
        session_start();

        if ($_SESSION['access_token'] && $_SESSION['expire_time'] > time() )
        {
            return $_SESSION['access_token'];
        } else {
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appid."&secret=".$this->appsecret;
            // echo $url;
            $token = $this->getData($url, 'json', 'get');
            // var_dump($token);
            $access_token = $token['access_token'];
            // 写入SESSION
            $_SESSION['access_token'] = $access_token;
            $_SESSION['expire_time'] = time()+7000;
            return $access_token;
        }
    }

    public function menuArrtoJson()
    {
        header('content-type:text/html;charset=utf8');
        $access_token = $this->getAccessToken();
        echo $access_token;
        echo '<hr>';
        $url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$access_token;
        $arr = array(
            'button' => array(
                array(
                    "type" => "click",
                    "name" => urlencode("真按钮"),
                    "key" => "20000"
                ),
                array(
                    "name" => urlencode("点我"),
                    "sub_button" => array(
                        array(
                            "type" => "click",
                            "name" => urlencode("获取二维码"),
                            "key" => "30000"
                        ),
                        array(
                            "type" => "click",
                            "name" => urlencode("大兄弟"),
                            "key" => "40000"
                        )
                    )
                ),
                array(
                    "type" => "view",
                    "name" => urlencode("搜索"),
                    "url" => "http://www.soso.com"
                )
            )
        );
        // var_dump($arr);
        // echo "<hr />";
        $postJson =  urldecode( json_encode($arr) );
        echo $postJson;
        echo "<hr>";
        $res = $this->getData($url, 'json', 'post', $postJson);
        echo $res;
    }

    public function getBaseInfo()
    {
        $redirect_uri = urlencode("http://119.23.52.183/perter/demo.php");
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$this->appid."&redirect_uri=".$redirect_uri."&response_type=code&scope=snsapi_userinfo&state=perter#wechat_redirect";
        return $url;
        // header('location:'.$url);
    }

    public function getUserOpenId()
    {

        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$this->appid."&secret=".$this->appsecret."&code=".$_GET['code']."&grant_type=authorization_code";
        // $info = array();
        // echo $url;
        // var_dump($_GET);
        $info = $this->getData($url, 'json', 'get');
        var_dump($info);
        $url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$info['access_token']."&openid=".$info['openid']."&lang=zh_CN ";
        // echo $url;
        $userInfo = $this->getData($url, 'json', 'get');

        return $userInfo;

    }

    public function putUserInfo()
    {   
        $access_token = $this->getAccessToken();
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$access_token;
        // echo $url."<br>";
        $data = array(
                   'touser'       => "oJwkR0zY5DQ27ToRcDVjTxPIcA7Q",
                   'template_id'  => "EYxaM08OjnnQBTP8syeoLVi2cmx5rAVeDuXMRhQqF1c",
                   'url'         => "http://www.baidu.com",
                   'data'         => array(
                                        'name' => array( 'value' => "perter",'color' => "#173177" ),
                                        'date' => array( 'value' => date('Y-m-d',time()),'color' => "#173177") ),
        );
        $postJson = json_encode($data);
        echo $postJson;
        echo "<hr>";
        $info = $this->getData($url, 'json', 'post', $postJson);
        echo $info;
    }

    public function geterweima()
    {
        $url="https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=".$this->getAccessToken();
        // echo $url;
        // {"action_name":"QR_LIMIT_SCENE","action_info":{"scene":{"scene_id":123}}}
        // {"action_name":"QR_LIMIT_SCENE","action_info":{"scene":{"scene_id":123}}}
        $arr=array(
            'expire_seconds'=> '604800',
            'action_name'  => "QR_SCENE",
            'action_info'  => array(
                            'scene' => array(
                                        'scene_id'  => '11ew123',
                                    ),
                        ),
        );
        $postJson = json_encode($arr);
        // echo $postJson;
        // echo "<hr>";
        $data = $this->getData($url, 'json', 'post', $postJson);
        $ticket = urlencode( $data['ticket'] );
        $url = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=".$ticket;
        // $require = $this->getData($url, 'str', 'get');
        return $url;
    }

    // public function getWeather()
    // {
    //     $url = 'http://apistore.baidu.com/microservice/weather?cityname=北京';
    //     $data = $this->getData($url, 'json', 'get');
    //     var_dump($data);
    // }
}
