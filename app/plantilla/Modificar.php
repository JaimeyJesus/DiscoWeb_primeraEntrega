<?php
// No se envia al navegador
ob_start();
?>
<h1>Modificación de usuario</h1>
<div id='aviso'><b><?= (isset($msg))?$msg:"" ?></b></div>
<form action="index.php?orden=Modificar" method="POST">
<?php  
$auto = $_SERVER['PHP_SELF'];
$usuarioM=$usuarios[$usuarioid];
/* identificador => Nombre, email, plan y Estado
*/
for ($j=0; $j < count($usuarioM); $j++){
}
?>
	<label for="id" class="id">Id</label> 		 
	<input type="text" name="id" value="<?=(isset($usuarioid))?$usuarioid:''?>" readonly >


	<label for="nombre" class="nombre">Nombre</label> 		 
	<input type="text" name="nombre" value="<?=(isset($usuarioM[1]))?$usuarioM[1]:''?>">
		
	<label for="clave" class="clave">Password</label> 		 
	<input type="text" name="clave" value="<?=(isset($usuarioM[0]))?$usuarioM[0]:''?>">


	<label for="correo" class="correo">Correo electronico</label> 		 
	<input type="text" name="email" value="<?=(isset($usuarioM[2]))?$usuarioM[2]:''?>">

	Plan <select name="plan">
    <option value="0" <?=($usuarioM[3]=='Básico')?'selected':''?>>Básico</option>
    <option value="1" <?=($usuarioM[3]=='Profesional')?'selected':''?>>Profesional</option>
    <option value="2" <?=($usuarioM[3]=='Premium')?'selected':''?>>Premium</option>
    <option value="3" <?=($usuarioM[3]=='Máster')?'selected':''?>>Máster</option></select>
    
Estado <select name="estado">
    <option value="A"<?=($usuarioM[4]=='Activo')?'selected':''?>>Activo</option>
    <option value="B"<?=($usuarioM[4]=='Bloqueado')?'selected':''?>>Bloqueado</option>
    <option value="I"<?=($usuarioM[4]=='Inactivo')?'selected':''?>>Inactivo</option></select>

	<button name="Modificar" type="submit" value="Modificar" 
	onclick="confirmarModificar('<?= $usuarioM[0]."','".$usuarioM."'"?>)">Modificar</button>

	<button name="orden" value="atras">Atrás</button>


</form>       

<?php 
$contenido = ob_get_clean();
include_once "principal.php";
?>
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido de la página principal