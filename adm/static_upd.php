<?php
    $id_stat = $_GET['id_stat'];
    bd_open();
    $res = mysql_query ("SELECT * FROM static WHERE id=$id_stat");
    $row = mysql_fetch_array($res);
    $datesozd=$row['date'];
?>
<h1><small class="text-info">Статическая страница</small></h1>

<form action="/adm/?view=static_all&action=upd&id_stat=<?php echo $_GET['id_stat']?>" method="POST" class="form-horizontal">
    <input name="posted" type="hidden" value="true">
    <div class="control-group">
        <label for="title">Название статьи: </label>
        <input type="text" name="title" class="input-xxlarge" value="<?php echo $row['title']?>">
    </div>
    <div class="control-group">
        <label for="alias">Псевдоним страницы: </label>
        <input type="text" name="alias" class="input-xlarge" value="<?php echo $row['alias']?>"> <small class="muted">(только латинские буквы)</small>
    </div>    
   <div class="control-group">
        <label for="date">Дата публикации: </label>
        <?php date_select($datesozd); ?>
    </div>    
     <div class="control-group">
       <label class="control-label" for="content">Содержимое страницы:</label><br /><br />
       <script src="ckeditor/ckeditor.js"></script>
       <textarea name="content" rows="20" class="span8"><?php echo $row['content']?></textarea>
       <script type="text/javascript">
            CKEDITOR.replace('content',{
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
        <input type="text" name="tegs" class="input-xlarge" value="<?php echo $row['tegs']?>"><p class="muted"><small>(через запятую)</small></p>
        </div>   
        </div>
        <div class="span3">
             <label for="seotitle">Заголовок страницы:</label>
            <input type="text" name="seotitle" class="input-xlarge" value="<?php echo $row['seotitle']?>">
            
            <label for="keywords">Ключевые слова:</label>
            <input type="text" name="keywords" class="input-xlarge" value="<?php echo $row['keywords']?>">

            <label for="description">Описание страницы:</label>
            <textarea rows="5" class="input-xlarge" name="description"><?php echo $row['description']?></textarea>
        </div>
    </div>
    
    <div class="control-group">
        <br /><button type="submit" class="btn btn-primary">Сохранить</button>
    </div>
</form>
