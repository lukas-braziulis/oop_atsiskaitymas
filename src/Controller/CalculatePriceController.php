<?php

declare(strict_types=1);

namespace OopExam\Controller;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

echo '<pre>';

class CalculatePriceController
{

}

date_default_timezone_set('Europe/Vilnius');

//echo 'Today';
//echo '<br>';
//$today = new DateTime();
//print_r($today);
//echo "<hr>";
//
//echo 'MONTH';
//echo '<br>';
//$month = date('m');
//echo $month;
//echo "<hr>";
//
echo 'POST data';
echo '<br>';
print_r($_POST);

echo 'Hi from Price Controller';