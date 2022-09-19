<?php

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
        $startDate = date('8:00'),
        $endDate = date('8:55')
    ],

     [
        $startDate = date('8:55'),
        $endDate = date('9:50')
    ],

     [
        $startDate = date('9:50'),
        $endDate = date('11:15')
    ],

     [
        $startDate = date('11:15'),
        $endDate = date('12;10')
    ],

     [
        $startDate = date('12:10'),
        $endDate = date('13;05')
    ],

     [
        $startDate = date('13:05'),
        $endDate = date('14:00')
    ],


];




function getHorario(){

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
}



































$horario1 =  [
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
