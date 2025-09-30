<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harjutus 01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <h2>Harjutus 13</h2>
        <?php
            function jpgfali(){
      echo '<form action="#" method="post" enctype="multipart/form-data">
      <input type="file" name="minu_fail"><br>
      <input type="submit" value="Lae üles!">
      </form>';
      if(!empty($_FILES['minu_fail']['name'])){
	      $sinu_faili_nimi = $_FILES['minu_fail']['name'];
	      $ajutine_fail= $_FILES['minu_fail']['tmp_name'];
	      $faili_suurus = $_FILES['minu_fail']['size'];
	      $max_suurus = 10048576;
	      $faili_tyyp = $_FILES['minu_fail']['type'];
	      if($faili_suurus <= $max_suurus && $faili_tyyp=='image/jpeg' || $faili_tyyp=='image/jpg'){
	      	$kataloog = 'failid';
	      	$faili_koht = $kataloog.'/'.$sinu_faili_nimi;	
	      	if(!file_exists($faili_koht) && move_uploaded_file($ajutine_fail, $kataloog.'/'.$sinu_faili_nimi)){
	      		echo 'Faili üleslaadimine oli edukas'."<br>";	
	      	} else {
	      		echo 'Faili üleslaadimine ebaõnnestus'."<br>";
	      	}
	      } else {
	      	echo 'Faili ei laetud üles!'."<br>";
	      }
      }
            }
        ?>
 <h1>Harjutus 12.1</h1>
<?php
$allikas = 'tootajad.csv';
$minu_csv = fopen($allikas, 'r') or die('Ei leia faili!');
$jrk = 1;
$mkokku = 0;
$nkokku = 0;
$mpalk = 0;
$npalk = 0;

while (!feof($minu_csv)) {
    $rida = fgetcsv($minu_csv, filesize($allikas), ';');
    if ($rida[1] == "m") {
        $mkokku += 1;
        $mpalk += $rida[2];
    } else {
        $nkokku += 1;
        $npalk += $rida[2];
    }
}

if ($mkokku > 0 && $nkokku > 0) {
    if ($mpalk / $mkokku > $npalk / $nkokku) {
        echo "Naisi ahistatakse";
    } else if ($mpalk / $mkokku < $npalk / $nkokku) {
        echo "Mehi ahistatakse";
    } else {
        echo "Kõik võrdsed";
    }
} else {
    echo "Andmeid ei leitud.";
}

fclose($minu_csv);
?>
 <h1>Harjutus 11</h1>

<?php
function arvutaSoiduaeg($start, $lopp) {
    list($startTunnid, $startMinutid) = explode(':', $start);
    list($loppTunnid, $loppMinutid) = explode(':', $lopp);

    $startSekundid = ($startTunnid * 3600) + ($startMinutid * 60);
    $loppSekundid = ($loppTunnid * 3600) + ($loppMinutid * 60);

    $soiduaegSekundites = $loppSekundid - $startSekundid;

    if ($soiduaegSekundites < 0) {
        $soiduaegSekundites += 86400;
    }

    $soiduaegTunnid = floor($soiduaegSekundites / 3600);
    $soiduaegMinutid = floor(($soiduaegSekundites % 3600) / 60);

    return [$soiduaegTunnid, $soiduaegMinutid];
}

$start = '12:30';
$lopp = '14:15';

if (strlen($start) >= 5 && strlen($lopp) >= 5) {
    list($tunnid, $minutid) = arvutaSoiduaeg($start, $lopp);
    echo "Sõiduaeg: $tunnid tundi ja $minutid minutit.<br>";
} else {
    echo "Palun sisestage ajad formaadis hh:mm.<br>";
}

$fail = 'tootajad.csv';
$meestePalgad = [];
$naistePalgad = [];

if (($handle = fopen($fail, 'r')) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ';')) !== FALSE) {
        $sugu = $data[1];
        $palk = (float)$data[2];

        if ($sugu === 'M') {
            $meestePalgad[] = $palk;
        } elseif ($sugu === 'N') {
            $naistePalgad[] = $palk;
        }
    }
    fclose($handle);
}

$keskmineMeestePalk = !empty($meestePalgad) ? array_sum($meestePalgad) / count($meestePalgad) : 0;
$keskmineNaistePalk = !empty($naistePalgad) ? array_sum($naistePalgad) / count($naistePalgad) : 0;

$suurimMeestePalk = !empty($meestePalgad) ? max($meestePalgad) : 0;
$suurimNaistePalk = !empty($naistePalgad) ? max($naistePalgad) : 0;

echo "Meeste keskmine palk: " . number_format($keskmineMeestePalk, 2) . " €<br>";
echo "Naiste keskmine palk: " . number_format($keskmineNaistePalk, 2) . " €<br>";
echo "Suurim meeste palk: " . number_format($suurimMeestePalk, 2) . " €<br>";
echo "Suurim naiste palk: " . number_format($suurimNaistePalk, 2) . " €<br>";
?>
<h1>Harjutus 9</h1>

<form method="post">
    <label for="nimi">Sisesta oma nimi:</label>
    <input type="text" id="nimi" name="nimi" required>
    <br>
    <label for="sisend">Sisesta sõna:</label>
    <input type="text" id="sisend" name="sisend" required>
    <br>
    <label for="lauses">Sisesta lause:</label>
    <input type="text" id="lauses" name="lauses" required>
    <br>
    <label for="eesnimi">Sisesta eesnimi:</label>
    <input type="text" id="eesnimi" name="eesnimi" required>
    <br>
    <label for="perenimi">Sisesta perenimi:</label>
    <input type="text" id="perenimi" name="perenimi" required>
    <br>
    <input type="submit" value="Saada">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!function_exists('tervita')) {
        function tervita($nimi) {
            return "Tere, " . ucfirst(strtolower($nimi)) . "!";
        }
    }

    if (!function_exists('eraldaTähtedega')) {
        function eraldaTähtedega($sisend) {
            return implode('.', str_split(strtoupper($sisend)));
        }
    }

    if (!function_exists('ropudsõnad')) {
        function ropudsõnad($sisend, $ropud_sõnad) {
            return str_replace($ropud_sõnad, '***', $sisend);
        }
    }

    if (!function_exists('looMail')) {
        function looMail($eesnimi, $perenimi) {
            $eesnimi = str_replace(array('ä', 'ö', 'ü', 'õ'), array('a', 'o', 'y', 'o'), strtolower($eesnimi));
            $perenimi = str_replace(array('ä', 'ö', 'ü', 'õ'), array('a', 'o', 'y', 'o'), strtolower($perenimi));
            
            return $eesnimi . $perenimi . "@hkhk.edu.ee";
        }
    }

    $nimi = $_POST['nimi'];
    $sisend = $_POST['sisend'];
    $lauses = $_POST['lauses'];
    $eesnimi = $_POST['eesnimi'];
    $perenimi = $_POST['perenimi'];

    echo tervita($nimi) . "<br>";
    echo eraldaTähtedega($sisend) . "<br>"; 
    echo ropudsõnad($lauses, array("lol")) . "<br>"; 
    echo looMail($eesnimi, $perenimi); 
}
?>

    <h1>Harjutus 08</h1>

    <?php
    date_default_timezone_set('Europe/Tallinn');
    echo "Käesolev kuupäev ja kellaaeg: " . date('d.m.Y G:i') . "<br>";

    $synniaasta = 2008;
    $vanus = date('Y') - $synniaasta;
    echo "Kasutaja on $vanus aastat vana.<br>";

    $kooleaasta_lopp = mktime(0, 0, 0, 6, 30, date('Y')); 
    $paevade_arv = ($kooleaasta_lopp - time()) / (60 * 60 * 24); 
    echo "Kooliaasta lõpuni on jäänud " . ceil($paevade_arv) . " päeva!<br>";

    $kuu = date('n');
    if ($kuu >= 3 && $kuu <= 5) {
        echo '<img src="pildid/kevad.jpg" alt="kevad"><br>';
    } elseif ($kuu >= 6 && $kuu <= 8) {
        echo '<img src="pildid/suvi.jpg" alt="suvi"><br>';
    } elseif ($kuu >= 9 && $kuu <= 11) {
        echo '<img src="pildid/sügis.jpg" alt="sügis"><br>';
    } else {
        echo '<img src="pildid/talv.jpg" alt="talv"><br>';
    }

    $kuupäev = '14-06-2008'; 
    list($kuu, $paev, $aasta) = explode('-', $kuupäev);

    if (checkdate($kuu, $paev, $aasta)) {
        echo 'Kuupäev on korras';
    } else {
        echo 'Kuupäev on valesti';
    }
    ?>

    <h1>Harjutus 07</h1>

    <?php
      function tervita() {
        echo ("päiksekesekene");
      }

      function uudiskiri() {
        echo '<div class="row">
          <div class="col-sm-2">
            <form action="">
              <input type="text" placeholder="Liitu uudiskirjaga!">
              <input type="submit" value="Liitu!" class="btn btn-success">
            </form>
          </div>
        </div>';
      }

      function createUser($u) {
        $lu = strtolower($u); 
        echo $lu . "@hkhk.edu.ee";
        echo "<br>";
        $p = substr(password_hash($lu, PASSWORD_BCRYPT), 7, 7);
        echo $p;
      }
    
      function vahemikus($a1, $a2) {
        for ($i = $a1; $i <= $a2; $i++) {
            echo $i . " ";
        }
      }

      function rectangle($a1, $a2) {
        return $a1 * $a2;
      }

      function ik($ik) {
        $pikkus = strlen($ik);
        if ($pikkus == 11) {
          if (intval($ik[0]) % 2 == 0) {   
            $vastus = "Naine";
          } else {
            $vastus = "Mees";
          }
        } else {
          $vastus = "Vale pikkusega";
        }
        return $vastus;
      }

      function headMotted() {
        $alused = array("Jüri", "Mari", "Uku");
        $oeldised = array("armastab", "viskab", "tõmbab");
        $sihitsed = array("mind", "sind", "teda");

        echo $alused[array_rand($alused)] . " " . $oeldised[array_rand($oeldised)] . " " . $sihitsed[array_rand($sihitsed)];
      }

      headMotted();
      echo "<br>";

      tervita();
      uudiskiri();
      createUser("Mario");
      echo "<br>";
      vahemikus(2, 8);
      echo "<br>";
    ?>
    
    <h2>Ristküliku pindala</h2>
    <form>
      Külg 1<input type="number" name="kylg1" value="10">
      Külg 2<input type="number" name="kylg2" value="10">
      <input type="submit" value="Arvuta pindala">
    </form>
    
    <?php
      if (isset($_GET['kylg1']) && isset($_GET['kylg2'])) {
        echo "Pindala: " . rectangle($_GET['kylg1'], $_GET['kylg2']);
        echo "<br>";
      }
    
    
  ?>
    <h2>Harjutus 06</h2>
  <?php
// 1. Genereeri arvud 1-100
for ($nr = 1; $nr <= 100; $nr++) {
    echo $nr . '. ';
    if ($nr % 10 == 0) {
        echo '<br>';
    }
}

// 2. Rida
for ($i = 1; $i <= 10; $i++) {
    echo '*';
}
echo '<br>';

// 3. Rida II 
for ($i = 1; $i <= 10; $i++) {
    echo '*<br>';
}

// 4. Ruut 
$suurus = 5;
for ($rida = 1; $rida <= $suurus; $rida++) {
    for ($veerg = 1; $veerg <= $suurus; $veerg++) {
        echo '* ';
    }
    echo '<br>';
}

// 5. Kahanev

for ($nr = 10; $nr >= 1; $nr--) {
    if ($nr % 2 == 0) {
        echo $nr . '<br>';
    }
}

// 6. Kolmega jagunevad 

for ($nr = 1; $nr <= 100; $nr++) {
    if ($nr % 3 == 0) {
        echo $nr . '<br>';
    }
}

// 7. Massiivid ja tsüklid
$poised = array('Jaan', 'Mati', 'Kalle');
$tudrukud = array('Mari', 'Kati', 'Liis');

for ($i = 0; $i < count($poised); $i++) {
    echo $poised[$i] . ' - ' . $tudrukud[$i] . '<br>';
}

// 8. Massiivid ja tsüklid 
$poised_koopiad = $poised;
$tudrukud_koopiad = $tudrukud;

$suvalised_nimed = array_merge($poised_koopiad, $tudrukud_koopiad);
$suvalised_nimed = array_unique($suvalised_nimed);

foreach ($suvalised_nimed as $nimi) {
    echo $nimi . '<br>';
}
?>



  <h2>Harjutus 05</h2>
<?php
$hiinanimi = array("瀚聪","月松","雨萌","展博","雪丽","哲恒","慧妍","博裕","宸瑜","奕漳",
    "思宏","伟菘","彦歆","睿杰","尹智","琪煜","惠茜","晓晴","志宸","博豪",
    "璟雯","崇杉","俊誉","军卿","辰华","娅楠","志宸","欣妍","明美");
    sort($hiinanimi);
    $esimine = reset($hiinanimi);
    $viimane = end($hiinanimi);
    foreach ($hiinanimi as $hiinan){
        echo $hiinan."<br>";
    }
    echo "Esimene: ".$esimine."<br>";
    echo "Viimane: ".$viimane."<br>";
 $riigid = array("Indonesia","Canada","Kyrgyzstan","Germany","Philippines",
    "Philippines","Canada","Philippines","South Sudan","Brazil",
    "Democratic Republic of the Congo","Indonesia","Syria","Sweden",
    "Philippines","Russia","China","Japan","Brazil","Sweden","Mexico","France",
    "Kazakhstan","Cuba","Portugal","Czech Republic");
    $pikkim = '';
    foreach ($riigid as $prgstr) {
        if (strlen($prgstr) > strlen($pikkim)){
            $pikkim = $prgstr;
        }        
    }
    echo "Pikkima nimega riik on: ".$pikkim."<br>";

?>






  
    <form action="#" method="get">
    Sünniaasta <input type="number" name="synniaasta" required><br>
    <input type="submit" value="Leia juubel">
    </form>

    <?php
        if(isset($_GET["synniaasta"])){
            $vanus = 2025 - $_GET["synniaasta"];
            if($vanus%5 == 0){
                echo "Juubel!";
            } else {
            echo "Ei ole juubel.";
            }
        }
    ?>

    <form action="#" method="get">
        arv1 <input type="number" name="arv1" required><br>
        arv2 <input type="number" name="arv2" required><br>
        <input type="submit" value="jaga">
    </form> 
    <?php
        if(isset($_GET["arv1"]) && isset($_GET["arv2"])){
        $arv1 = $_GET["arv1"];
        $arv2 = $_GET["arv2"];
            
        if($arv2==0){
            echo "Nulliga ei saa jagada!";
        } else {
            echo $arv1 /$arv2;
        }
    }

    ?>

     <h2> Harjutus 03 </h2>

  <?php
$alus1 = $_GET['alus1'];
$alus2 = $_GET['alus2'];
$kõrgus = $_GET['kõrgus'];
$külg = $_GET['külg'];

$trapetsi_pindala = (($alus1 + $alus2) / 2) * $kõrgus;
$rombi_ümbermõõt = 4 * $külg;

echo "Trapetsi pindala: " . round($trapetsi_pindala, 1) . "<br>";
echo "Rombi ümbermõõt: " . round($rombi_ümbermõõt, 1) . "<br>";
?>
   <h2> Harjutus 02 </h2>

<?php
$x = 15;
$y = 5;

$liitmine = $x + $y;
$lahutamine = $x - $y;
$korrutamine = $x * $y;
$jagamine = $x / $y;
$jaak = $x % $y;

echo "$x + $y = $liitmine<br>";
echo "$x - $y = $lahutamine<br>";
echo "$x * $y = $korrutamine<br>";
echo "$x / $y = $jagamine<br>";
echo "$x % $y = $jaak<br>";

$millimeetrid = 1500;
$sentimeetrid = $millimeetrid / 10;
$meetrit = $millimeetrid / 1000;

printf("Millimeetrid: %d mm = %.2f cm, %.2f m<br>", $millimeetrid, $sentimeetrid, $meetrit);

$alus = 6;
$kõrgus = 8;
$hüpotenuus = sqrt(($alus ** 2) + ($kõrgus ** 2));
$ümbermõõt = $alus + $kõrgus + $hüpotenuus;
$pindala = ($alus * $kõrgus) / 2;

echo "Täisnurkse kolmnurga ümbermõõt: " . round($ümbermõõt) . "<br>";
echo "Täisnurkse kolmnurga pindala: " . round($pindala) . "<br>";
?>




  <h2> Harjutus 01 </h2>

    <?php
$nimi = "Tanel";
$sünniaasta = 1990;
$tähtkuju = "Skorpion";

echo "Nimi: $nimi<br>";
echo "Sünniaasta: $sünniaasta<br>";
echo "Tähtkuju: $tähtkuju<br>";
echo '"It’s My Life" – Dr. Alban<br>';

echo "<pre>
    (\\(\\
    ( -.-)
    o_(\")(\")
</pre>";
?>