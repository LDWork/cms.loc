<h1>
    <small class="text-info">Добавить категорию</small>
</h1>
<form action="/adm/?view=category_all&action=add" method="POST">
    <input name="posted" type="hidden" value="true">

    <div class="controls-row">
        <div class="span4">
            <div class="control-group">
                <label for="name_category">Название категории: </label>
                <input type="text" name="name_category" class="input-xlarge">

                <label for="description">Описание категории:</label>
                <textarea rows="4" name="description" class="input-xlarge"></textarea>
            </div>
        </div>
        <div class="span3">
            <div class="control-group">
                <label for="alias">Псевдоним категории: </label>
                <input type="text" name="alias" class="input-xlarge">

                <label for="parent_category">Родительская категория:</label>
                <select class="input-xlarge" name="parent_category">
                    <option value="0">Выбрать категорию</option>
                    <?php
                    bd_open();
                    $res = mysql_query("SELECT category_id, name_category FROM category ORDER by category_id");
                    while ($row = mysql_fetch_array($res)) {
                        if($row['category_id'] != 1){
                            echo '<option value="'.$row['category_id'].'">'.$row['name_category'].'</option>';
                        }
                    }
                    bd_close();
                    ?>
                </select>
                <br>
                <br>
                <button type="submit" class="btn btn-primary pull-right">Сохранить</button>
            </div>

        </div>
    </div>
</form>


