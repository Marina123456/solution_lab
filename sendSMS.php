<?
header("Content-type: text/html; charset=utf-8");

sendSMS();

/**
 * функция для того чтобы убрать лищние символы в строке телефона
 * полученного от пользователя
 * @param $telephone
 * @return mixed измененная строка
 */
function deleteSimbols($telephone){
    $telephone = str_replace("+", "", $telephone);
    $telephone = str_replace("(", "", $telephone);
    $telephone = str_replace(")", "", $telephone);
    $telephone = str_replace(" ", "", $telephone);
    $telephone = str_replace("-", "", $telephone);
    return $telephone;
}
/**
 * функция для работы с внешним сервисом http://iqsms.ru/
 */
function sendSMS(){
    $login="z1474702982409";
    $password='334906';
    $telephone='%2B'.$_GET["telephone"];
    $telephone=deleteSimbols($telephone);
    $text="Rate ".$_GET["namerate"]." - ".$_GET["rate"]." RUB";
    $convertedText = mb_convert_encoding($text, 'utf-8', mb_detect_encoding($text));
    $send_url='https://api.iqsms.ru/messages/v2/send/?login='.$login.'&password='.$password.'&phone='.$telephone.'&text='.$convertedText;
    $send=file_get_contents($send_url);//запрос к api
    echo $send."<br>";

}
?>