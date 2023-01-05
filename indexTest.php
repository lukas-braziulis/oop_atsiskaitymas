<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

echo '<pre>';

require_once './vendor/autoload.php';




?>
<!DOCTYPE html><html>
<head></head>
<body>
<form method="post" action="./src/Handlers/InputDataHandler.php">
    <label>Sunaudoti kWh: </label>
    <input name="sunaudotaElektra" type="number" required>

    <label>Vieno kWh kaina (EUR): </label>
    <input name="kwhKaina" type="number" required>

    <label>Tarifas: </label>
    <select>
        <option value="dieninis">Dieninis</option>
        <option value="nakitinis">Naktinis</option>
    </select>

    <label>Apmokamas mėnesis:</label>
    <input name="menesis" type="month">

    <input type="submit" value="Skaičiuoti kainą">
</form>
</body>

