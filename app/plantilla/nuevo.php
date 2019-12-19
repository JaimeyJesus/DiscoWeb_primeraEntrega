<?php
// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();

?>
<div id='aviso'><b><?= (isset($msg))?$msg:"" ?></b></div>
<form action="index.php?orden=Alta" method="POST">
<?php  
$auto = $_SERVER['PHP_SELF'];

/* identificador => Nombre, email, plan y Estado
*/

?>


Identificador <input type="text" name="id" >
Nombre <input type="text" name="nombre" >
Correo Electrónico <input type="text" name="mail" >
Contraseña <input type="password" name="password" >
Repita contraseña <input type="password" name="password2" >
Plan <select name="plan">
    <option value="0">Básico</option>
    <option value="1">Profesional</option>
    <option value="2">Premium</option>
    <option value="3">Máster</option></select>
    
Estado <select name="estado">
    <option value="A">Activo</option>
    <option value="B">Bloqueado</option>
    <option value="I">Inactivo</option></select>

<input type="submit" name="orden" value="Alta">
<input type="submit" name="atras" value="atras">
</form>
     
<?php 
// Vacio el bufer y lo copio a contenido
// Para que se mue p div de contenido de la página principal

$contenido = ob_get_clean();
include_once "principal.php";

?>
