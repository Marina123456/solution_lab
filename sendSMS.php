<?
header("Content-type: text/html; charset=utf-8");
sendSMS();
function sendSMS(){
    $login="Marina1234562016";
    $password="marina2015";
    $telephone=$_GET["telephone"];
    $sadr="VIRTA";
    $text="Текущий курс ".$_GET["namerate"]." равен ".$_GET["rate"]." p";//
    $text=ereg_replace(" ","%20",$text);
    $status=file_get_contents('http://web2.smsgorod.ru/sendsms.php?user='.$login.'&pwd='.$password.'&sadr='.$sadr.'&text='.$text.'&dadr='.$telephone);
    echo $status;//file_get_contents('http://web2.smsgorod.ru/sendsms.php?user='.$login.'&pwd='.$password.'&smsid='.$status);
}
function sendSMS1(){
    $login="z1474702982409";
    $password='334906';
    $telephone='%2B'.$_GET["telephone"];
    $text="Rate ".$_GET["namerate"]." - ".$_GET["rate"]." RUB";
    $convertedText = mb_convert_encoding($text, 'utf-8', mb_detect_encoding($text));
    $send_url='https://api.iqsms.ru/messages/v2/send/?login='.$login.'&password='.$password.'&phone='.$telephone.'&text='.$convertedText;
    $status_url='http://api.iqsms.ru/messages/v2/status/?login='.$login.'&password='.$password.'&id=1960568532';
    $send=file_get_contents($send_url);
    echo $send."<br>";
    //echo $convertedText;

}
?>