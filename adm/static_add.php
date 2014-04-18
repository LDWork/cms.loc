<h1><small class="text-info">Статическая страница</small></h1>
<script src="ckeditor/ckeditor.js"></script>
<form action="/adm/?view=static_all&action=add" method="POST" class="form-horizontal">
    <input name="posted" type="hidden" value="true">
    <div class="control-group">
        <label for="title">Название статьи: </label>
        <input type="text" name="title" class="input-xxlarge">
    </div>
    <div class="control-group">
        <label for="alias">Псевдоним страницы: </label>
        <input type="text" name="alias" class="input-xlarge"> <small class="muted">(только латинские буквы)</small>
    </div>    
   <div class="control-group">
        <label for="date">Дата публикации: </label>
        <?php date_select(); ?>
    </div>    
     <div class="control-group">
       <label class="control-label" for="content">Содержимое страницы:</label><br /><br />
       
       <textarea name="content" rows="20" class="span8"></textarea>
            <script type="text/javascript">
            CKEDITOR.replace('content',{
            toolbar : 'Basic'
            });
        </script>
    </div>
    
    <div class="controls-row">
        <div class="span4">
            <label class="checkbox">
                    <input type="checkbox" name="pub" value="1">
                    Опубликовать?
            </label>
            <br />
        <div class="control-group">
        <label for="tegs">Теги: </label>
        <input type="text" name="tegs" class="input-xlarge"><p class="muted"><small>(через запятую)</small></p>
        </div>   
        </div>
        <div class="span3">
            <label for="seotitle">Заголовок страницы:</label>
            <input type="text" name="seotitle" class="input-xlarge">
            
            <label for="keywords">Ключевые слова:</label>
            <input type="text" name="keywords" class="input-xlarge">

            <label for="description">Описание страницы:</label>
            <textarea rows="5" class="input-xlarge" name="description"></textarea>
        </div>
    </div>
    
    <div class="control-group">
        <br /><button type="submit" class="btn btn-primary">Сохранить</button>
    </div>
</form>

