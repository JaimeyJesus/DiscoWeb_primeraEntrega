

<?php 

ob_start();
?>
<div id='aviso'><b><?= (isset($msg))?$msg:"" ?></b></div>
<form name='ACCESO' method="POST" action="index.php">
	<label>Usuario</label>
	<input type="text" name="user" value="<?= $user ?>">

	<label>Contraseña</label>
	<input type="password" name="clave" value="<?= $clave ?>"></td>

	<button name="orden" value="Entrar">Entrar</button>
</form>
<?php 

$contenido = ob_get_clean();
include_once "principal.php";

?>
