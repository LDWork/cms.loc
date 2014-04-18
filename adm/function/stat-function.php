<?php
function ToTrashStat($id_stat){
    $result = mysql_query ("UPDATE static SET  trash='1' WHERE id='$id_stat'");
    if ($result == 'true') {
            echo '<div  class="alert alert-success">Ваша страница успешно удалена в корзину!</div>';
	}
	else {
            echo '<div class="alert alert-error">Ваша страница не удалена в корзину!</div>';
	}
}
function PubStat($id_stat, $pub){
    
}

function NewStat($title, $content, $seotitle, $keywords, $description, $tegs, $pub, $date, $alias){

    // TODO Сделать проверку на существование алиаса

    if (isset($title) && isset($content)){
        $result = mysql_query ("INSERT INTO static (date,title,content,pub,seotitle,keywords,description,tegs,alias) VALUES ('$date','$title','$content','$pub','$seotitle','$keywords','$description','$tegs','$alias')");
	if ($result == 'true') {
            echo '<div  class="alert alert-success">Ваша страница успешно добавлена!</div>';
	}
	else {
            echo '<div class="alert alert-error">Ваша страница не добавлена!</div>';
	}
    }		 
    else {
        echo '<div class="alert alert-error">Вы ввели не всю информацию, поэтому страница в базу не может быть добавлена.<br />';
        echo '<form><input style="margin: 10px 0 0 0;" class="btn btn-mini btn-warning" type="button" value="Вернуться" onClick="history.go(-1)"></form></div>';
    }   
}

function UpdStat($id_stat, $title, $content, $seotitle, $keywords, $description, $tegs, $pub, $date, $alias) {

    // TODO Сделать проверку на существование алиаса

    if(isset($title) && isset($content) && isset($alias)){
	$result = mysql_query ("UPDATE static SET date='$date', title='$title', content='$content', seotitle='$seotitle', keywords='$keywords', description='$description',  tegs='$tegs', pub='$pub',  alias='$alias' WHERE id='$id_stat'");

        if ($result == 'true') {
            echo '<div  class="alert alert-success">Ваша заметка успешно изменена!</div>';
	}
	else {
            echo '<div class="alert alert-error">Ваша заметка не обновлена!</div>';
            }
    }
    else {
        echo '<div class="alert alert-error">Вы ввели не всю информацию, поэтому страница в базу не может быть добавлена.<br />';
        echo '<form><input style="margin: 10px 0 0 0;" class="btn btn-mini btn-warning" type="button" value="Вернуться" onClick="history.go(-1)"></form></div>';
    } 
}

#Удаляем окончательно
function GoToHellStat($id_stat){
    $result = mysql_query ("DELETE FROM static WHERE id='$id_stat'");
        if ($result == 'true') {
		$message = '<div  class="alert alert-success">Ваша статья успешно удалена!</div>';}
	else {
		$message = '<div class="alert alert-error">Ваша статья не удалена!</div>';
		}
echo $message;
}
#Вернем из корзины
function RetFromTrash($id_stat) {
   
    if(isset($id_stat)){
	$result = mysql_query ("UPDATE static SET trash='0' WHERE id='$id_stat'");

        if ($result == 'true') {
            echo '<div  class="alert alert-success">Ваша заметка успешно восстановлена!</div>';
	}
	else {
            echo '<div class="alert alert-error">Ваша заметка не восстановлена!</div>';
            }
    }
}


?>
