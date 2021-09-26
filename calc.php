<?php

$num1 = $_REQUEST["namber1"];
$num2 = $_REQUEST["namber2"];

$math = $_REQUEST['math'];

$result = "";

if (!empty($num1)) { 
      if (!empty($num2)){
          if ( $math == "add"){
         $result = $num1 + $num2;     
        }  
        if ( $math == "sub"){
         $result = $num1 - $num2;     
        }  
          if ( $math == "mult"){
         $result = $num1 * $num2;     
        }  
           if ( $math == "div"){
         $result = $num1 / $num2;     
        }  
      }

}

?>

<!doctype html>
<html>
<head>
    <title>Калькулятор</title>
</head>

<body>
<form>
   <input type="text" name="namber1">
    <select name="math">
        <option value="add">+</option>
        <option value="sub">-</option>
        <option value="mult">*</option>
        <option value="div">/</option>
    </select>
    <input type="text" name="namber2">
    <input type="submit" value="Вычислить">
</form>

<div><?php echo $result;?></div>
</body>
</html>