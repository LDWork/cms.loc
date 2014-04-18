<h1><small class="text-info">Общие настройки</small></h1>    
<?php
$filename = ('configuration.php');
if(is_writable($filename)){
	echo '<div class="span7 alert alert-info"><strong>OK!</strong> Файл конфигурации (configuration.php) доступен для записи.</div>';
	$desable_but = '';
	}
else {
	echo '<div class="span7 alert alert-error"><strong>Ошибка!</strong> <br />Файл конфигурации (configuration.php) недоступен для записи!</div>';
	$desable_but = 'disabled="disabled"';}
// TODO  Возможность отключать неиспользуемые модули
 ?>

<div class="span7">
<form action="/adm/?view=config_save&action=save" method="POST">
  <fieldset>
  <div class="row">
	<div class="span3 well">
		<label><small class="text-info">Название сайта:</small></label>
		<input type="text" value="<?php echo $SITE_NAME ?>" name="site_name">
                <label><small class="text-info">URL сайта:</small></label>
		<input type="text" value="<?php echo $SITE_URL ?>" name="site_url">
                <label><small class="text-info">Абсолютный путь:</small></label>
		<input type="text" value="<?php if($SITE_PATH == ''){echo dirname(__FILE__);} else {echo $SITE_PATH;} ?>" name="site_path">
                <label><small class="text-info">Email администратора:</small></label>
		<input type="text" value="<?php echo $SITE_MAIL ?>" name="site_mail">
	</div>

	<div class="span3 well">
		<label><small class="text-info">Хост MySQl:</small></label>
		<input type="text" value="<?php echo $BD_HOST ?>" name="bd_host">
                <label><small class="text-info">Базы данных MySQL:</small></label>
		<input type="text" value="<?php echo $BD_NAME ?>" name="bd_name">
                <label><small class="text-info">Имя пользователя:</small></label>
		<input type="text" value="<?php echo $BD_LOGIN?>" name="bd_login">
                <label><small class="text-info">Пароль:</small></label>
		<input type="text" value="<?php echo $BD_PASS?>" name="bd_pass">
	</div>
	</div>
<div class="row"> 
<div class="span3 well">
		<label><small class="text-info">Title:</small></label>
		<input type="text" value="<?php echo $SITE_TITLE ?>" name="site_title">
                <label><small class="text-info">Keywords:</small></label>
		<input type="text" value="<?php echo $SITE_KEYWORDS ?>" name="site_keywords">
                <label><small class="text-info">Description:</small></label>
		<textarea rows="3"  name="site_description"><?php echo $SITE_DESCRIPTION?></textarea>
	</div>
    <div class="span3 well">
        <label class="checkbox">
            <input type="checkbox" <?php if($SITE_WORK == 'off'){echo 'CHECKED';}?> name="site_work" value="off">Выключить сайт? 
        </label>
        <label><small class="text-info">Причина отключения:</small></label>
        <textarea rows="3"  name="site_work_text"><?php echo $SITE_WORK_TEXT ?></textarea>
        <label class="checkbox">
            <input type="checkbox" <?php if($SITE_ERROR == 'on'){echo 'CHECKED';}?> name="site_error" value="on">Включить режим отладки? 
        </label>
    </div>
</div>
    <button type="submit" class="btn">Сохранить</button>
  </fieldset>
</form>
</div>     
