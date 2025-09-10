
    
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harjutus 01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
<h1>Harjutus 07</h1>
    <h2>Liitu uudiskirjaga<h2>
<div class="row">
    <div class="col-sm-2">
        <form action="">
    <input type="text"placeholder="Liitu uudiskirjaga">

        </form>
    </div>
</div>
    
    
    
    <h2>Tervitus<h2>




<?php
	function tervita(){
		return "Tere kylaline";	
}
?>
    <h1>Harjutus 06</h1>
<?php
$t = array("juuli","maali","kati");
$p = array("ago","marko","mati");

for ($i=0; $i < count($t); $i++){
    echo$t[$i]. " - ".$p[$i]."<br>";
}

?>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>

