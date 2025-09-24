<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harjutus 01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <h1>Harjutus 08</h1>

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
  </body>
</html>
