<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>harjutus 12</h1>
    <form action="">
        start: <input type="time" name="start" id=""><br>
        finish: <input type="time" name="finish" id=""><br>
        <input type="submit" value="leia aeg">
    </form>
    <?php
    $s=strtotime($_GET["start"]);
    $f=strtotime($_GET["finish"]);

    $diff=abs($s - $f)/3600*60;
    echo intdiv($diff,60).":".$diff % 60;
    
?>
</body>
</html>