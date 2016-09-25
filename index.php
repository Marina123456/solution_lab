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
    <link rel="stylesheet" type="text/css" href="css/style.css" >
    <link rel="stylesheet" type="text/css" href="css/select2.min.css" >
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <!--маска ввода-->
    <script type="text/javascript" src="./js/jquery.maskedinput.min.js"></script>
    <!--валидация-->
    <script  type="text/javascript" src="./js/jquery.valid8.js"charset="utf-8"></script>
    <!--адаптивная верстка-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="all_info">
<form method="POST"  action="javascript:sendSMS();" class="mainform">
    <h1>Отправка смс с курсом валют</h1>
    <label>Выберите валюту </label><br>
    <select name="rate" id="rate" onchange="showRate()">
        <?$r1=getRate();
        foreach ($r1 as $item):?>
            <option value="<? echo $item->Value;?>"><? echo $item->CharCode;?></option>
        <?php endforeach; ?>
    </select><br>
    </select><br>
    <label id="rate_label"></label><br>
    <label>Введите номер телефона</label>
    <input name="telephone" id="telephoneNumber" type="tel" value=""><br>
    <span id="telephoneNumberValidationMessage" class="validationMessage"></span>
    <br>
    <input type="submit" class="btnSubmit" value="Отправить смс">

</form>
<svg class="smartphone" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     viewBox="0 0 450.06 450.06" style="enable-background:new 0 0 450.06 450.06;" xml:space="preserve">
<g>
    <path d="M138.1,49.839h53.847c4.142,0,7.5-3.358,7.5-7.5s-3.358-7.5-7.5-7.5H138.1c-4.142,0-7.5,3.358-7.5,7.5
		S133.958,49.839,138.1,49.839z"/>
    <path d="M165.023,387.482c-10.54,0-19.114,8.574-19.114,19.114s8.574,19.114,19.114,19.114s19.114-8.574,19.114-19.114
		S175.563,387.482,165.023,387.482z M165.023,410.71c-2.269,0-4.114-1.845-4.114-4.114s1.845-4.114,4.114-4.114
		s4.114,1.845,4.114,4.114S167.292,410.71,165.023,410.71z"/>
    <path d="M403.444,105.717h-96.366V29.48c0-16.255-13.225-29.48-29.48-29.48H52.449c-16.255,0-29.48,13.225-29.48,29.48v391.11
		c0,16.25,13.225,29.47,29.48,29.47h225.15c16.255,0,29.48-13.22,29.48-29.47V287.752h96.366c13.039,0,23.647-10.608,23.647-23.647
		V129.364C427.091,116.325,416.483,105.717,403.444,105.717z M292.079,420.59c0,7.979-6.496,14.47-14.48,14.47H52.449
		c-7.984,0-14.48-6.491-14.48-14.47V29.48c0-7.984,6.496-14.48,14.48-14.48h225.15c7.984,0,14.48,6.496,14.48,14.48v76.237h-11.39
		V75.85c0-4.142-3.358-7.5-7.5-7.5H56.858c-4.142,0-7.5,3.358-7.5,7.5v298.36c0,4.142,3.358,7.5,7.5,7.5h216.33
		c4.142,0,7.5-3.358,7.5-7.5v-78.827l10.943-7.631h0.447V420.59z M186.065,287.752h32.823v36.353c0,2.794,1.553,5.356,4.03,6.649
		c1.091,0.569,2.282,0.851,3.469,0.851c1.507,0,3.008-0.454,4.291-1.348l35.011-24.414v60.867H64.358V83.35h201.33v22.367h-79.624
		c-13.039,0-23.647,10.608-23.647,23.647v134.741C162.417,277.144,173.026,287.752,186.065,287.752z M412.091,264.105
		c0,4.768-3.879,8.647-8.647,8.647h-114.17c-1.534,0-3.032,0.471-4.29,1.348l-51.097,35.631v-29.479c0-4.142-3.358-7.5-7.5-7.5
		h-40.323c-4.768,0-8.647-3.879-8.647-8.647V129.364c0-4.768,3.879-8.647,8.647-8.647h217.379c4.768,0,8.647,3.879,8.647,8.647
		V264.105z"/>
    <path d="M373.261,151.834H216.249c-4.142,0-7.5,3.358-7.5,7.5s3.358,7.5,7.5,7.5h157.012c4.142,0,7.5-3.358,7.5-7.5
		S377.403,151.834,373.261,151.834z"/>
    <path d="M373.261,189.234H216.249c-4.142,0-7.5,3.358-7.5,7.5s3.358,7.5,7.5,7.5h157.012c4.142,0,7.5-3.358,7.5-7.5
		S377.403,189.234,373.261,189.234z"/>
    <path d="M373.261,226.634H216.249c-4.142,0-7.5,3.358-7.5,7.5s3.358,7.5,7.5,7.5h157.012c4.142,0,7.5-3.358,7.5-7.5
		S377.403,226.634,373.261,226.634z"/>
</g>

</svg>
</div>
<script src="js/select2.min.js"></script>
<script type='text/javascript'>
    function showRate(){
        $("#rate_label").text("Курс равен: "+$("#rate :selected").val()+' p.');
    }
    showRate();

    function sendSMS() {
        if ((document.getElementById('telephoneNumberValidationMessage').innerHTML!='') || ($("#telephoneNumber").val()=='') ){
            alert('Не введен телефон!');
            return;
        }
        var str_par =$('form').serialize();
        str_par=str_par+'&namerate='+$("#rate :selected").text();
        console.log('sendSMS.php?'+str_par);
        $('.all_info').text('Ожидание ответа от сервера...');
        $.ajax({
            url: 'sendSMS.php?'+str_par,
            type: 'GET',
            crossDomain: true,
            success: function (data) {
                console.log(data);
                $('.all_info').text('СМС отправлен!');
            },
            error:function(data){
                console.log(data);
                $('.all_info').text('Ошибка :( Попробуйте в следущий раз');
            }
        });
    }

    function formatState (state) {
        if (!state.id) { return  state.text;}
        var $state = $(
                '<span><img src="img/' + state.text + '.png" class="img-flag" /> <span class="title_color">' + state.text + '</span></span>'
                );
        return $state;
    };

    $("#rate").select2({
        templateResult: formatState,
        templateSelection:formatState
    });

    $("#telephoneNumber").mask("9 (999) 999-9999");
    $('#telephoneNumber').valid8({
                    'regularExpressions': [
                     { expression: /^.+$/, errormessage: 'Вы не ввели телефон!'},
                     { expression: /^((8|7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/, errormessage: 'Запишите телефон правильно!'}
                   ]});

</script>
</body>
</html>
