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
            $lubatud = array('portfoolio','kaart','kontakt');
            $kontroll = in_array($leht, $lubatud);
            if($kontroll==true){
            include($leht.'.php');
            } else {
                echo 'Valitud lehte ei eksisteeri!';
            }
        } else 

?>
<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quasi, quod similique. 
Est error veniam consequuntur deleniti amet dolores, quibusdam quam, eos, atque sapiente reprehenderit illo repellat vitae sequi aperiam neque?
</p>
</body>
</html>