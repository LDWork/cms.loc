<h1><small class="text-info">Список пользователей</small></h1>  
<?php
bd_open();
echo '<table  class="table table-striped table-bordered">';
    echo '<thead>';
         echo '<tr>';
            echo '<th style="text-align: center;">ID</th>';
            echo '<th style="text-align: center;">Дата</th>';
            echo '<th style="text-align: center;">Никнейм</th>';
            echo '<th style="text-align: center;">Права</th>';
            echo '<th style="text-align: center;">Email</th>';
           echo ' <th style="text-align: center;">Посл. посещ.</th>';
           echo ' <th style="text-align: center;"></th>';
        echo '</tr>';
   echo '</thead>';
    $res = mysql_query ("SELECT * FROM users ORDER BY id");
    
     while($row=mysql_fetch_array($res))
        {
          
         if ($row['role'] == 1){
         $rolename = "SuperAd";
         }
         elseif ($row['role'] == 2) {
         $rolename = "Администратор";
         }
         elseif ($row['role'] == 3) {
         $rolename = "Модератор";
         }
         elseif ($row['role'] == 4) {
         $rolename = "Пользователь";
         }
                $rowtbl = '<tr>';
                $rowtbl = '<td style="text-align: center;">'.$row['id'].'</td>';
                $rowtbl .= '<td style="text-align: center;">'.$row['datereg'].'</td>';
                $rowtbl .= '<td style="text-align: center;">'.$row['login'].'</td>';
                $rowtbl .= '<td style="text-align: center;">'. $rolename.'</td>';
                $rowtbl .= '<td style="text-align: center;">'.$row['email'].'</td>';
                $rowtbl .= '<td style="text-align: center;">'.$row['lastvisit'].'</td>';
                $rowtbl .= '<td style="text-align: center;"><i class="icon-cog"></i></td>';
            // TODO Сделать управление пользователями (Добавить, удалить, изменить)
                $rowtbl .= '</tr>';
                echo $rowtbl;
    }
    echo '</table>';
    
    
?>
