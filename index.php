<?php
header("Content-type: text/html; charset=utf-8");
function getRate(){
    $doc = file('http://www.cbr.ru/scripts/XML_daily.asp');
    $doc = implode($doc, '');
    $xml_doc=simplexml_load_string($doc);
    return $xml_doc->Valute;
}
?>
<!DOCTYPE Html>
<html>
<head>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
</head>
<body>
<h1>Отправка смс с курсом валют</h1>

<form method="POST"  action="javascript:sendSMS();">
    <label>Выберите отсылаемый курс валют</label><br>
    <select name="rate" id="rate" onchange="showRate()">
        <?$r1=getRate();
        foreach ($r1 as $item):?>
            <option value="<? echo $item->Value;?>"><? echo $item->CharCode;?></option>
        <?php endforeach; ?>
    </select><br>
    </select><br>
    <label id="rate_label"></label><br>
    <label>Введите номер телефона</label>
    <input name="telephone" id="telephoneNumber" type="tel" value="+79052523998"><br>
    <input type="submit" value="Отправить смс">

</form>
<script type='text/javascript'>
    function showRate(){
        $("#rate_label").text("Курс равен: "+$("#rate :selected").val()+' p.');
    }
    function sendSMS() {
        var str_par =$('form').serialize();
        str_par=str_par+'&namerate='+$("#rate :selected").text();
        console.log('sendSMS.php?'+str_par);
        $.ajax({
            url: 'sendSMS.php?'+str_par,
            type: 'GET',
            crossDomain: true,
            success: function (data) {
                console.log(data);
            },
            error:function(data){
                console.log(data);
            }
        });

    }
</script>
</body>
</html>
