<?php

// Выводит ошибки в футере дляиспользования нужно на странице с ошибкой
// создать елемент массива с кодом  -   $all_errors[] = 100;
function show_errors($all_errors)
{
    $errors = array(
        100 => 'Ошибка подключения к базе (db_function.php)',
        200 => 'Ошибка 200',
        300 => 'Ошибка 300',
    );

    $count = count($all_errors) ;

    $k = 0;
    echo '<div class="span6 alert alert-error offset4">';
    while ($k < $count) {
        echo '<p>' . $errors[$all_errors[$k]] . '</p>';
        $k++;
    }
    echo '</div>';
}

?>
