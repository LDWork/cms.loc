<?php
if (isset($_GET['action'])) {
    $action = clearStr($_GET['action']);
    if ($action == '') {
        unset($action);
    }
}
if (isset($_GET['id_stat'])) {
    $id_stat = clearStr($_GET['id_stat']);
    if ($id_stat == '') {
        unset($id_stat);
    }
}
// по какому параметру сортируем
if (isset($_GET['sort'])) {
    $sort = clearStr($_GET['sort']);
} else {
    $sort = 'unsort';
    $course_revers = "DESC";
}
// В какую сторону сортируем
if (isset($_GET['course'])) {
    $course = clearStr($_GET['course']);

    if($_GET['course'] == 'ASC'){
        $course_revers = "DESC";
    }
    else {
        $course_revers = "ASC";
    }

} else {
    $course = 'ASC';
}

if (isset($_POST['posted'])) {
    if (isset($_POST['title'])) {
        $title = clearStr($_POST['title']);
        if ($title == '') {
            unset($title);
        }
    }
    if (isset($_POST['content'])) {
        $content = clearStr($_POST['content']);
        if ($content == '') {
            unset($content);
        }
    }
    if (isset($_POST['seotitle'])) {
        $seotitle = clearStr($_POST['seotitle']);
        if ($seotitle == '') {
            unset($seotitle);
        }
    }
    if (isset($_POST['keywords'])) {
        $keywords = clearStr($_POST['keywords']);
        if ($keywords == '') {
            unset($keywords);
        }
    }
    if (isset($_POST['description'])) {
        $description = clearStr($_POST['description']);
        if ($description == '') {
            unset($description);
        }
    }
    if (isset($_POST['tegs'])) {
        $tegs = clearStr($_POST['tegs']);
        if ($tegs == '') {
            unset($tegs);
        }
    }
    if (isset($_POST['pub'])) {
        $pub = '1';
    } else {
        $pub = '0';
    }
    $date = $_POST['date-year'] . '-' . $_POST['date-month'] . '-' . $_POST['date-day'];

    if (isset($_POST['alias'])) {
        $alias = clearStr($_POST['alias']);
        $alias = translit($alias);
        if ($alias == '') {
            $alias = translit($title);
        }
        $alias = mb_strtolower($alias, 'utf-8');
    }
}

bd_open();
//  Удаляем статическую страницу
if (isset($action)) {
    if ($action == "trash") {
        ToTrashStat($id_stat);
    } // Публикуем статью блога, ну или снимаем с публикации
    elseif ($action == "pub") {
        PubStat($id_stat, $pub);
    } // Добавляем новую статью в блог
    elseif ($action == "add") {
        NewStat($title, $content, $seotitle, $keywords, $description, $tegs, $pub, $date, $alias);
    } // Изменяем статью блога
    elseif ($action == "upd") {
        UpdStat($id_stat, $title, $seotitle, $content, $keywords, $description, $tegs, $pub, $date, $alias);
    } elseif ($action == "tohell") {
        GoToHellStat($id_stat);
    } elseif ($action == "return") {
        RetFromTrash($id_stat);
    }
}
# Выводим содержимое корзины
if ($sort == 'trash') {

    echo '<h1><small class="text-info">Корзина</small></h1>';

    $res = mysql_query("SELECT * FROM static WHERE trash='1'");

    if (mysql_num_rows($res) == 0) {
        echo '<div class="alert alert-info"><b>В корзине нет удаленных элементов.</b><br />Чистота и порядок.</div>';
    }
    else {
        echo '<table  class="table table-striped table-bordered">';
        echo '<thead>';
        echo '<tr>';
        echo '<th style="text-align: center;">ID</th>';
        echo '<th style="text-align: center;">Дата</th>';
        echo '<th style="text-align: center;">Заголовок</th>';
        echo '<th style="text-align: center;">Восстановить</th>';
        echo '<th style="text-align: center;">DEL</th>';
        echo '</tr>';
        echo '</thead>';


        while ($row = mysql_fetch_array($res)) {

            $linc_tohell = '<a href="?view=static_all&sort=trash&action=tohell&id_stat=' . $row['id'] . '"><li class="icon-remove"></li></a>';
            $linc_return = '<a href="?view=static_all&sort=trash&action=return&id_stat=' . $row['id'] . '"><li class="icon-hand-right"></li></a>';

            $rowtbl = '<tr><td>' . $row['id'] . '</td>';
            $rowtbl .= '<td>' . $row['date'] . '</td>';
            $rowtbl .= '<td><a href="' . $SITE_URL . 'static.php?&id=' . $row['id'] . '">' . $row['title'] . '</a></td>';
            $rowtbl .= '<td style="text-align: center;">' . $linc_return . '</td>';
            $rowtbl .= '<td style="text-align: center;">' . $linc_tohell . '</td></tr>';

            echo $rowtbl;
        }
        echo '</table>';
        echo '<div class="alert alert-info"><b>Внимание!</b> После удаления восстановить будет невозможно!</div>';
    }
} ##Выводим страницы в зависимости от сортировки
else {
    echo '<h1><small class="text-info">Статические страницы</small></h1>';

    echo '<table  class="table table-striped table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th style="text-align: center;">ID</th>';
    echo '<th style="text-align: center;"><a href="?view=static_all&sort=date&course='.$course_revers.'">Дата</a></th>';
    echo '<th style="text-align: center;"><a href="?view=static_all&sort=title&course='.$course_revers.'">Заголовок</a></th>';
    echo '<th style="text-align: center;"><a href="?view=static_all&sort=public&course='.$course_revers.'">PUBL</th>';
    echo '<th style="text-align: center;">EDT</th>';
    echo ' <th style="text-align: center;">DEL</th>';
    echo '</tr>';
    echo '</thead>';
    if ($sort == 'unsort') {
        $res = mysql_query("SELECT * FROM static WHERE trash!='1' ORDER BY id $course");
    } elseif ($sort == 'title') {
        $res = mysql_query("SELECT * FROM static WHERE trash!='1' ORDER BY title $course");
    } elseif ($sort == 'date') {
        $res = mysql_query("SELECT * FROM static WHERE trash!='1' ORDER BY date $course");
    } elseif ($sort == 'public') {
        $res = mysql_query("SELECT * FROM static WHERE trash!='1' ORDER BY pub $course");
    }

    while ($row = mysql_fetch_array($res)) {
        if ($row['pub'] == 1) {
            $pubico = '<i class="icon-eye-open" style="color: #f00;"></i>';
        } else {
            $pubico = '<i class="icon-eye-close opacity-05"></i>';
        }

        $linc_edt = '<a href="?view=static_upd&id_stat=' . $row['id'] . '" /><i class="icon-pencil"></i></a>';
        $linc_del = '<a href="?view=static_all&action=trash&id_stat=' . $row['id'] . '"><li class="icon-trash"></li></a>';

        $rowtbl = '<tr><td>' . $row['id'] . '</td>';
        $rowtbl .= '<td>' . $row['date'] . '</td>';
        $rowtbl .= '<td><a href="' . $SITE_URL . 'static.php?&id=' . $row['id'] . '" target=_blank>' . $row['title'] . '</a></td>';
        // TODO опубликовать из списка страниц
        $rowtbl .= '<td style="text-align: center;">' . $pubico . '</td>';
        $rowtbl .= '<td style="text-align: center;">' . $linc_edt . '</td>';
        $rowtbl .= '<td style="text-align: center;">' . $linc_del . '</td></tr>';
        echo $rowtbl;

    }
    echo '</table>';
}


?>
