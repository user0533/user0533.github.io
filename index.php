<?php
$confirmation_token = "7981442e";
function vk_msg_send($peer_id,$text){
	$request_params = array(
		'message' => $text, 
		'peer_id' => $peer_id, 
		'access_token' => "5d20587bc33c19bfaed84834fedaa060406a171824108a6b8474da3d60a56f97373dfde9f10541f2ac133",
		'v' => '5.50' 
	);
	$get_params = http_build_query($request_params); 
	file_get_contents('https://api.vk.com/method/messages.send?'. $get_params);
}
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
		$message_text = str_split($message_text);
	if ($message_text[0]=='/' && $message_text=='1') {
	vk_msg_send($peer, "GG");
	}
		else{
			vk_msg_send($peer,"Я тебя не понимаю");
		}
		
		echo 'ok';
	break;
}

?>
