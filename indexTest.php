<?php

declare(strict_types=1);

require_once './vendor/autoload.php';




?>
<!DOCTYPE html><html>
<head>
</head>
<body>
<form method="post" action="./src/Handlers/InputDataHandler.php">
    <label>Sunaudoti kWh: </label>
    <input name="sunaudotaElektra" type="number" required>

    <label>Vieno kWh kaina (EUR): </label>
    <input name="kwhKaina" type="number" required>

    <label>Tarifas: </label>
    <select name="tarifas">
        <option value="dieninis">Dieninis</option>
        <option value="naktinis">Naktinis</option>
    </select>

    <label>Apmokamas mėnesis:</label>
    <input name="menesis" type="month">

    <input type="submit" value="Skaičiuoti kainą">
</form>
<br>
<a href="http://localhost/OOP_atsiskaitymas/src/Views/reportsPage.php">Eiti į mokėjimo puslapį</a>

</body>

