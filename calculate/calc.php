<?php

$num1 = $_REQUEST["number1"];
$num2 = $_REQUEST["number2"];

$math1 = $_REQUEST['math'];

$result = "";

if (!empty($num1)) { 
      if (!empty($num2)){
          if ( $math1 == "add"){
         $result = $num1 + $num2;     
        }  
        if ( $math1 == "sub"){
         $result = $num1 - $num2;     
        }  
          if ( $math1 == "mult"){
         $result = $num1 * $num2;     
        }  
           if ( $math1 == "div"){
         $result = $num1 / $num2;     
        }  
      }

}


echo $result;

?>
