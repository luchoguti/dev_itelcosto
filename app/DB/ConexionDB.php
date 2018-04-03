<?php

/**
* 
*/

class ConexionDB
{
	


    public static function connect() {
   
	    $host = 'localhost';
	    $user = 'root';
	    $pass = '';
	    $db = 'db_itelcost';
        
        $myconn = mysqli_connect($host, $user, $pass, $db);
        if (!$myconn) {
            die('No se puedo Conectar!');
        } else {
        	return $myconn;
        }
    }

    public static function close($myconn) {
        mysqli_close($myconn);
    }


}




?>