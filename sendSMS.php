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
 * функция для работы с внешним сервисом http://smsgorod.ru/
 */
function sendSMS(){
    $login="Marina1234562016";
    $password="marina2015";
    $telephone=$_GET["telephone"];
    $telephone=deleteSimbols($telephone);

    $sadr="VIRTA";
    $text="Текущий курс ".$_GET["namerate"]." ".$_GET["rate"]." p";//

    $status=file_get_contents('http://web2.smsgorod.ru/sendsms.php?user='.$login.'&pwd='.$password.'&sadr='.$sadr.'&text='.$text.'&dadr='.$telephone);
    echo $status;
}
?>