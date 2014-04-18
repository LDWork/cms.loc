<?php
require_once 'configuration.php';
require_once "function/db_function.php";
$err = '';
if (isset($_POST['login']) && isset($_POST['pass'])) {
    $login = mysql_real_escape_string($_POST['login']);
    $salt = '20kam78345';
    $pass = md5(md5($_POST['pass']) . $salt);

    bd_open();

    $sql = mysql_query("SELECT * FROM users WHERE  'login' = '$login' AND 'passwords' = '$pass' ") or die(mysql_error());
    if (mysql_num_rows($sql) == 1) {
        $date = date('Y-m-d,H:i');

        $row = mysql_fetch_assoc($sql);
        $res = mysql_query("UPDATE users SET 'lastvisit' = '$date' WHERE 'id' = '$row[id]' ") or die(mysql_error());
        session_start();
        $_SESSION['role'] = $row['role'];
        $_SESSION['auth'] = 1;
        header("Location:/adm/");
    } else {
        $err = 'Неправильные данные для входа';
    }
}
?>

<!DOCTYPE HTML>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
</head>
<body>
<style type="text/css">
    * {
        margin: 0;
        padding: 0;
    }

    html {
        background: #f6f6f6;
        font-family: Verdana;
        color: #444;
    }

    #wrapp {
        height: 0;
        top: 50%;
        position: absolute;
        width: 100%;
    }

    #auth {
        width: 270px;
        background: #EEE;
        border: 1px solid #DDD;
        height: 280px;
        padding: 20px 35px;
        margin: -150px auto 0 auto;
        border-radius: 5px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    }

    #auth input {
        padding: 5px;
        width: 270px;
        margin-bottom: 20px;
        font-size: 16px;
    }

    #auth button {
        padding: 5px 20px;
        float: right;
    }

    #auth p {
        margin-bottom: 5px;
    }

    #auth h3 {
        font-weight: normal;
        margin-bottom: 20px;
        text-align: center;
    }
    .err {
        color: #f00;
        text-align: center;
    }
</style>

<div id="wrapp">
    <div id="auth">
        <h3>BOOM CMS<br>вход</h3>
<div class="err">
    <?php echo $err; ?>
</div>
        <form action="#" method="POST">
            <p>Логин</p>
            <input type="text" name="login"/>

            <p>Пароль</p>
            <input type="password" name="pass"/>
            <button type="submit">Войти</button>
        </form>
    </div>
</div>
</body>
</html>