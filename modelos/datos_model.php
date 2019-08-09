

<?php


class Datos{ #se crea la clase datos donde se alojara todas las funciones que se necesitan del modelo

    private $conn; #se crea la conexion privada para tener que acceder a ella cuando se necesite, principalmente se hace esto por seguridad
   public function __construct() #se crea el constructor el cual aloja la forma de conectarse a la base de datos
    {
    $servername = "localhost"; #se pone el nombre del servidor
    $user = "root"; #se pone el usuario de la base de datos
    $password = ""; #se pone la clave de la bd
    $db = "jojojo"; #  se pone el nombre de la base de datos
    $this->conn = new mysqli_connect($servername,$user,$password,$db); #la variable $this es propia de php y se utiliza para pasarle parametros, en este caso la conexecion de la base de datos.
    mysql_select_db($db, $this->conn); # seleccionamos la base de datos, esto pasa si laa conexion fue exitosa
    }
    public function __destruct(){ #se crea el destructor el cual debe acabar el proceso del constructor

    }
    public function filtro($sql){ #creamos la funcion busqueda, que recibe un parametro de tipo $sql, es decir un query
        $result = mysqli_query($sql, $this->conn); # generamos la variable $result que recibe el query y para hacerlo valido, tambien recibe la variable $this->conn donde esta alojada la conexion a la base de datos
         return $result; #cuando termina su proceso y sea llamada devolvera el $result
    }
    public function close_filtro($datos){ #se crea la funcion que cierra la busqueda anterior para liberar memoria y hacer los siguiientes procesos mas eficientes  recibe un parametro $datos
        mysqli_free_result($datos); # se llama la funcion propia de php y mysql y se libera la variable datos

    }
    public function filtro_array($datos){ #se hace la busqueda en el array y recibe la variable $datos
        $array = mysqli_fetch_array($datos); #creamos la variable $array y le pasamos un array asociativo de la consulta que trae $datos
        return $array; #cuando se llame la funcion retornara la informacion en $array
    }
    public function execute($sql){# se genera la funcion para ejecutar la consulta y recibe la consulta en la varible $sql
        mysqli_query($sql, $this->conn); #se llama la funcion mysqli_query para que php sepa que es un query de mysql y requiere la consulta y la conexion

    }
    public function close_conection(){ #se crea la funcion que cierra la conexion a nuestra base de datos
        mysqli_close($this->conn);#llammos la funcion de cerrar y le pasamos la conexion para que no este siempre abierta, caso de seguridad y eficacia de procesos

    }
    public function alertacon(){
   echo "<script>alert('I am an alert box!')</script>";
    }
}



/*if(isset($_REQUEST['guardar'])) {

    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $documento = $_REQUEST['documento'];
    $numero = $_REQUEST['numero'];
    $sexo = $_REQUEST['sexo'];
    $fecha = $_REQUEST['fecha'];
    $direccion = $_REQUEST['direccion'];
    $telefono = ['telefono'];
    $correo = $_REQUEST['correo'];

    $query = "INSERT INTO `datos`(`nombre`, `apellidos`, `documento`, `numero`, `sexo`, `fecha`, `direccion`, `telefono`, `correo`) VALUES('$nombre','$apellidos','$documento','$numero','$sexo','$fecha','$direccion','$telefono','$correo')";

    $result = mysqli_query($conn, $query);

    
    if($result){
        echo "creacion exitosa";
}else{
    echo "no esta haciendo nada";
 
   
}

}*/


?>
