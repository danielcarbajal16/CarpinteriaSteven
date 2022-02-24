<?php
    /*define("Host", 'localhost');
    define ("BD",'carpinteria');
    define ("User_BD",'root');
    define ("Pass_BD",'');*/
    define("Host", 'localhost');
    define ("BD",'id16891975_carpinteria');
    define ("User_BD",'id16891975_steven');
    define ("Pass_BD",'nj?joNZ!VQ%9E5r?');

    //echo "Holi<br>";
    function conecta(){
	    if (!($con = mysqli_connect(Host,User_BD,Pass_BD))){
		    echo "Error conectando al servidor de BBDD";
		    exit();
	    }
	    if (!mysqli_select_db($con, BD)){
		    echo"Error Seleccionando BD";
		    exit();
	    }
	    return $con;
    }
?>