<?php
$num1 = isset($_POST['num1']) ?  $_POST['num1'] : 0;
$num2 = isset($_POST['num2']) ?  $_POST['num2'] : 0;
switch ($_POST['operator']) {
    case "+":
        echo $num1 + $num2;
    break;
    case "-":
        echo $num1 - $num2;
    break;
    case "*":
        echo $num1 * $num2;
    break;
    case "/":
        echo $num1 / $num2;
    break;
}








