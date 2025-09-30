<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    include("menu.php");
    
    if(!empty($_GET['leht'])){
            $leht = htmlspecialchars($_GET['leht']);
            if(is_file($leht.'.php')){
                include($leht.'.php');
            } else {
                echo '<p>404 Valitud lehte ei eksisteeri!</p>';
            }
        } else {

    ?>
    <h1>Avaleht</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis nihil nam maiores a voluptatem. Accusantium neque ea dolorem reprehenderit vero, fuga deserunt, ipsa culpa debitis atque accusamus ab id molestiae?</p>
    <form action="">
            Start: <input type="time" name="start" id=""><br>
            Finish: <input type="time" name="finish" id=""><br>
            <input type="submit" value="Leia aeg">

    </form>
    <?php
        $s = strtotime($_GET["start"]);
        $f = strtotime($_GET["finish"]);

	    $diff = abs($s - $f)/3600*60;
        echo intdiv($diff,60).":".$diff % 60;



        }
    ?>
    <br><h1>----------------------------</h1>
    <?php
    $allikas = 'tootajad.csv';
    $minu_csv = fopen($allikas, 'r') or die('Ei leia faili!');
    $mkokku = 0;$nkokku = 0;
    $mpalk = 0; $npalk = 0;
    while(!feof($minu_csv)){
        $rida = fgetcsv($minu_csv, filesize($allikas),';');
        

        if ($rida[1] == "m") {
                $mkokku+=1;
                $mpalk += $rida[2];
            } else {
                $nkokku+=1;
                $npalk += $rida[2];
            }
    }
    if($mpalk/$mkokku>$npalk/$nkokku){
        echo "naisi ahistatakse";
    } else if($mpalk/$mkokku<$npalk/$nkokku){
        echo "mehi ahistatakse";
    } else {
        echo "kõik võrdsed";
    }

    fclose($minu_csv);

?>
</body>
</html>