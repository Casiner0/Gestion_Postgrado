<?php

/**
 * Class conexion
 *
 * Esta clase esta hecha con los metodos de "mysqli_" para asegurar compatibilidad con PHP 7.0+
 */
class conexion{

    public $conexion;

    /**
     * @var mysqli
     */
    private $conn;

    private $host;
    private $user;
    private $password;
    private $baseName;
    private $port;

    function __construct(){
        $this->conn = false;
        $this->host = "localhost"; // host
        $this->user = "root"; // usuario
        $this->password = ""; // password
        $this->baseName = "postgrado"; // nombre de la BD
        $this->port = 3306;
        $this->conectar();
    }

    function conectar(){
        if (!$this->conn) {

            $this->conn = mysqli_connect($this->host, $this->user, $this->password);
            mysqli_select_db($this->conn, $this->baseName);

            if (!$this->conn) {
                $this->status_fatal = true;
                echo 'Conexión fallida a la BD';
                die();
            } else {
                $this->status_fatal = false;
            }


        }
    }

    function ejecutarConsulta($sql){
        $r = mysqli_query($this->conn, $sql);
        return $r;
    }

    function devolverResultados($sql){
        $r = $this->ejecutarConsulta($sql);
        $output = array();

        while ($r != false && $record = mysqli_fetch_assoc($r)) {
            $output[] = $record;
        }
        return $output;
    }

    function getIds($sql) {
        $result = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_array($result)) {
            $resultset[] = $row[0];
        }
        if(!empty($resultset))
            return $resultset;
    }

    function cerrarConexion(){
        mysqli_close($this->conn);
    }

}

?>
