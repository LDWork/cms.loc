<?php
//отправить новость в корзину
function ToTrashNews($id_news){
    $result = mysql_query ("UPDATE news SET trash='1' WHERE id='$id_news'");
    if ($result == 'true') {
            echo '<div  class="alert alert-success">Ваша новость успешно удалена в корзину!</div>';
	}
	else {
            echo '<div class="alert alert-error">Ваша новость не удалена в корзину!</div>';
	}
}
//показать или скрыть новость
function PubNews($id_news, $pub){
    
}

// Добавить новуя новость
function NewNews($title, $shortcontent, $fullcontent, $seotitle, $keywords, $description, $tegs, $pub, $date, $alias){

    // TODO Сделать проверку на существование алиаса


    if (isset($title) && isset($fullcontent)){
        $result = mysql_query ("INSERT INTO news (date,title,alias,shortcontent,fullcontent,seotitle,keywords,description,pub,tegs) VALUES ('$date','$title','$alias','$shortcontent','$fullcontent','$seotitle','$keywords','$description','$pub','$tegs')");
	if ($result == 'true') {
            echo '<div  class="alert alert-success">Ваша новость успешно добавлена!</div>';
	}
	else {
            echo '<div class="alert alert-error">Ваша новость не добавлена!</div>';
	}
    }		 
    else {
        echo '<div class="alert alert-error">Вы ввели не всю информацию, поэтому новость в базу не может быть добавлена.<br />';
        echo '<form><input style="margin: 10px 0 0 0;" class="btn btn-mini btn-warning" type="button" value="Вернуться" onClick="history.go(-1)"></form></div>';
    }   
}
// Изменяем новость
function UpdNews($id_news, $title, $shortcontent, $fullcontent, $seotitle, $keywords, $description, $tegs, $pub, $date, $alias) {

    // TODO Сделать проверку на существование алиаса

    if(isset($title) && isset($fullcontent) && isset($alias)){
	$result = mysql_query ("UPDATE news SET date='$date', title='$title', shortcontent='$shortcontent', fullcontent='$fullcontent', seotitle='$seotitle',keywords='$keywords', description='$description',  tegs='$tegs', pub='$pub',  alias='$alias' WHERE id='$id_news'");

        if ($result == 'true') {
            echo '<div  class="alert alert-success">Ваша новость успешно изменена!</div>';
	}
	else {
            echo '<div class="alert alert-error">Ваша новость не обновлена!</div>';
            }
    }
    else {
        echo '<div class="alert alert-error">Вы ввели не всю информацию, поэтому новость в базу не может быть добавлена.<br />';
        echo '<form><input style="margin: 10px 0 0 0;" class="btn btn-mini btn-warning" type="button" value="Вернуться" onClick="history.go(-1)"></form></div>';
    } 
}

// Удаляем насовсем
function GoToHellNews($id_news){
    $result = mysql_query ("DELETE FROM news WHERE id='$id_news'");
        if ($result == 'true') {
		$message = '<div  class="alert alert-success">Ваша новость успешно удалена!</div>';}
	else {
		$message = '<div class="alert alert-error">Ваша новость не удалена!</div>';
		}
echo $message;
}

// Вернем из корзины
function RetFromTrashNews($id_news) {
   
    if(isset($id_news)){
	$result = mysql_query ("UPDATE news SET trash='0' WHERE id='$id_news'");

        if ($result == 'true') {
            echo '<div  class="alert alert-success">Ваша новость успешно восстановлена!</div>';
	}
	else {
            echo '<div class="alert alert-error">Ваша новость не восстановлена!</div>';
            }
    }
}


?>
