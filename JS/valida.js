<?php

require_once("../modelos/usuarios.php");

    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $documento = $_REQUEST['documento'];
    $numero = $_REQUEST['numero'];
    $sexo = $_REQUEST['sexo'];
    $fecha = $_REQUEST['fecha'];
    $direccion = $_REQUEST['direccion'];
    $telefono =$_REQUEST ['telefono'];
    $correo = $_REQUEST['correo'];
    $op = $_REQUEST['op'];
    $usuario = new usuarios ($nombre, $apellidos, $documento, $numero, $sexo, $fecha, $direccion, $telefono,$correo) ;

    if($op=="buscar"){
    	if($usuario->buscar()){

    		$nombre=$usuario->getNombre();
    		$apellidos=$usuario->getApellidos();
    		$documento=$usuario->getDocumento();
    		$numero=$usuario->getNumero();
    		$sexo=$usuario->getSexo();
    		$fecha=$usuario->getFecha();
    		$direccion=$usuario->getDireccion();
    		$telefono=$usuario->getTelefono();
    		$correo=$usuario->getCorreo();

    		$listo=1;

    		echo "<script> location.href='../vista/index.phtml?nombre=$nombre&apellidos=$apellidos&documento=$documento&numero=$numero&sexo=$sexo&fecha=$fecha&direccion=$direccion&telefono=$telefono&correo=$correo'listo=$listo;'</script>";
}else{

    		$listo=0;	
    		echo "<script> location.href='../vista/index.phtml?listo=$listo&op=$op;
    		</script>";

   }
} 		


    if($op=="incluir"){
    	if($usuario->incluir()){
    		$listo=0;	
    		echo "<script> location.href='../vista/index.phtml?listo=$listo&op=$op';
    		</script>";
        }
else{
		$listo=1;	
    		$usuario->incluir();
echo "<script> location.href='../vista/index.phtml?listo=$listo&op=$op';
    		</script>";

     }
}

if($op=="modificar"){
	if($usuario->modificar()){
	$listo=1;	
	echo "<script> location.href='../vista/index.phtml?listo=$listo&op=$op';
            </script>";
	}
}

if($op=="eliminar"){
    if($usuario->eliminar()){
$listo=1;   
    echo "<script> location.href='../vista/index.phtml?listo=$listo&op=$op';
            </script>";
	}
}








?>
