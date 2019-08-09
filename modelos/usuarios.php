<?php


require_once("../modelos/datos_model.php");

class usuario{



    private $nombre;
    private $apellidos ;
    private $documento ;
    private $numero  ;
    private $sexo ;
    private $fecha  ;
    private $direccion  ;
    private $telefono  ;
    private $correo ;

    public function __constructor($nombre, $apellidos, $documento,  $numero, $sexo, $fecha ,$direccion,$telefono,$correo){
    	$this->nombre = $nombre;
    	$this->apellidos = $apellidos;
    	$this->documento = $documento;
    	$this->numero = $numero;
    	$this->sexo = $sexo;
    	$this->fecha = $fecha;
    	$this->direccion = $direccion;
    	$this->telefono = $telefono;
    	$this->correo = $correo;

    }


public __destructor(){

}

    public function getNombre(){
    	return $this->nombre;
    }
    public function getApellidos(){
    	return $this->apellidos;
    }
    public function getDocumento(){
    	return $this->documento;
    }
    public function getNumero(){
    	return $this->numero;
    }
     public function getSexo(){
    	return $this->sexo;
    }
     public function getFecha(){
    	return $this->fecha;
    }
     public function getDireccion(){
    	return $this->direccion;
    }
     public function getTelefono(){
    	return $this->telefono;
    }
     public function getCorreo(){
    	return $this->correo;
    }
     

public function buscar(){
	$encontrar = false;//inidica si el registro existe
	$odatos = new datos_model();//conexion bd 
	$sql= "SELECT * FROM datos where (nombre='$this->nombre')";
	$datos_desor = $odatos-> filtro($sql);
	if($columna = odatos->filtro_array($datos_desor)){

		$this->nombre = $columna['nombre'];//accinacion de la bd
        $this->apellidos = $columna['apellidos'];
		$this->documento = $columna['documento'];
		$this->numero = $columna['numero'];
		$this->sexo = $columna['sexo'];
		$this->fecha = $columna['fecha'];
        $this->direccion = $columna['direccion'];
		$this->telefono = $columna['telefono'];
		$this->correo = $columna['correo'];

		$encontrar = true;
	}

	$odatos->close_filtro($datos_desor);
	$odatos->close_conection();

	return $encontrar;
}

public function incluir(){
	$odatos = new datos_model();
	$sql= "INSERT INTO datos(nombre,apellidos,documento, numero, sexo, fecha, direccion, telefono,correo) VALUES('$this->nombre','$this->apellidos', '$this->documento','$this->numero', '$this->sexo', '$this->fecha', '$this->direccion', '$this->telefono', '$this->correo')";
$odatos->execute ($sql);
$odatos->close_conection(); 
}
public function guardar(){
   $odatos = new datos_model();
    $sql= "INSERT INTO datos(nombre,apellidos,documento, numero, sexo, fecha, direccion, telefono,correo) VALUES('$this->nombre','$this->apellidos', '$this->documento','$this->numero', '$this->sexo', '$this->fecha', '$this->direccion', '$this->telefono', '$this->correo')";
$odatos->execute ($sql);
$odatos->close_conection(); 
}

public function modificar(){
	$odatos = new datos_model();
	$sql= "UPDATE `datos` SET `nombre`='$this->nombre',`apellido`='$this->apellidos',`documento`='$this->documento',`numero`='$this->numero',`sexo`='$this->sexo',`fecha`='$this->fecha',`direccion`='$this->direccion',`telefono`='$this->telefono',`correo`='$this->correo'";
	$odatos->execute ($sql);
$odatos->close_conection(); 

}
public function eliminar(){
		$odatos = new datos_model();
		$sql= "DELETE FROM `datos` WHERE (numero='$this->numero')";
		$odatos->execute ($sql);
$odatos->close_conection(); 

}
 
}

?>
