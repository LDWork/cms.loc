<?php
require_once 'stat-function.php';
require_once 'news-function.php';
require_once 'category-function.php';
// Очистка строки
function clearStr( $str ) {
        $str = trim( $str );
        $str = preg_replace("/[^\x20-\xFF]/","",@strval($str));
        $str = strip_tags( $str );
        $str = htmlspecialchars( $str, ENT_QUOTES );
        $str = mysql_real_escape_string( $str );
        return $str;
}
// Очистка HTML
function clearHtml( $str ){
        $str = trim( $str );
        $str = preg_replace( "/[^\x20-\xFF]/","",@strval( $str ) );
        // Список тегов которые останутся
        $str = strip_tags( $str,"<span><strong><i><img><a><u><p><ul><ol><li><br><object>
                <embed><param><table><tr><td><th><h1><h2><h3><h4><h5><hr><div><code><pre>" );
        
        $str = mysql_real_escape_string( $str );
        return $str;
}
//    Транслит
function translit( $str ) {
    $tr = array(
        "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
        "Д"=>"D","Е"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
        "Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
        "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
        "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
        "Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
        "Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
        "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
        "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
        "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
        "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
        "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
        "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
        " "=>"-","ё"=>"e","Ё"=>"E"
    );
    return strtr($str,$tr);
}
//  Select для вывода даты
function date_select($datesozd=0) {
 if($datesozd=='0'){   
$tuday = time();
$year = date("Y", $tuday);
$day = date("d", $tuday);
$month = date("m", $tuday);}
else {
 $year=substr($datesozd,0,4);
 $month=substr($datesozd,5,2);
 $day=substr($datesozd,8,2);
 $tuday=substr($datesozd,11,8);
}

echo "<select name=\"date-day\" class=\"input-mini\">";
// выводим день
for($i=1; $i<=31; $i++){
	if($i == $day) {$selected = " selected ";}
	else{$selected = '';}
	echo "<option ".$selected."value=\"".$i."\">".$i;
	echo "</option>\n\t";
}
echo "</select>";

// выводим месяц
$all_month = array( 1=>"Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь" );
echo "<select name=\"date-month\" class=\"input-medium\">";
for($i=1; $i<=12; $i++){
	if($i == $month) {$selected = " selected ";}
	else{$selected = '';}
	echo "<option ".$selected."value=\"".$i."\">".$all_month[$i];
	echo "</option>\n\t";
}
echo "</select>";

// выводим год
echo "<select name=\"date-year\" class=\"input-small\">";
for($i=$year; $i>=2000; $i--){
	if($i == $year) {$selected = " selected ";}
	else{$selected = '';}
	echo "<option ".$selected."value=\"".$i."\">".$i;
	echo "</option>\n\t";
}
echo "</select>";
}

?>
