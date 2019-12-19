<?php
// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();

?>
<?=(isset($msg))?'<p>'.$msg.'</p>':''?>

<div class="grid-container">
<div class="grid-item"><b>id</b></div>
<div class="grid-item"><b>nombre</b></div>
<div class="grid-item"><b>correo</b></div>
<div class="grid-item"><b>plan</b></div>
<div class="grid-item"><b>estado</b></div>
<div class="grid-item"><b>operaciones</b></div>
<div class="grid-item"></div>
<div class="grid-item"></div>
<?php
$auto = $_SERVER['PHP_SELF'];
// identificador => Nombre, email, plan y Estado
?>
<?php foreach ($usuarios as $clave => $datosusuario) : ?>
		
<div class="grid-item"><?= $clave ?></div>
	<?php for  ($j=1; $j < count($datosusuario); $j++) :?>
     <div class="grid-item"><?=$datosusuario[$j] ?></div>
	<?php endfor;?>
<div class="grid-item"><a href="#"
			onclick="confirmarBorrar('<?= $datosusuario[1]."','".$clave."'"?>);">Borrar</a></div>
<div class="grid-item"><a href="<?= $auto?>?orden=Modificar&id=<?= $clave ?>">Modificar</a></div>
<div class="grid-item"><a href="<?= $auto?>?orden=Detalles&id=<?= $clave?>">Detalles</a></div>

<?php endforeach; ?>
</div>

<form action='index.php'>
	<input type='submit' name='orden' value='Cerrar'> 
	<input type='submit' name='orden' value='Alta'> 
	<input type='submit' name='orden' value='MisArchivos'> 

</form>

<?php
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido de la página principal
$contenido = ob_get_clean();
include_once "principal.php";

?>