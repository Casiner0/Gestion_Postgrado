<?php

    include_once 'conexion.php';

    class daoUser{

        private $usuario;
        private $password;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if ($i > 0) {
                call_user_func_array(array($this, '__constructArg'), $a);
            } else {
                call_user_func_array(array($this, '__constructEmpty'), $a);
            }
        }

        function __constructEmpty(){

        }

        function __constructArg($usuario, $password ){
            $this->usuario = $usuario;
            $this->password = $password;
        }
    	
        //function para autenticar el usuario	
    	function Autenticar($usuario, $password){
            $pass = md5($password);
    		$sql = "SELECT * FROM user WHERE usuario = '$usuario' AND pass = '$pass'";
    		$con = new conexion();
    		return $con->devolverResultados($sql);
    	}
    }
?>
