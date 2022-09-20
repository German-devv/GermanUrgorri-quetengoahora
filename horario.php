<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include("index.php") ?>
  <title>Horario semanal</title>
</head>

<body>
  <h1>Horario semanal</h1>


  <form style="display: flex; " action="" method="get">

    <?php getHorario(); ?>

    <section style="margin-left: 100px;">

      <div>
        <h3>Buscador</h3>
        <p>Escoge un día de la semana y una hora para ver tu clase: </p>
      </div>

      <label for="week">Día:</label>
      <select name="week" id="week">
        <?php getWeeksDays(); ?>
      </select> <br><br>

      <label for="hour">Hora:</label>
      <input type="time" name="hour" id="hour"><br><br>

      <input type="submit" value="BUSCAR" name="search" id="search">

      <div id="solution">
        <?php
        
        if(isset($_REQUEST['search'])){
          searchClass($_REQUEST['week'],$_REQUEST['hour']);
        }
        ?>
      </div>


    </section>
  </form>

</body>

</html>