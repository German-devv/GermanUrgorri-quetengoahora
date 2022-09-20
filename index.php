<?php


$asignatura =  [
    "DEW" => [
        "profesor" => "MARIA DEL CARMEN RODRIGUEZ SUAREZ",
        "taller" => "G201"
    ],


    "DSW" => [
        "profesor" => "SERGIO RAMOS SUAREZ",
        "taller" => "G201"
    ],

    "DPL" => [
        "profesor" => "MARIA ANTONIA MONTESDEOCA VIERA",
        "taller" => "G201"
    ],

    "DOR" => [
        "profesor" => "ERMIS",
        "taller" => "G201"
    ],

    "EMR" => [
        "profesor" => "profe",
        "taller" => "G201"
    ],

];

$semana = [
    'lunes' => [
         'EMR',
         'DSW',
         'DSW',
         'DEW',
         'DEW',
         'DEW',
    ],

    'martes' => [
         'DPL',
         'DPL',
         'DSW',
         'DSW',
         'DOR',
         'DOR',
    ],

    'miercoles' => [
         'DEW',
         'DEW',
         'DSW',
         'DSW',
         'DOR',
         'DOR',
    ],

    'jueves' => [
         'DPL',
         'DPL',
         'DPL',
         'DEW',
         'DEW',
         'EMR',
    ],

    'viernes' => [
         'DOR',
         'DOR',
         'DPL',
         'EMR',
         'DSW',
         'DSW',
    ],

];

$horario = [

     [
        date('8:00'),
        date('8:55')
    ],

     [
        date('8:55'),
        date('9:50')
    ],

     [
        date('9:50'),
        date('10:45')
    ],

     [
        date('11:15'),
        date('12:10')
    ],

     [
        date('12:10'),
        date('13:05')
    ],

     [
        date('13:05'),
        date('14:00')
    ],


];




function getHorario(){
    $horario = $GLOBALS['horario'];

    
    echo '<table>';
    echo '<tr>';
    echo     '<th> Horario</th>';
    echo '</tr>';


    for($x = 0; $x < 6; $x++){
        echo '<tr>';
        echo "<th>" .$horario[$x][0]."-".$horario[$x][1]. "</th>";
        echo '</tr>';
    }

    echo '</table>';

  

    echo '<table>';
    echo '<tr>';
    foreach ($GLOBALS['semana'] as $day => $dayvalue) {
        echo "<th> $day </th>";
    }
    echo '</tr>';


    for ($x = 0; $x <= 5; $x++) {
        echo '<tr>';
        foreach ($GLOBALS['semana'] as $day => $dayvalue) {
            echo "<td> $dayvalue[$x] </td>";
        }
        echo '</tr>';
    }
    echo '</table>';
}

function getWeeksDays(){
    $semana = $GLOBALS['semana'];

    foreach($semana as $day => $dayvalue){
       echo "<option value='$day'>$day</option>"; 
    }
    
}

function searchClass($day, $hourMinute){


    $hourMinute = str_replace(':',$hou rMinute);
    echo $hourMinute;







 /*
    $hourMinute = explode(':', $hourMinute);
    $hour = date("H",$hourMinute[0]);
    $minute = date("i",$hourMinute[1]);
    $hourMinute = date('H:i', );


   
    echo $hourMinute;
    echo gettype($hourMinute) ;
    $hourMinute = time('h:i' , $hourMinute);

    echo gettype($hourMinute) ;
    */

}




































