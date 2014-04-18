<?php

bd_open();
// функция добавления категории
function NewCat($name_category, $description, $alias, $parent_category)
{
    if (isset($name_category)) {
        $res = mysql_query("SELECT * FROM category WHERE name_category = '$name_category' ");
        if (mysql_num_rows($res) >= 1) {
            $f_message = '<div class="alert alert-error">Такая категория уже существует.<br />';
            $f_message .= '<form><input style="margin: 10px 0 0 0;" class="btn btn-mini btn-warning" type="button" value="Вернуться" onClick="history.go(-1)"></form></div>';
        }
        else {
            $res = mysql_query("SELECT * FROM category WHERE alias = '$alias' ");
            if (mysql_num_rows($res) >= 1) {
                $f_message = '<div class="alert alert-error">Категория с таким ярлыком уже существует.<br />';
                $f_message .= '<form><input style="margin: 10px 0 0 0;" class="btn btn-mini btn-warning" type="button" value="Вернуться" onClick="history.go(-1)"></form></div>';
            }
            else {
                $result = mysql_query("INSERT INTO category (name_category, description, alias, parent_category) VALUES ('$name_category', '$description', '$alias', '$parent_category')");
                if ($result == 'true') {
                    $f_message = '<div  class="alert alert-success">Категория успешно добавлена!</div>';
                } else {
                    $f_message = '<div class="alert alert-error">Категория не добавлена!</div>';
                    $f_message .= '<form><input style="margin: 10px 0 0 0;" class="btn btn-mini btn-warning" type="button" value="Вернуться" onClick="history.go(-1)"></form></div>';
                }
            }
        }
    }
    else {
        $f_message = '<div class="alert alert-error">Введите заголовок категории.<br />';
        $f_message .= '<form><input style="margin: 10px 0 0 0;" class="btn btn-mini btn-warning" type="button" value="Вернуться" onClick="history.go(-1)"></form></div>';
    }

    echo $f_message;
}


// Функция изменения категории
function UpdCat($id_cat, $name_category, $description, $alias, $parent_category)
{
    if (isset($name_category)) {
        $res = mysql_query("SELECT * FROM category WHERE name_category = '$name_category' AND category_id <> '$id_cat' ");
        if (mysql_num_rows($res) >= 1) {
            $f_message = '<div class="alert alert-error">Такая категория уже существует.<br />';
            $f_message .= '<form><input style="margin: 10px 0 0 0;" class="btn btn-mini btn-warning" type="button" value="Вернуться" onClick="history.go(-1)"></form></div>';
        }
        else {
            $res = mysql_query("SELECT * FROM category WHERE alias = '$alias' AND category_id <> '$id_cat' ");
            if (mysql_num_rows($res) >= 1) {
                $f_message = '<div class="alert alert-error">Категория с таким ярлыком уже существует.<br />';
                $f_message .= '<form><input style="margin: 10px 0 0 0;" class="btn btn-mini btn-warning" type="button" value="Вернуться" onClick="history.go(-1)"></form></div>';
            }
            else {
                $result = mysql_query("UPDATE category SET name_category='$name_category', description='$description', alias='$alias', parent_category='$parent_category' WHERE category_id='$id_cat'");
                if ($result == 'true') {
                    $f_message = '<div  class="alert alert-success">Категория успешно изменена!</div>';
                } else {
                    $f_message = '<div class="alert alert-error">Категория не изменена!</div>';
                    $f_message .= '<form><input style="margin: 10px 0 0 0;" class="btn btn-mini btn-warning" type="button" value="Вернуться" onClick="history.go(-1)"></form></div>';
                }
            }
        }
    }
    else {
        $f_message = '<div class="alert alert-error">Введите заголовок категории.<br />';
        $f_message .= '<form><input style="margin: 10px 0 0 0;" class="btn btn-mini btn-warning" type="button" value="Вернуться" onClick="history.go(-1)"></form></div>';
    }

    echo $f_message;
}

function DelCat($id_cat)
{

    // TODO сделать перед удалением перенос всех статей в категорию "Без категории"

    $result = mysql_query("DELETE FROM category WHERE category_id='$id_cat' ");
    if ($result == 'true') {
        $message = '<div  class="alert alert-success">Категория успешно удалена!</div>';
    } else {
        $message = '<div class="alert alert-error">Категория не удалена!</div>';
    }
    echo $message;


}

?>