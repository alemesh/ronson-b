<?php
//****************************************
//edit here
$senderName = 'Ronson';
$senderEmail = $_SERVER['SERVER_NAME'];
$targetEmail = [];
$targetEmail = ['ravit@gofmans.co.il', 'office@ronson.co.il', 'idan@ronson.co.il', 'sales1@ronson.co.il'];
//$targetEmail = ['alemesh@acceptic.com'];
$messageSubject = 'Message from web-site - '. $_SERVER['SERVER_NAME'];
$redirectToReferer = true;
$redirectURL = $_SERVER['SERVER_NAME'];
//****************************************

// mail content
$ufname = $_POST['name'];
$uphone = $_POST['tel'];
$umail = $_POST['email'];
$ProjectID = $_POST['ProjectID'];
$Password = $_POST['Password'];

// prepare message text
$messageText =	'First Name: '.$ufname."\n".
    'Phone: '.$uphone."\n".
    'Email: '.$umail."\n";

// send email
$senderName = "=?UTF-8?B?" . base64_encode($senderName) . "?=";
$messageSubject = "=?UTF-8?B?" . base64_encode($messageSubject) . "?=";
$messageHeaders = "From: " . $senderName . " <" . $senderEmail . ">\r\n"
    . "MIME-Version: 1.0" . "\r\n"
    . "Content-type: text/plain; charset=UTF-8" . "\r\n";

//if (preg_match('/^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/',$targetEmail,$matches))
foreach ($targetEmail as $val){
    mail($val, $messageSubject, $messageText, $messageHeaders);
}


// BmbYY sistem ======

$url = 'http://www.bmby.com/shared/AddClient/index.php';
//$url = 'http://192.168.89.147/test.php';
//$url = 'http://testbmby/test.php';
$params = array(
    'Fname' => $ufname, // в http://localhost/post.php это будет $_POST['param1'] == '123'
    'Phone' => $uphone, // в http://localhost/post.php это будет $_POST['param2'] == 'abc'
    'Email' => $umail, // в http://localhost/post.php это будет $_POST['param2'] == 'abc'
    'ProjectID' => $ProjectID, // в http://localhost/post.php это будет $_POST['param2'] == 'abc'
    'Password' => $Password // в http://localhost/post.php это будет $_POST['param2'] == 'abc'
);
$result = file_get_contents($url, false, stream_context_create(array(
    'http' => array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => http_build_query($params)
    )
)));







$urlredirect = 'http://www.ronson.co.il/2/thanks-page.html?Lead=true';
//$urlredirect = 'http://192.168.89.147/thanks-page.html?Lead=true';
// redirect
if($redirectToReferer) {
    header("Location: ".$urlredirect);
} else {
    header("Location: ".$redirectURL);
}
?>
