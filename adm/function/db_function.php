<?php
function bd_open () {
    global $BD_HOST, $BD_LOGIN, $BD_PASS, $BD_NAME;
    $bd = mysql_connect($BD_HOST, $BD_LOGIN, $BD_PASS) or die("Ошибка DB-1: ".mysql_error());
    mysql_select_db($BD_NAME,$bd) or die("Ошибка DB-2: ".mysql_error());
    mysql_query("SET character_set_results = 'utf8', 
             character_set_client = 'utf8', 
             character_set_connection = 'utf8', 
             character_set_database = 'utf8', 
             character_set_server = 'utf8'",
             $bd);
    return $bd;
}

### Закрываем БД (Знаю что это бред, но мне так удобнее)
function bd_close () {
mysql_close();
}

?>