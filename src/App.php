<?php

namespace OopExam;

echo '<pre>';

class App
{
    public function greet()
    {
        echo 'Hi from APP';
    }
}

$newObj = new App();
$newObj->greet();

echo "<br>";

echo 'POST data';
echo '<br>';
print_r($_POST);