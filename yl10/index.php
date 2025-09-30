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
		echo 'Valitud lehte ei eksisteeri!';
	}
} else {
?>
<h1>Main page</h1>
<p>Integer sit amet gravida ex, ut tincidunt sapien. Sed dictum, neque et scelerisque consequat, tortor nisl condimentum arcu, id porttitor felis felis at turpis. Pellentesque ornare, ex et lacinia egestas, erat erat scelerisque elit, sit amet bibendum dui est in est. Cras id velit tortor. Duis commodo varius rutrum. Phasellus pharetra vestibulum aliquet. Quisque quis scelerisque lectus. Aenean non luctus mi, quis porttitor sem. Donec sit amet urna tempus, porta nibh eu, viverra enim.</p>

    <?php
    }   
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>