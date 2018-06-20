<?php
$success=false;
if (!empty($_POST['name']) && !empty($_POST['phone']) & !empty($_POST['order'])) {
	$name = mysql_real_escape_string($_POST['name']);
	$phone = mysql_real_escape_string($_POST['phone']);
	$order =mysql_real_escape_string($_POST['order']);
	$msg='От: '.$name.'. Номер телефона: '.$phone.'. Вопрос: '.$order; 
$from_name="tikhiy-don15.ru";
$from_mail="support@tikhiy-don15.ru";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= "From: ".$from_name." <".$from_mail."> \r\n";
$headers .= "Content-type: text/html; charset=utf-8 \r\n";
$to_mail = "scenox1010@gmail.com";

	
	if(mail($to_mail,'Обратная свявь',$msg, $headers)) $success=true;
}

echo json_encode(array($success));

?>