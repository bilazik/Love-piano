
<?php //Настроено с bitrix24CRM
include('CRM.php'); 

header('Content-Type: text/html; charset=utf-8');

	$Subject="Заявка на бесплатную консультацию";		
	$to="lovepianino@gmail.com, alexander.lovemusic@gmail.com, vova.lovemusic@gmail.com, zakaz@love-piano.ru";
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=utf-8 \r\n";
	$headers .= "From: love-piano.ru ";	
	
	//$url_success_send = "<meta http-equiv='Refresh' content='3; url=http://love-piano.ru'>"; 
	
	$msg= '
		<p> Имя: '.$_POST['name'].' </p>
		<p> Телефон: '.$_POST['phone'].' </p>
	';
		//for CRM.php 

	
	if ($_POST['phone'] == '') {
	echo "<p style='font-size:25;color:red;'>Заполните поле ТЕЛЕФОН</p>";
	echo "<a href='javascript: history.go(-1)'>Вернуться</a>";
	

	}
	
 elseif (mail($to, $Subject, $msg, $headers))
        { 
			echo '<p>Сообщение успешно отправлено!</p>';    
			echo "<a href='javascript: history.go(-1)'>Назад</a>";
			//заполняем переменные для CRM
				$title='Заявка на звонок';
				$name=$_POST['name'];
				$phone=$_POST['phone'];
				echo var_dump($title,$name, $phone);
			
			toCRM();

			
			echo $output;

	    }
			

?>

<form class="form-new" method="post" action="/mail.php">
	
	<p>
        Имя:<input type="text" maxlength="50" name="name" ></input>
</p>
<p>
	Введите ваш телефон: 
            <span class="required" title="Поле обязательно для заполнения">
                *
				    <br></br>

        <input type="tel" maxlength="18" name="phone" title="Номер телефона"></input>
</span>
<br></br>
    
        </span>
		<!--поля для CRM-->
	 </p>
    <input type="submit" value="Получить консультацию!"></input>
</form>
	
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter20057002 = new Ya.Metrika({id:20057002,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/20057002" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

