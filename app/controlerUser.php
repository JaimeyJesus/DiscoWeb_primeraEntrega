<?php
// ------------------------------------------------
// Controlador que realiza la gestión de usuarios
// ------------------------------------------------
include_once 'config.php';
include_once 'modeloUser.php';


function  ctlUserInicio(){
    $msg = "";
    $user ="";
    $clave ="";
    if ( $_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['user']) && isset($_POST['clave'])){
            $user =$_POST['user'];
            $clave=$_POST['clave'];
            if ( modeloOkUser($user,$clave)){
                $_SESSION['user'] = $user;
                $_SESSION['tipouser'] = modeloObtenerTipo($user);
                if ( $_SESSION['tipouser'] == 3){
                    $_SESSION['modo'] = GESTIONUSUARIOS;
                    header('Location:index.php?orden=VerUsuarios');
                }
                else {
                  // Usuario normal;
                  // PRIMERA VERSIÓN SOLO USUARIOS ADMISTRADORES
                  $msg="Error: Acceso solo permitido a usuarios Administradores.";
                  // $_SESSION['modo'] = GESTIONFICHEROS;
                  // Cambio de modo y redireccion a verficheros
                }
            }
            else {
                $msg="Error: usuario y contraseña no válidos.";
           }  
        }
    }
    
    include_once 'plantilla/facceso.php';
}

// Cierra la sesión y vuelva los datos
function ctlUserCerrar(){
    modeloUserSave();
    session_destroy();
    header('Location:index.php');
}


// Muestro la tabla con los usuario 
function ctlUserVerUsuarios (){
    // Obtengo los datos del modelo
    $usuarios = modeloUserGetAll(); 
    // Invoco la vista 
    include_once 'plantilla/verusuariosp.php';
}


//Borra un usuario y llama a ver la tabla actualizada
function ctlUserBorrar(){
    $user=$_GET['id'];
    if(modeloUserDel($user)){
        $msg="La operación se realizó correctamente.";
    }else{
            $msg="No se pudo relaizar la operación.";
        }
        modeloUserSave(); 
        ctlUserVerUsuarios();
    
}


//Comprueba si hay envio de formulario, de no ser así muestra el formulario nuevo, 
//y sino trata los datos enviados desde este para crear el nuevo usuario.
function ctlUserAlta(){
    //si no hay id enviado por post, muestro formulario
    if(!isset($_POST['id'])){
        include_once 'plantilla/nuevo.php';
        }else{
            //si hay datos enviados por post, y no es el boton de vuelta a atras, doy de alta al usuario
          if(!isset($_POST['atras'])){
            $msg="";
            $usuarioid=$_POST['id']; 
            $passrepetida=$_POST['password2'];
            $valoresUsuario= [$_POST['password'] ,$_POST['nombre'],$_POST['mail'], $_POST['plan'], $_POST['estado']];
            if(modeloUserComprobacionesNuevo($usuarioid,$valoresUsuario , $passrepetida , $msg)) {//comprueba valores introducidos
                if(modeloUserNuevo($usuarioid, $valoresUsuario)){
                    $msg="Usuario dado de alta correctamente";
                    modeloUserSave();
                    ctlUserVerUsuarios();
                    }else{
                        $msg="No se pudo relaizar la operación.";
                     }
              }else{//si los valores no son correctos se muestra el formulario otra vez
                 include_once 'plantilla/nuevo.php';
              }
          }else{//si se le da a atras se vuelve a la pantalla de ver usuarios
            ctlUserVerUsuarios();
        }
    }
}


//Comprobamos si hay Post, de ser asi modificamos el usuario, y sino mostramos el formulario de modificación
function ctlUserModificar(){
    $msg="";
    if(!isset($_POST['nombre'])){
        $usuarioid=$_GET['id'];
        $usuarios = modeloUserGetAll();
        include_once 'plantilla/Modificar.php';
        }else{       
            if(!isset($_POST['atras'])){
                $usuarioid=$_POST['id'];
                $usuarios = modeloUserGetAll();
                $valoresUsuario= [$_POST['clave'] ,$_POST['nombre'],$_POST['email'], $_POST['plan'], $_POST['estado']];
                if(modeloUserComprobacionesModificar($valoresUsuario, $msg)){
                modeloUserUpdate($usuarioid, $valoresUsuario);
                modeloUserSave();
                ctlUserVerUsuarios();
                }else{
                    include_once 'plantilla/Modificar.php';
                }
            }else{
                ctlUserVerUsuarios();
            }
        }
}


//Muestra detalles del usuario en cuestión
function ctlUserdetalles(){
    $usuarios = modeloUserGetAll();
    $msg="Gestión de usuarios";
    include_once 'plantilla/detalles.php';
}