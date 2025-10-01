<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harjutus 01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <h1>Harjutus 14</h1>

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
      echo'    <form action="#" method="get">
        <p>Sisestage atribuudid.</p>
        Kõrgus (max 450, min 1): <input type="number" name="height" required min="1" max="450"><br>
        Laius (max 450, min 1): <input type="number" name="width" required min="1" max="450"><br>
        <input type="submit" value="Teosta">
        </form>';
      if(isset($_GET["width"], $_GET["height"])){
        $height = $_GET["width"];
        $width = $_GET["height"];
        $hnr = $height;
        $wnr = $width;
      }
      $kataloog = 'failid';
      $asukoht=opendir($kataloog);
      while($rida = readdir($asukoht)){
      	if($rida!='.' && $rida!='..'){
          echo '<a href="'.$kataloog.'/'.$rida.'"><img src="'.$kataloog.'/'.$rida.'" height="'.$hnr.'" width="'.$wnr.'"></a>'."<br>";
      	}
      }
    }
    jpgfali();
?>
     <h1>Harjutus 9.3</h1>
 <!-- Email -->
    <?php
    function email(){
        echo'    <form action="#" method="get">
            Sisestage oma nimi <input type="text" name="nimi" required><br>
            <input type="submit" value="Kontrolli">
        </form>';
        if(isset($_GET["nimi"])){
            $nimi = $_GET["nimi"];
            $nimi = mb_strtolower($nimi);
            $asenda = array(" ", "ä", "ö", "ü", "õ");
            $asendused = array(".", "a", "o", "y", "o");
            $email = str_replace($asenda, $asendused, $nimi);
            echo $email."@hkhk.edu.ee";
        }
    }
    email()
    ?>

    <?php
    date_default_timezone_set('Europe/Tallinn');
    function roppus(){
        echo'    <form action="#" method="get">
            Sisesta text <input type="text" name="roppus" required><br>
            <input type="submit" value="Kontrolli">
        </form>';
        if(isset($_GET["roppus"])){
            $txt = $_GET["roppus"];
            $roppused = array("fuck", "fucking", "kurat", "noob", "shit");
            $asendus = "***";
            echo str_replace($roppused, $asendus, $txt);
        }
    }
    roppus()
    ?>
    <h1>Harjutus 9.2</h1>
  
    <?php
    date_default_timezone_set('Europe/Tallinn');
    function punktid(){
        echo'    <form action="#" method="get">
            Sisesta sõna <input type="text" name="punktid" required><br>
            <input type="submit" value="Kontrolli">
        </form>';
        if(isset($_GET["punktid"])){
            $sona = $_GET["punktid"];
            echo strtoupper(implode(".", str_split($sona)));
        }
    }
    punktid()
    ?>
    <h1>Harjutus 9</h1>

    <?php
    date_default_timezone_set('Europe/Tallinn');
    function sonum(){
        echo'    <form action="#" method="get">
            Sisesta nimi <input type="text" name="sonum" required><br>
            <input type="submit" value="Kontrolli">
        </form>';
        if(isset($_GET["sonum"])){
            $sonum = $_GET["sonum"];
            $sonumlwc = strtolower($sonum);
            $sonumucd = ucfirst($sonumlwc);
            echo "Tere, $sonumucd!";
        }
    }
    sonum()
    ?>
    <h1>Harjutus 08</h1>
    <?php
    date_default_timezone_set('Europe/Tallinn');
    echo "Praegu on " . date('d.F.Y') ."<br>";
    echo "Kellaaeg on " . date("h:i:sa") ."<br>";

    $vanus = "2008-07-02";
    $kuupaev = date("Y-m-d");
    $hetkenevanus = new DateTime($vanus);
    $hetkenekuup = new DateTime($kuupaev);
    $vahe = $hetkenekuup->diff($hetkenevanus);
    $aasta = $vahe->y;
    $kuu = $vahe->m;
    $paev = $vahe->d;

    echo "Vanus: $aasta aastat, $kuu kuud ja $paev päeva.". "<br>";

    $tana = new DateTime("2025-09-19");
    $kooliaastalopp = new DateTime("2026-05-31");

    $vahe = $tana->diff($kooliaastalopp);
    $paevadeArv = $vahe->days;

    echo "Käesoleva kooliaasta lõpuni on jäänud $paevadeArv päeva!";

?>
    <h1>Harjutus 07</h1>
    <?php
//Tervitus
      function tervita() {
        echo ("päiksekesekene");
      }
//Uudiskiri
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

//Kasutajanimi ja email
      function createUser($u) {
        $lu =strtolower($u); 
        echo $lu."@hkhk.edu.ee";
          echo "<br>";
        $p = substr(password_hash($lu, PASSWORD_BCRYPT),7,7);
        echo $p;
      }
//Arvud
      function vahemikus($a1, $a2, $s) {
        for ($i=$a1; $i <= $a2; $i=$i+$s) {
          echo $i;
        }
      }
//Ristküliku pindala
      function rectangles($a1, $a2) {
        return $a1 * $a2;
      }
//Isikukood
      function ik($ik) {
        $pikkus = strlen($ik);
        if ($pikkus==11) {
          // $vastus="Õige pikkusega";
        if (intval($ik[0])%2==0) {
          $vastus = "Naine";
        } else{
          $vastus = "Mees";
        }
      } else {
        $vastus="IK vale pikkusega";
      }
      return $vastus;
    }

//Head mõtted
      function headmotted() {
        $alused = array("Jüri", "Mari", "Uku");
        $oeldised = array("armastab", "viskab", "tõmbab");
        $sihitised = array("mind", "sind", "teda");

          echo $alused[array_rand($alused)]." ".$oeldised[array_rand($oeldised)]." ".$sihitised[array_rand($sihitised)];
      }
      headmotted();

      echo "<br>";

      tervita();
      uudiskiri();
      createUser("Mario");
      echo "<br>";
      vahemikus(2,20,3);
      echo "<br>";
      echo ik("48011064711");
      echo "<br>";
    ?>
    <h2>Ristküliku Pindala</h2>
    <form>
      Külg 1<input type="number" name="kylg1" value="10">
      Külg 2<input type="number" name="kylg2" value="10">
      <input type="submit" value="Arvuta Pindala">
    </form>

    <?php
      echo "Pindala ".rectangles($_GET['kylg1'],$_GET['kylg2']);
      echo "<br>";
    ?>
     <h1>Harjutus 06</h1>
    <?php
     //Massiivid ja tsüklid

    $tudrukud = ['mari', 'kati', 'marion', 'kerli', 'maria'];
    $poisid   = ['gabriel','mario','üllar','joonas','henrik']; 

    for ($i = 0; $i < count($tudrukud); $i++) {
        echo "<div style='margin-bottom:4px;'>";
        echo "<span style='display:inline-block; width:100px;'>{$tudrukud[$i]}</span>";
        echo "<span style='display:inline-block; width:100px;'>{$poisid[$i]}</span>";
        echo "</div>";
    }

echo "<br>";

    //Massiivid ja tsüklid (Bonus)
    shuffle($tudrukud);
    shuffle($poisid);

    for ($i = 0; $i < count($tudrukud); $i++) {
        echo "<div style='margin-bottom:4px;'>";
        echo "<span style='display:inline-block; width:100px;'>{$tudrukud[$i]}</span>";
        echo "<span style='display:inline-block; width:100px;'>{$poisid[$i]}</span>";
        echo "</div>";
    }
echo "<br>";
    //Kolmega jaguvad
      for ($i=1; $i <= 100 ; $i++) {
        if ($i%3==0) {
          echo $i. "<br>";
        }
      }
echo "<br>";
    //Kahanev
      for ($i = 10; $i >= 1; $i--) {
    if ($i % 2 == 0) {
        echo $i . "<br>";
    }
    }
echo "<br>";
    //10x10 tärnid (ruut)
      for ($i=1; $i <= 100; $i++) {
          echo"*";
          if ($i%10==0) {
              echo "<br>";
          }
      }
echo "<br>";
    //koosta tärnidest horisontaalne rida
      $tarnideArv = 10;

      for ($i = 0; $i < $tarnideArv; $i++) {
          echo "*";
      }
echo "<br>";
    //koosta tärnidest vertikaalne rida
      for($rida=1; $rida<=10; $rida++){ 
        echo '*<br>';
      }
echo "<br>";
    //loo arvud 1-100
    //loo pärast iga 10 arvu reavahetus
    //lisa iga arvu järele punkt (N: 1. 2. 3. jne…)
        for ($i=1; $i <=100; $i++) {
            echo $i.".";
            if ($i%10==0) {
                echo "<br>";
            }
        }
    ?>
     <h1>Harjutus 05</h1>

<?php
//Riigid
    $riigid = array("Indonesia","Canada","Kyrgyzstan","Germany","Philippines","Philippines","Canada","Philippines","South Sudan","Brazil","Democratic Republic of the Congo","Indonesia","Syria","Sweden","Philippines","Russia","China","Japan","Brazil","Sweden","Mexico","France","Kazakhstan","Cuba","Portugal","Czech Republic");
    $pikimriik="";
    foreach($riigid as $riik){
        if(strlen($riik)>strlen($pikimriik)){
            $pikimriik=$riik;
        }
    }
    echo"pikim riik on: ".$pikimriik."<br>";

//Hiinanimed
    $hiinanimed = array("瀚聪","月松","雨萌","展博","雪丽","哲恒","慧妍","博裕","宸瑜","奕漳","思宏","伟菘","彦歆","睿杰","尹智","琪煜","惠茜","晓晴","志宸","博豪","璟雯","崇杉","俊誉","军卿","辰华","娅楠","志宸","欣妍","明美");
            sort($hiinanimed);
            echo $hiinanimed[0], "<br>";
            $viimanehiinanimi = count($hiinanimed)-1;
            echo $hiinanimed[$viimanehiinanimi];

//google
     $google = array("Feake", "Bradwell", "Dreger", "Bloggett", "Lambole", "Daish", "Lippiett", "Blackie", "Stollenbeck", "Houseago", "Dugall", "Sprowson", "Kitley", "Mcenamin", "Allchin", "Doghartie", "Brierly", "Pirrone", "Fairnie", "Seal", "Scoffins", "Galer", "Matevosian", "DeBlase", "Cubbin", "Izzett", "Ebi", "Clohisey", "Prater", "Probart", "Samwaye", "Concannon", "MacLure", "Eliet", "Kundt", "Reyes");

            if (isset($_GET['googl'])) {
                $googlenimi = $_GET['googl'];
                if (in_array($googlenimi, $google)) {
                    echo '<div class="alert alert-success" role="alert">Nimi on olemas!</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Pole sellist nime!</div>';
                }
            }
       
?>
    <form action="#">
        Eemalda firma: <input type = "text" name= "eemalda">
        <input type="submit" value="Eemalda firma">
    </form>
<?php
//firmad
echo"<br>";


$firmad = array("Kimia","Mynte","Voomm","Twiyo","Layo","Talane","Gigashots","Tagchat","Quaxo","Voonyx","Kwilith","Edgepulse","Eidel","Eadel","Jaloo","Oyope","Jamia");
if(isset($_GET["eemalda"])) {
    $kustuta_firma = $_GET["eemalda"];
    $otsitav = array_search($kustuta_firma, $firmad);
    unset($firmad[$otsitav]);
}
foreach ($firmad as $firma) {
    echo $firma."<br>";
}
?>

<?php
//autod
    $cars = array("Subaru","BMW","Acura","Mercedes-Benz","Lexus","GMC","Volvo","Toyota","Volkswagen","Volkswagen","GMC","Jeep","Saab","Hyundai","Subaru","Mercedes-Benz",
"Honda","Kia","Mercedes-Benz","Chevrolet","Chevrolet","Porsche","Buick","Dodge","GMC","Dodge","Nissan","Dodge","Jaguar","Ford","Honda","Toyota","Jeep",
"Kia","Buick","Chevrolet","Subaru","Chevrolet","Chevrolet","Pontiac","Maybach","Chevrolet","Plymouth","Dodge","Nissan","Porsche","Nissan","Mercedes-Benz",
"Suzuki","Nissan","Ford","Acura","Volkswagen","Lincoln","Mazda","BMW","Mercury","Mitsubishi","Ram","Audi","Kia","Pontiac","Toyota","Acura","Toyota","Toyota",
"Chevrolet","Oldsmobile","Acura","Pontiac","Lexus","Chevrolet","Cadillac","GMC","Jeep","Audi","Acura","Acura","Honda","Dodge","Hummer","Chevrolet","BMW",
"Honda","Lincoln","Hummer","Acura","Buick","BMW","Chevrolet","Cadillac","BMW","Pontiac","Audi","Hummer","Suzuki","Mitsubishi","Jeep","Buick","Ford");

$vins = array(
"1GKS1GKC8FR966658", "1FTEW1C87AK375821", "1G4GF5E30DF760067", "1FTEW1CW9AF114701", "WAUGGAFC8CN433989", "3G5DA03E83S704506", "4JGDA2EB0DA207570", 
"1FTEW1E88AK070552", "SAJWA0F77F8732763", "JHMFA3F21BS660717", "JTHBP5C29C5750730", "WA1LFAFP9DA963060", "3D7TT2CT6BG521976", "WVWN7EE961049", 
"2C3CA5CG3BH341234", "YV4952CFXC162587", "KNALN4D71F5805172", "JN1CV6EK7BM903692", "5FRYD3H84EB186765", "WAUL64B83N441878", "WDDGF4HBXCF845665", 
"WAUKF78E45A133973", "JN1BY0AR2AM022612", "WA1EY74L69D931520", "3GYFNGEYXBS290465", "1D7CW2GK4AS059336", "JN8AZ1FY5EW087447", "WAUBF78E57A343355", 
"SCFFBCCD8AG695133", "WBAWC73548E143482", "3GYFNGE38DS093883", "SCBCP73WC348460", "JN8AE2KPXE9353316", "2C3CDXDT2EH018229", "1G6AH5SX7D0325662", 
"WVWED7AJ7DW431402", "1FTKR1AD3AP316066", "WBAKF5C52CE612586", "1FTNX2A57AE16083", "WAUCFAFR1AA166821", "SCFFDAAM3EG486065", "1G4PR5SK5F4821043", 
"1C3CDFCB4ED858321", "1N6AD0CW8EN722090", "1NXBU4EE0AZ438077", "2T1BPRHE7FC131594", "JH4KB1637C451183", "1C4NJCBA7ED747024", "WAUHF68P86A736691", 
"3D7TT2HT1AG96429", "5GADX23L96D250838", "5FRYD3H25FB985936", "1G4GG5E30DF126304", "KNADH5A38B6072755", "WAUBFAFL1BA477979", "3C63DRL4CG674293", 
"1G6AR5SX0E0834815", "1NXBU4EE2AZ309838", "WAUKGBFB4AN797783", "JN1AJ0HP8AM801887", "WAUPL68E25A448831", "WA1C8BFP3FA535374", "WAUHE78P78A019744", 
"TRURD38J081400551", "1G4HP52K95428171", "5N1CR2MN1EC607241", "5UMDU93417L322773", "1G6AJ5S35F09585", "JN1CV6AP3BM234743", "SCBCR63W66C842051", 
"SCFFDCBD2AG509467", "WBA3C1C58CA664091", "1D7RW2BK6BS922303", "WAUDH98E67A546009", "2HNYB1H46CH683844", "3VW467AT4DM257275", "WDDGF4HB7CA515172", 
"2G61W5S88E9666199", "5GADV33W17D256205", "2C3CDXDT9CH683075", "2G4GU5X0E9989574", "WAUJC58E53A641651", "WDDEJ7KB3CA053774", "3D73M3CL6AG890452", 
"5GAER13D19J026924", "1G4HC5EM1BU329204", "3VWML7AJ6CM772736", "3C6TD4HT2CG011211", "JTDZN3EU2FJ023675", "JN8AZ1MU4CW041721", "KNAFX5A82F5991024", 
"1N6AA0CJ1D57470", "WAUEG98E76A780908", "WAUAF78E96A920706", "1GT01XEG8FZ268942", "1FTEW1CW4AF371278", "JN1AZ4EH8DM531691", "WAUEKAFBXAN294295", 
"1N6AA0EDXFN868772", "WBADW3C59DJ422810");


echo "Autosid: ".count($cars)."<br>";
echo "VINid: ".count($vins)."<br>";
if (count($cars)==count($vins)) {
    echo "Autod ja VINid klapivad <br>";
} else {
    echo "Autod ja VINid ei klapi <br>";
}

$toyota = 0;
$audi = 0;
foreach($cars as $car) {
    if ($car=="Toyota") {
        $toyota++;
    }
        if ($car=="Audi") {
        $audi++;
    }
}

echo "Toyota: ".$toyota."<br>";
echo "Audi: ".$audi."<br>";

echo "Valed VINid: "."<br>";
foreach ($vins as $vin) {
    if (strlen($vin)<17) {
        echo $vin."<br>";
    }
}

?>

    <?php
        echo "<br>";
        echo "<br>";
        $pildid = array("img/prentice.jpg","img/freeland.jpg","img/peterus.jpg","img/devlin.jpg","img/gabriel.jpg","img/pete.jpg");
        echo "<img src=$pildid[2] alt=prentice>", "<br>", "<br>";
        foreach($pildid as $pilt) {
            echo "<img src=$pilt alt=prentice>";
        }
        echo "</div>";
        echo "<div class='row'>";
            foreach($pildid as $pilt) {
                echo "<div class='col-sm-2'><img src=$pilt alt=prentice></div>";
        }
            echo "</div>";
    ?>
     <h3>Harjutus 4</h3>
        <form method="get">
            a <input type="number" name="a"><br>
            b <input type="number" name="b"><br>
            <input type="submit" value="Saada">
        </form>
        <?php
            if (isset($_GET['a']) && isset($_GET['b'])) {
                $a = $_GET['a'];
                $b = $_GET['b'];
                $jagamine = $a / $b;
                echo "Arvude jagatis on: ", $jagamine, "<br>";
            }
        ?>
        <p></p>
        <h3>Vanus</h3>
        <form method="get">
            1. Vanus <input type="number" name="vanus1"><br>
            2. Vanus <input type="number" name="vanus2"><br>
            <input type="submit" value="Saada">
        </form>
        <?php
            if (isset($_GET['vanus1']) && isset($_GET['vanus2'])) {
                $vanus1 = $_GET['vanus1'];
                $vanus2 = $_GET['vanus2'];
                if ($vanus1 < $vanus2) {
                    echo "2. vanus on vanem kui 1. vanus.";
                }
                else if ($vanus2 < $vanus1) {
                    echo "1. vanus on vanem kui 2. vanus.";
                }
                else {
                    echo "Ühe vanused";
                }
            }
        ?>
        <p></p>
        <h3>Ruudu validaator</h3>
        <form method="get">
            1. Külg <input type="number" name="kulg1"><br>
            2. Külg <input type="number" name="kulg2"><br>
            <input type="submit" value="Saada">
        </form>
        <?php
            if (isset($_GET['kulg1']) && isset($_GET['kulg2'])) {
                $kulg1 = $_GET['kulg1'];
                $kulg2 = $_GET['kulg2'];
                if ($kulg1 == $kulg2) {
                    echo "Kujund on ruut.";
                }
                else {
                    echo "Kujund on ristkülik.";
                }
            }
        ?>
        <p></p>
        <h3>Ruudu validaator - Graafiline</h3>
        <form method="get">
            1. Külg <input type="number" name="kulg1"><br>
            2. Külg <input type="number" name="kulg2"><br>
            <input type="submit" value="Saada">
        </form>
        <?php
            if (isset($_GET['kulg1']) && isset($_GET['kulg2'])) {
                $kulg1 = $_GET['kulg1'];
                $kulg2 = $_GET['kulg2'];
                if ($kulg1 == $kulg2) {
                    $ruut = "img/ruut.png";
                    echo "<br>";
                    echo "<img src=$ruut alt=img width=200 height=200>";
                }
                else {
                    $ristkulik = "img/Ristkulik.png";
                    echo "<br>";
                    echo "<img src=$ristkulik alt=img width=400 height=200>";
                }
            }
        ?>
        <p></p>
        <h3>Juubeli kalkulaator</h3>
        <form method="get">
            Sünnipäev <input type="number" name="sunnipaev"><br>
            <input type="submit" value="Saada">
        </form>
        <?php
            if (isset($_GET['sunnipaev'])) {
                $sunnipaev = $_GET['sunnipaev'];
                $aasta = 2025;
                $vanus = $sunnipaev - $aasta;
                $jaak = $vanus % 5;
                if ($jaak == 0) {
                    echo "Sul on juubli aasta.";
                }
                else {
                    echo "Sul ei ole juubel veel.";
                }
            }
        ?>
        <p></p>
        <h3>Punktide hinnete kontroll</h3>
        <form method="get">
            Punktide arv: <input type="number" name="punktid"><br>
            <input type="submit" value="Saada">
        </form>
        <?php
            if (isset($_GET['punktid'] )&& !empty($_GET['punktid'])) {
                $punktid = $_GET['punktid'];
                if ($punktid >= 10) {
                    echo "SUPER!!";
                }
                else if ($punktid >= 5 && $punktid <= 9){
                    echo "TEHTUD!!";
                }
                else if ($punktid < 5 && $punktid >= 0) {
                    echo "HALB!!";
                }
                else {
                    echo "SISESTA OMA PUNKTID!!!";
                }
            }
        ?>
    <h1>Harjutus 3</h1>
		<form method="get">
			a <input type="text" name="a"><br>
			b <input type="text" name="b"><br>
			h <input type="text" name="h"><br>
        <input type="submit" value="Saada">
		</form>

				<?php
					if (isset($_GET['a']) && isset($_GET['b']) && isset($_GET['h'])) {
						$a = $_GET['a'];
						$b = $_GET['b'];
						$h = $_GET['h'];
						$trapetsipindala = (($a + $b) * $h) /2;
						$rombiumbermoot = 4 * $a;
						echo "Rombiümbermõõt on: ",$rombiumbermoot,"<br>";
						echo "Trapetsipindala on: ",$trapetsipindala, "<br>";
					}
				?>
     <h1>Harjutus 2</h1>
        <?php
				$kaks = 2;
				$uks = 1;
				$j = $uks / $kaks;
				$k = $uks * $kaks;
				$li = $uks + $kaks;
				$la = $uks - $kaks;

				$korrutus = sprintf('Korrutus: %d', $k);
				$liitmine = sprintf('Liitmine: %d', $li);
				$lahutamine = sprintf('Lahutamine: %d', $la);
				$jagamine = sprintf('Jagamine: %0.3f', $j);
				echo $liitmine, "<br>";
				echo $lahutamine, "<br>";
				echo $korrutus, "<br>";
				echo $jagamine, "<br><br>";

				$mm = 3000;

				$cm = $mm / 10;
				$m = $cm / 100;

				echo "Millimeetrid: ", $mm, "<br>";
				echo "Sentimeetrid: ", $cm, "<br>";
				echo "Meetrid: ", $m, "<br><br>";
					
				$a = 10;
				$b = 5;
				$c = sqrt($a**2 + $b**2);
				$umbermoot = $a + $b + $c;
				$pindala = ($a * $a) / 2;
				echo sprintf("Kolmnurga ümbermõõt on: %0.2f", $umbermoot), "<br>";
				echo sprintf("Kolmnurga pindala on: %0.2f", $pindala), "<br>";
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
    o_(\")(\")s
</pre>";
?>