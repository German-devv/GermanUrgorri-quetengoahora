<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Horario semanal</title>
</head>

<body>



    <h1>Horario semanal</h1>


    <form style="display: flex; " action="horario.php" method="request">


        <label for="startSelect">Escoja un grupo o profesor:</label>
        <select name="startSelect" id="startSelect">
            <optgroup label="class">
                <option value="2DAWam">2DAW mañana</option>
                <option value="2DAWpm">2DAW tarde</option>
            </optgroup>
            <optgroup label="teacher">
                <option value="MARIA DEL CARMEN RODRIGUEZ SUAREZ">MARIA DEL CARMEN RODRIGUEZ SUAREZ</option>
                
            </optgroup>
        </select>



        <input type="submit" value="MOSTRAR" name="actualClass" id="actualClass">




    </form>

</body>

</html>