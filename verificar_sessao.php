<?php
session_start();
 
$_SESSION['numero'];
 
if(isset($_SESSION['numero'])){
            echo "Autor existe";
} else {
            echo "Autor não existe";
}
 
                                                                                                                                          
?>