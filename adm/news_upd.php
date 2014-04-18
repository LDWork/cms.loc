<?php
    $id_news = $_GET['id_news'];
    bd_open();
    $res = mysql_query ("SELECT * FROM news WHERE id = $id_news");
    $row = mysql_fetch_array($res);
?>
<h1><small class="text-info">Новость</small></h1>

<form action="/adm/?view=news_all&action=upd&id_news=<?php echo $_GET['id_news']?>" method="POST" class="form-horizontal">
    <input name="posted" type="hidden" value="true">
    <div class="control-group">
        <label for="title">Название новости: </label>
        <input type="text" id="title" name="title" class="input-xxlarge" value="<?php echo $row['title']?>">
    </div>
        <div class="control-group">
        <label for="alias">Псевдоним новости: </label>
        <input type="text" id="alias" name="alias" class="input-xlarge" value="<?php echo $row['alias']?>"> <small class="muted">(только латинские буквы)</small>
    </div>    
   <div class="control-group">
        <label for="date">Дата публикации: </label>
        <?php date_select(); ?>
    </div>
    
    <script src="ckeditor/ckeditor.js"></script> 
     <div class="control-group">
       <label class="control-label" for="shortcontent">Краткая новость:</label><br /><br />
       <textarea name="shortcontent" id="shortcontent"  rows="20" class="span8"><?php echo $row['shortcontent']?></textarea>
       <script type="text/javascript">
            CKEDITOR.replace('shortcontent',{
            toolbar : 'Basic'
            });
        </script>
    </div>
    
     <div class="control-group">
       <label class="control-label" for="content">Полная новость:</label><br /><br />
       <textarea name="fullcontent" id="content" rows="20" class="span8"><?php echo $row['fullcontent']?></textarea>
              <script type="text/javascript">
            CKEDITOR.replace('fullcontent',{
            toolbar : 'Basic'
            });
        </script>
    </div>
    <div class="controls-row">
        <div class="span4">
            <label class="checkbox">
                    <input type="checkbox" <?php if($row['pub'] == 1 ){echo 'checked="checked"';}?> name="pub" value="1">
                    Опубликовать?
            </label>
            <br />
        <div class="control-group">
        <label for="tegs">Теги: </label>
        <input type="text" id="tegs" name="tegs" class="input-xlarge" value="<?php echo $row['tegs']?>"><p class="muted"><small>(через запятую)</small></p>
        </div>   
        </div>
        <div class="span3">
             <label for="seotitle">Заголовок страницы:</label>
            <input type="text" id="seotitle" name="seotitle" class="input-xlarge" value="<?php echo $row['seotitle']?>">
            
            <label for="keywords">Ключевые слова:</label>
            <input type="text" id="keywords" name="keywords" class="input-xlarge" value="<?php echo $row['keywords']?>">

            <label for="description">Описание страницы:</label>
            <textarea rows="5" id="description" class="input-xlarge" name="description"><?php echo $row['description']?></textarea>
        </div>
    </div>
    
    <div class="control-group">
        <br /><button type="submit" class="btn btn-primary">Сохранить</button>
    </div>
</form>
