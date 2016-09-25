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
 * функция для работы с внешним сервисом
 */
function sendSMS(){
    $login="z1474813326220";
    $password='308892';

    $telephone=deleteSimbols($_GET["telephone"]);
    $telephone='%2B'.$telephone;

    $text="Rate ".$_GET["namerate"]." - ".$_GET["rate"]." RUB";

    $convertedText = mb_convert_encoding($text, 'utf-8', mb_detect_encoding($text));

    $send_url='http://api.iqsms.ru/messages/v2/send/?login='.$login.'&password='.$password.'&phone='.$telephone.'&text='.$convertedText;

    $send=file_get_contents($send_url);
    echo $send."<br>";
}
?>