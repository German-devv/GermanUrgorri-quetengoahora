<?php

//error_reporting(E_ALL ^ E_WARNING);

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
        "profesor" => "María García",
        "taller" => "G201"
    ],

];

$semana = [

    '2DAWam' => [

        'lunes' => [
            'EMR',
            'DSW',
            'DSW',
            'DESCANSO',
            'DEW',
            'DEW',
            'DEW',
        ],

        'martes' => [
            'DPL',
            'DPL',
            'DSW',
            'DESCANSO',
            'DSW',
            'DOR',
            'DOR',
        ],

        'miercoles' => [
            'DEW',
            'DEW',
            'DSW',
            'DESCANSO',
            'DSW',
            'DOR',
            'DOR',
        ],

        'jueves' => [
            'DPL',
            'DPL',
            'DPL',
            'DESCANSO',
            'DEW',
            'DEW',
            'EMR',
        ],

        'viernes' => [
            'DOR',
            'DOR',
            'DPL',
            'DESCANSO',
            'EMR',
            'DSW',
            'DSW',
        ],
    ],

    '2DAWpm' => [
        'lunes' => [
            'DEW',
            'DEW',
            'DEW',
            'DESCANSO',
            'EMR',
            'DPL',
            'DPL',
        ],

        'martes' => [
            'DEW',
            'DEW',
            'DSW',
            'DESCANSO',
            'DSW',
            'EMR',
            'EMR',
        ],

        'miercoles' => [
            'DPL',
            'DPL',
            'DSW',
            'DESCANSO',
            'DSW',
            'DOR',
            'DOR',
        ],

        'jueves' => [
            'DEW',
            'DEW',
            'DSW',
            'DESCANSO',
            'DSW',
            'DOR',
            'DOR',
        ],

        'viernes' => [
            'DPL',
            'DPL',
            'DSW',
            'DESCANSO',
            'DSW',
            'DOR',
            'DOR',
        ],
    ]
];

$horario = [
    'am'=>[
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
        date('10:45'),
        date('11:15')
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
    ]
],'pm' =>[
    [
        date('16:00'),
        date('16:55')
    ],

    [
        date('16:55'),
        date('17:50')
    ],

    [
        date('17:50'),
        date('18:45')
    ],

    [
        date('18:45'),
        date('19:15')
    ],

    [
        date('19:15'),
        date('20:10')
    ],

    [
        date('20:10'),
        date('21:05')
    ],

    [
        date('21:05'),
        date('22:00')
    ]

]

];




if (isset($_REQUEST['startSelect'])){
    $starselect = $_REQUEST['startSelect'];

    setcookie("selected", $starselect , time()+ 24 * 3600);//creo una cookie ya que al ejecutar cualquier funcion pierdo los datos de la anterior pagina 
} 



$cookie =explode('-',$_COOKIE['selected']) ;
echo($cookie[1]);
$selected = $semana[$cookie[1]];




function getHorario(){
    $horario = $GLOBALS['horario'];
    $semana = $GLOBALS['selected'];


    echo '<table style="height: 280px;">';
    echo '<tr>';
    echo     '<th> Horario</th>';
    echo '</tr>';

// se sacan las horas
    for ($coordenada = 0; $coordenada < 7; $coordenada++) {
        echo '<tr>';
        echo "<th>" . $horario[$coordenada][0] . "-" . $horario[$coordenada][1] . "</th>";
        echo '</tr>';
    }

    echo '</table>';



    echo '<table style="height: 280px;">';
    echo '<tr>';
    //se sacan los días de la semana
    foreach ($semana as $day => $dayvalue) {
        echo "<th> $day </th>";
    }
    echo '</tr>';


    for ($coordenada = 0; $coordenada <= 6; $coordenada++) {
        echo '<tr>';
        foreach ($semana as $day => $dayvalue) {
            echo "<td> $dayvalue[$coordenada] </td>";
        }
        echo '</tr>';
    }
    echo '</table>';
}

function getWeeksDays(){
    $semana = $GLOBALS['selected'];

    foreach ($semana as $day => $dayvalue) {
        echo "<option value='$day'>$day</option>";
    }
}

function geAtctualDate(){

    date_default_timezone_set("Europe/Lisbon");
    $date = date("H:i");
    $check = true;
    $weekDay = intval(date('w'));



    if ($weekDay == 1) $weekDay = 'lunes';
    if ($weekDay == 2) $weekDay = 'martes';
    if ($weekDay == 3) $weekDay = 'miercoles';
    if ($weekDay == 4) $weekDay = 'jueves';
    if ($weekDay == 5) $weekDay = 'viernes';
    if ($weekDay == 6) {
        $weekDay = 'sabado';
        $check = false;
    }
    if ($weekDay == 7) {
        $weekDay = 'domingo';
        $check = false;
    }




    if ($check == true) searchClass($weekDay,  $date);
    else echo "<p> No hay ninguna clase programada para las $date del $weekDay.</p>";
}


function searchClass($day, $hourMinute){
    try {
        $grupo = $GLOBALS['asignatura'];
        $semana = $GLOBALS['selected'];
        $horario = $GLOBALS['horario'];


        //Aquí se busca que hora se ha seleccionado(1º hora = posicion 0)
        $coordenada = -1;
        for ($i = 0; $i <= 5; $i++) {
            if (date('H:i', strtotime($hourMinute)) >= date('H:i', strtotime($horario[$i][0])) && date('H:i', strtotime($hourMinute)) <= date('H:i', strtotime($horario[$i][1]))) {
                $coordenada = $i;
                break;
            }
        }





        if ($coordenada != -1) {
            
            $horaImpartida = $semana[$day][$coordenada];
            $aula = $grupo[$horaImpartida]['taller'];
            $profesor =  $grupo[$horaImpartida]['profesor'];

            if ($horaImpartida != 'DESCANSO') {
                echo "<p>A las $hourMinute del $day tienes $horaImpartida en el aula $aula, impartida por  $profesor. </p>";
            } else {
                echo "<p>A las $hourMinute del $day tienes $horaImpartida.";
            }
        } else echo "<p> No hay ninguna clase programada para las $hourMinute del $day.</p>";
    } catch (Exception $e) {
    }
}
