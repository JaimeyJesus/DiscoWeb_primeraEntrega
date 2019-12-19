<?php
// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();

?>


<?php  
$auto = $_SERVER['PHP_SELF'];
$usuarioM=$usuarios[$_GET['id']];

?>
<div id="detalles">
<div class="container">
<h1>Detalles de <?=$_GET['id']?></h1>
  <ul class="list-group">
    <li class="list-group-item">Nombre <span class="badge"><?=$usuarioM[1]?></span></li>
    <li class="list-group-item">Correo electrónico <span class="badge"><?=$usuarioM[2]?></span></li>
    <li class="list-group-item">Plan <span class="badge"><?=$usuarioM[3]?></span></li>
    <li class="list-group-item">Número de ficheros <span class="badge"></span></li>
    <li class="list-group-item">Espacio ocupado <span class="badge"></span></li>
  </ul>
</div>

<form action="index.php" method="POST">
	<input type="submit" name="VerUsuarios" value="Volver">
</form>       
</div>
<?php 
// Vacio el bufer y lo copio a contenido
// Para que se mue p div de contenido de la página principal

$contenido = ob_get_clean();
include_once "principal.php";

?>
