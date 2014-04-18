<?php
if (isset($_GET['action'])) {
    $action = clearStr($_GET['action']);
    if ($action == '') {
        unset($action);
    }
}
if (isset($_GET['id_cat'])) {
    $id_cat = clearStr($_GET['id_cat']);
    if ($id_cat == '') {
        unset($id_cat);
    }
}

if (isset($_POST['posted'])) {

    if (isset($_POST['name_category'])) {
        $name_category = clearStr($_POST['name_category']);
        if ($name_category == '') {
            unset($name_category);
        }
    }

    if (isset($_POST['description'])) {
        $description = clearStr($_POST['description']);
    }

    if (isset($_POST['alias'])) {
        $alias =  strtolower(clearStr($_POST['alias']));
        if ($alias == '') {
            $alias = translit($name_category);
            $alias =  strtolower($alias);
        }
    }

    if (isset($_POST['parent_category'])) {
        $parent_category = clearStr($_POST['parent_category']);
        if ($parent_category == '') {
            $parent_category = 1;
        }
    }
}

bd_open();

if (isset($action)) {
    // Добавить категорию
    if ($action == "add") {
        NewCat($name_category, $description, $alias, $parent_category);
    } // Изменить категорию
    elseif ($action == "upd") {
        UpdCat($id_cat, $name_category, $description, $alias, $parent_category);
    } // Удалить категорию
    elseif ($action == "totrash") {
        DelCat($id_cat);
    }
}

?>
<div class="row">
    <div class="span5">
        <h1>
            <small class="text-info">Все категории</small>
        </h1>
    </div>
    <div class="span3">
        <br><a class="btn btn-primary pull-right" href="/adm/?view=category_add"><i class="icon-tasks icon-white"> </i>
            Добавить категорию</a>
    </div>
</div>
<div class="row">
    <div class="span8">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th class="center" width="30">ID</th>
                <th>Название</th>
                <th class="center" width="130">Ярлык</th>
                <th class="center" width="80">Записи</th>
                <th class="center" width="35">EDT</th>
                <th class="center" width="35">DEL</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th class="center">ID</th>
                <th>Название</th>
                <th class="center">Ярлык</th>
                <th class="center">Записи</th>
                <th class="center">EDT</th>
                <th class="center">DEL</th>
            </tr>
            </tfoot>

            <?php
            $res = mysql_query("SELECT * FROM category");

            while ($row = mysql_fetch_array($res)) {

                // TODO Сделать подсчет количества постов в категории
                $num_post_in_cat = 10;

                $linc_edt = '<a href="?view=category_upd&id_cat=' . $row['category_id'] . '" /><i class="icon-pencil"></i></a>';
                $linc_del = '<a href="?view=category_all&action=totrash&id_cat=' . $row['category_id'] . '"><li class="icon-remove"></li></a>';

                if($row["category_id"] == 1){
                    $linc_edt = '';
                    $linc_del = '';
                }


                $table_cat = '<tr>';
                $table_cat .= ' <td class="center">' . $row["category_id"] . '</td>';
                $table_cat .= '<td><a href="#">' . $row["name_category"] . '</a></td>';
                $table_cat .= '<td class="center">' . $row["alias"] . '</td>';
                $table_cat .= '<td class="center">' . $num_post_in_cat . '</td>';
                $table_cat .= '<td class="center">' . $linc_edt . '</i></td>';
                // TODO   зделать вопрос на подтверждение удаления
                $table_cat .= '<td class="center">' . $linc_del . '</td>';
                $table_cat .= '</tr>';

                echo $table_cat;


            }
            ?>
        </table>
    </div>
</div>


<?php

?>
