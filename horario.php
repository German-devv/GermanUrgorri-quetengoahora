<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />



  <?php


  include("index.php")

  ?>
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
  <title>Horario semanal</title>
</head>

<body>



  <h1>Horario semanal <?php GetTeacherName(); ?></h1>


  <form  action="horario.php" method="get">

    <?php ChoseHorario(); ?>

    <section class="<?php Hidden(); ?>" style="margin-left: 100px;">

      <div>
        <h3>Buscador</h3>
        <p>Escoge un día de la semana y una hora para ver tu clase: </p>
      </div>

      <label for="week">Día:</label>
      <select name="week" id="week">
        <?php GetWeeksDaysOption(); ?>
      </select> <br><br>

      <label for="hour">Hora:</label>
      <input type="time" name="hour" id="hour" value="<?php date_default_timezone_set("Europe/Lisbon");
                                                      echo date('H:i') ?>"><br><br>

      <input type="submit" value="BUSCAR UNA HORA CONCRETA" name="search" id="search"> <br><br>
      <input type="submit" value="VER CLASE ACTUAL" name="actualClass" id="actualClass">

      <div id="solution">
        <?php


        if (isset($_REQUEST['search'])) SearchClass($_REQUEST['week'], $_REQUEST['hour']);


        if (isset($_REQUEST['actualClass'])) GeAtctualDate();



        ?>
      </div>

      
    </section>
  </form>

</body>

</html>