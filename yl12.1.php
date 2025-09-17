<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
  $allikas = 'tootajad.csv';
$minu_csv = fopen($allikas, 'r') or die('Ei leia faili!');
$jrk = 1;
$mkokku = 0;
$nkokku = 0;
$mpalk = 0;
$npalk = 0;


while(!feof($minu_csv)){
	$rida = fgetcsv($minu_csv, filesize($allikas),';');
        if ($rida[1] == "m") {
                $mkokku+=1;
                $mpalk +=rida [2];
        } else {

                $nkokku+=1;
                $npalk +=rida [2];

        }
	}
	if($mpalk/$mkokku>$npalk/$nkokku){
echo "Naisi ahistatakse"

    }else if ($mpalk/$mkokku<$npalk/$nkokku){
        echo "mehi ahistatkase";

    }else {
        echo "kõik võrdsed"
    }

	fclose($minu_csv)

fclose($minu_csv);
?>
</body>
</html>