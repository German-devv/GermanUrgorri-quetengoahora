<?php
error_reporting(E_ALL ^ E_WARNING);

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
        "profesor" => "ELOISA OJEDA",
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

    'am' => [
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
    ],

    'pm' => [
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


if (isset($_REQUEST['startSelect'])) GetClassOrTeacher();


function GetClassOrTeacher()
{

    setcookie("selected", $_REQUEST['startSelect'], time() + 24 * 3600); //creo una cookie ya que al ejecutar cualquier funcion pierdo los datos de la anterior pagina 
    header("Location: horario.php");
}





$cookie = explode('-', $_COOKIE['selected']);
$selected;


function ChoseHorario()
{
    if ($GLOBALS['cookie'][0] == 0) {
        GetHorario();
        $GLOBALS['selected'] = $GLOBALS['semana'][$GLOBALS['cookie'][1]];
    } else GetHorarioTeacher();
}


function GetHorarioTeacher()
{

    $horario = $GLOBALS['horario'];
    $semana = $GLOBALS['semana'];
    $asigantura = $GLOBALS['asignatura'];
    $profesor = $GLOBALS['cookie'][1];


    echo ('<div style="display: flex;">');
    GetHours($horario, 'am');

    echo '<table style="height: 280px;">';

    GetWeeksDays($semana['2DAWam']);



    for ($coordenada = 0; $coordenada <= 6; $coordenada++) {
        echo '<tr>';
        foreach ($semana['2DAWam'] as $day => $dayvalue) {
            if ($asigantura[$dayvalue[$coordenada]]['profesor'] == $profesor) {
                echo "<td> $dayvalue[$coordenada] </td>";
            } else  echo "<td> nada </td>";
        }
        echo '</tr>';
    }


    echo '</table>';


    echo ('</div>');
    echo ('<div style="display: flex; margin-top:50px;">');



    GetHours($horario, 'pm');

    echo '<table style="height: 280px;">';

    GetWeeksDays($semana['2DAWpm']);



    for ($coordenada = 0; $coordenada <= 6; $coordenada++) {
        echo '<tr>';
        foreach ($semana['2DAWpm'] as $day => $dayvalue) {
            if ($asigantura[$dayvalue[$coordenada]]['profesor'] == $profesor) {
                echo "<td> $dayvalue[$coordenada] </td>";
            } else  echo "<td> nada </td>";
        }
        echo '</tr>';
    }


    echo '</table>';


    echo ('</div>');
}

function GetHorario()
{
    $horario = $GLOBALS['horario'];
    $semana =
        $cookie = substr($GLOBALS['cookie'][1], -2);
    $semana = $GLOBALS['semana'][$GLOBALS['cookie'][1]];



    echo ('<div style="display: flex;">');
    GetHours($horario, $cookie);

    echo '<table style="height: 280px;">';

    GetWeeksDays($semana);

    GetHorarioGrupo($semana);


    echo '</table>';
    echo ('</div>');
}

function GetWeeksDays($semana)
{
    echo '<tr>';
    //se sacan los días de la semana
    foreach ($semana as $day => $dayvalue) {
        echo "<th> $day </th>";
    }
    echo '</tr>';
}

function GetHours($horario, $cookie)
{
    echo '<table style="height: 280px;">';
    echo '<tr>';
    echo     '<th> Horario</th>';
    echo '</tr>';

    // se sacan las horas
    for ($coordenada = 0; $coordenada < 7; $coordenada++) {
        echo '<tr>';
        echo "<th>" . $horario[$cookie][$coordenada][0] . "-" . $horario[$cookie][$coordenada][1] . "</th>";
        echo '</tr>';
    }

    echo '</table>';
}

function GetHorarioGrupo($semana)
{
    for ($coordenada = 0; $coordenada <= 6; $coordenada++) {
        echo '<tr>';
        foreach ($semana as $day => $dayvalue) {
            echo "<td> $dayvalue[$coordenada] </td>";
        }
        echo '</tr>';
    }
}



function GetWeeksDaysOption()
{
    $semana = $GLOBALS['semana']['2DAWam'];

    foreach ($semana as $day => $dayvalue) {
        echo "<option value='$day'>$day</option>";
    }
}

function GeAtctualDate()
{

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




    if ($check == true) SearchClass($weekDay,  $date);
    else echo "<p> No hay ninguna clase programada para las $date del $weekDay.</p>";
}


function SearchClass($day, $hourMinute)
{

    $grupo = $GLOBALS['asignatura'];
    $semana = $GLOBALS['selected'];
    $horario = $GLOBALS['horario'][substr($GLOBALS['cookie'][1], -2)];
    


    //Aquí se busca que hora se ha seleccionado(1º hora = posicion 0)
    $coordenada = -1;
    for ($i = 0; $i <= 6; $i++) {
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
            echo "<p>A las $hourMinute del $day hay $horaImpartida en el aula $aula, impartida por  $profesor. </p>";
        } else {
            echo "<p>A las $hourMinute del $day hay $horaImpartida.";
        }
    } else echo "<p> No hay ninguna clase programada para las $hourMinute del $day.</p>";
}

function GetTeacherName()
{
    if ($GLOBALS['cookie'][0] == 1) echo ("de " . $GLOBALS['cookie'][1]);
}


function Hidden()
{
    if ($GLOBALS['cookie'][0] != 0) echo ('hidden');
}

function GetTeachersOption()
{

    $asiganturas = $GLOBALS['asignatura'];

    foreach ($asiganturas as $asigantura) {
        echo "<option value='1-" . $asigantura['profesor'] . "'>" . $asigantura['profesor'] . "</option>";
    }
}
