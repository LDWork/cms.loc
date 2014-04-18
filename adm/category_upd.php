<?php
$id_cat = $_GET['id_cat'];
bd_open();
$res = mysql_query("SELECT * FROM category WHERE category_id = '$id_cat' ");
$row = mysql_fetch_array($res);
$this_parent_cat_id = $row['parent_category'];
?>
<h1>
    <small class="text-info">Изменить категорию</small>
</h1>
<form action="/adm/?view=category_all&action=upd&id_cat=<?php echo $id_cat; ?>" method="POST">
    <input name="posted" type="hidden" value="true">

    <div class="controls-row">
        <div class="span4">
            <div class="control-group">
                <label for="name_category">Название категории: </label>
                <input type="text" name="name_category" class="input-xlarge"
                       value="<?php echo $row['name_category'] ?>">

                <label for="description">Описание категории:</label>
                <textarea rows="4" name="description" class="input-xlarge"><?php echo $row['description'] ?></textarea>
            </div>
        </div>
        <div class="span3">
            <div class="control-group">
                <label for="alias">Псевдоним категории: </label>
                <input type="text" name="alias" class="input-xlarge" value="<?php echo $row['alias'] ?>">

                <label for="parent_category">Родительская категория:</label>
                <select class="input-xlarge" name="parent_category">
                    <option value="0">Выбрать категорию</option>
                    <?php
                    bd_open();
                    $res = mysql_query("SELECT category_id, name_category, parent_category FROM category ORDER by category_id");
                    while ($row = mysql_fetch_array($res)) {
                        if ($row['category_id'] != 1) {
                            if ($this_parent_cat_id == $row['category_id']) {
                                $selected = 'selected';
                            }
                            else {
                                $selected = '';
                            }
                            echo '<option value="' . $row['category_id'] . '"' . $selected . '>' . $row['name_category'] . '</option>';
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