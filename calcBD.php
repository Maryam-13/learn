<?php

$num1 = $_REQUEST["number1"];
$num2 = $_REQUEST["number2"];

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

$connection = mysqli_connect("localhost","root","","calc");

mysqli_query($connection,"INSERT INTO values1(num1, math, num2, result) VALUES ($num1, '$math', $num2, $result)");

$resource = mysqli_query($connection, "SELECT * FROM values1");

while($row = mysqli_fetch_assoc($resource)){
    echo"<pre>";
    print_r($row);
}

?>

<!doctype html>
<html>
<head>
    <title>Калькулятор</title>
</head>

<body>
<form>
   <input type="text" name="number1">
    <select name="math">
        <option value="add">+</option>
        <option value="sub">-</option>
        <option value="mult">*</option>
        <option value="div">/</option>
    </select>
    <input type="text" name="number2">
    <input type="submit" value="Вычислить">
</form>

<div><?php echo $result;?></div>
</body>
</html>