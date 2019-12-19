/**
 * Funciones auxiliares de javascripts 
 */
function confirmarBorrar(nombre,id){
  if (confirm("¿Quieres eliminar el usuario:  "+nombre+"?"))
  {
   document.location.href="?orden=Borrar&id="+id;
  }
}

function confirmarModificar(nombre,id){
	  if (confirm("¿Quieres modificar el usuario:  "+nombre+"?"))
	  {
	   document.location.href="?orden=Modificar&id="+id;
	  }
	}

function volverAtras(){
	window.history.back();
}
function Alta(){
	document.location.href="?orden=Alta";
}
