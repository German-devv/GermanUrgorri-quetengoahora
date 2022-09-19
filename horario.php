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


  <form action="index.php" method="get">
    <table>
      <?php getHorario(); ?>


    
    </table>
  </form>

</body>

</html>