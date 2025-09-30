<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="">
        Start:<input type="time" name = "start" id=""><br>
        Start:<input type="time" name = "finish" id=""><br>
        <input type="submit" value="Leia aeg">

</form>

    <?php

    $s =  strtotime($_GET["start"]);
    $f = strtotime($_GET["Finish"]);


    $difference = abs($s - $f)/3600*60;
    echo intdiv($difference,60).":".$diff.%60

?>
</body>
</html>