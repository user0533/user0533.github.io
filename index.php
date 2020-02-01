<?php
$confirmation_token = "369f1820";
function vk_msg_send($peer_id,$text){
	$request_params = array(
		'message' => $text, 
		'peer_id' => $peer_id, 
		'access_token' => "e437e5df6a17028839f7a949eceaed3aa59c31205d5f2b7adcfc6e0bd6455a0083dd0b0985f048f397f88",
		'v' => '5.87' 
	);
	$get_params = http_build_query($request_params); 
	file_get_contents('https://api.vk.com/method/messages.send?'. $get_params);
}
$arr = file('http://evkappe.herokuapp.com/dict.txt');
$data = json_decode(file_get_contents('php://input'));
switch ($data->type) {  
	case 'confirmation': 
		echo $confirmation_token; 
	break;  
		
	case 'message_new': 
		$message_text = $data -> object -> text;
    $peer = $data -> object -> peer_id;
    /*if($str>=1 && $str<=8){
      echo $arr[
    }*/
		if ($message_text == "привет"){
			vk_msg_send($peer,"hello");
		}
		}
		echo 'ok';
	break;
}

?>
