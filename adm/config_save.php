<?php
if (isset($_POST['site_name'])) {
    $site_name = $_POST['site_name'];
} else {
    $site_name = $SITE_NAME;
}
if (isset($_POST['site_url'])) {
    $site_url = $_POST['site_url'];
} else {
    $site_url = $SITE_URL;
}
if (isset($_POST['site_mail'])) {
    $site_mail = $_POST['site_mail'];
} else {
    $site_mail = $SITE_MAIL;
}
if (isset($_POST['site_path'])) {
    $site_path = $_POST['site_path'];
} else {
    $site_path = $SITE_PATH;
}
if (isset($_POST['bd_host'])) {
    $bd_host = $_POST['bd_host'];
} else {
    $bd_host = $BD_HOST;
}
if (isset($_POST['bd_name'])) {
    $bd_name = $_POST['bd_name'];
} else {
    $bd_name = $BD_NAME;
}
if (isset($_POST['bd_login'])) {
    $bd_login = $_POST['bd_login'];
} else {
    $bd_login = $BD_LOGIN;
}
if (isset($_POST['bd_pass'])) {
    $bd_pass = $_POST['bd_pass'];
} else {
    $bd_pass = $BD_PASS;
}
if (isset($_POST['site_title'])) {
    $site_title = $_POST['site_title'];
} else {
    $site_title = $SITE_TITLE;
}
if (isset($_POST['site_keywords'])) {
    $site_keywords = $_POST['site_keywords'];
} else {
    $site_keywords = $SITE_KEYWORDS;
}
if (isset($_POST['site_description'])) {
    $site_description = $_POST['site_description'];
} else {
    $site_description = $SITE_DESCRIPTION;
}
if (isset($_POST['site_work'])) {
    $site_work = $_POST['site_work'];
} else {
    $site_work = 'on';
}
if (isset($_POST['site_work_text'])) {
    $site_work_text = $_POST['site_work_text'];
} else {
    $site_work_text = $SITE_WORK_TEXT;
}
if (isset($_POST['site_error'])) {
    $site_error = $_POST['site_error'];
} else {
    $site_error = 'off';
}
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
?>
<div class="row">
    <div class="span8">
        <h1>
            <small class="text-info">Конфигурация сайта</small>
        </h1>
        <table class="table table-striped table-bordered">
            <tr>
                <td>Имя сайта</td>
                <td><?php echo $site_name; ?></td>
                <td><?php echo '$SITE_NAME'; ?></td>
            </tr>
            <tr>
                <td>URL сайта</td>
                <td><?php echo $site_url; ?></td>
                <td><?php echo '$SITE_URL'; ?></td>
            </tr>
            <tr>
                <td>Email администратора</td>
                <td><?php echo $site_mail; ?></td>
                <td><?php echo '$SITE_MAIL'; ?></td>
            </tr>
            <tr>
                <td>Абсолютный путь</td>
                <td><?php echo $site_path; ?></td>
                <td><?php echo '$SITE_PATH'; ?></td>
            </tr>
            <tr>
                <td>Хост MySQL</td>
                <td><?php echo $bd_host; ?></td>
                <td><?php echo '$BD_HOST'; ?></td>
            </tr>
            <tr>
                <td>Имя базы</td>
                <td><?php echo $bd_name; ?></td>
                <td><?php echo '$BD_NAME'; ?></td>
            </tr>
            <tr>
                <td>Логин БД</td>
                <td><?php echo $bd_login; ?></td>
                <td><?php echo '$BD_LOGIN'; ?></td>
            </tr>
            <tr>
                <td>Пароль БД</td>
                <td><?php echo $bd_pass; ?></td>
                <td><?php echo '$BD_PASS'; ?></td>
            </tr>
            <tr>
                <td>Заголовок сайта</td>
                <td><?php echo $site_title; ?></td>
                <td><?php echo '$SITE_TITLE'; ?></td>
            </tr>
            <tr>
                <td>Ключевые слова</td>
                <td><?php echo $site_keywords; ?></td>
                <td><?php echo '$SITE_KEYWORDS'; ?></td>
            </tr>
            <tr>
                <td>Описание сайта</td>
                <td><?php echo $site_description; ?></td>
                <td><?php echo '$SITE_DESCRIPTION'; ?></td>
            </tr>
            <tr>
                <td>Статус сайта</td>
                <td><?php echo $site_work; ?></td>
                <td><?php echo '$SITE_WORK'; ?></td>
            </tr>
            <tr>
                <td>Причина отключения сайта</td>
                <td><?php echo $site_work_text; ?></td>
                <td><?php echo '$SITE_WORK_TEXT'; ?></td>
            </tr>
            <tr>
                <td>Режим отладки</td>
                <td><?php echo $site_error; ?></td>
                <td><?php echo '$SITE_ERROR'; ?></td>
            </tr>
        </table>
    </div>
</div>

<?php
if ($action == 'save') {
    $cong_cont = '<?php' . "\n";
    $cong_cont .= '$BD_HOST = \'' . $bd_host . '\';' . "\n";
    $cong_cont .= '$BD_LOGIN = \'' . $bd_login . '\';' . "\n";
    $cong_cont .= '$BD_PASS = \'' . $bd_pass . '\';' . "\n";
    $cong_cont .= '$BD_NAME = \'' . $bd_name . '\';' . "\n";
    $cong_cont .= '$SITE_NAME = \'' . $site_name . '\';' . "\n";
    $cong_cont .= '$SITE_MAIL = \'' . $site_mail . '\';' . "\n";
    $cong_cont .= '$SITE_PATH = \'' . $site_path . '\';' . "\n";
    $cong_cont .= '$SITE_URL = \'' . $site_url . '\';' . "\n";
    $cong_cont .= '$SITE_TITLE = \'' . $site_title . '\';' . "\n";
    $cong_cont .= '$SITE_KEYWORDS  = \'' . $site_keywords . '\';' . "\n";
    $cong_cont .= '$SITE_DESCRIPTION = \'' . $site_description . '\';' . "\n";
    $cong_cont .= '$SITE_WORK = \'' . $site_work . '\';' . "\n";
    $cong_cont .= '$SITE_WORK_TEXT = \'' . $site_work_text . '\';' . "\n";
    $cong_cont .= '$SITE_ERROR = \'' . $site_error . '\';' . "\n";
    $cong_cont .= '$EOL = "\n\t";'."\n";
    $cong_cont .= "\n" . '?>';

    $filename = ('configuration.php');
    if (is_writable($filename)) {
        if (!$handle = fopen($filename, 'w')) {
            echo "<div class=\"alert alert-error\">Не могу открыть файл (configuration.php)</div>";
            exit;
        }
        if (fwrite($handle, $cong_cont) === FALSE) {
            echo "<div class=\"alert alert-error\">Не могу произвести запись в файл (configuration.php)</div>";
            exit;
        }
        echo "<div class=\"alert alert-success\">Изменения успешно записаны</div>";

        fclose($handle);
        unset($filename);
    } else {
        echo "<div class=\"alert alert-error\">Файл (configuration.php) недоступен для записи</div>";
    }
}
?> 