<?php

declare(strict_types=1);

namespace OopExam\Views;

$entries = json_decode(file_get_contents('../Files/paymentEntries.json'), true);
if (is_null($entries)) {
    $entries = [];
}

function getGrandTotal($array): int
{
    $grandTotalArray = [];

    foreach ($array as $entry){
        $grandTotalArray[] = $entry['sunaudotaElektra'] *= $entry['kwhKaina'];
    }
    return array_sum($grandTotalArray);
}

$grandTotal = getGrandTotal($entries);

?>

<!DOCTYPE html><html>
<head></head>
<body>

<fieldset style="border: 1px black solid; padding: 10px; margin-top: 50px;">
    <legend>ENTRIES</legend>
    <?php foreach ($entries as $key => $entryArray): ?>
    <?//if(isset($entryArray['paid'])){continue;}; ?> <!-- Nepavyko su šitu IF'u padaryti kad veiktų. -->
        <div style="display: flex; justify-content: space-between">
            <div>Mėnesis: <?= $entryArray['menesis'] ?></div>
            <div>Sunaudoti kWh: <?= $entryArray['sunaudotaElektra'] ?></div>
            <div>Vieno kWh kaina: <?= $entryArray['kwhKaina'] ?> EUR</div>
            <div>Tarifas: <?= $entryArray['tarifas'] ?></div>
            <div>Mokėti: <?= $entryArray['sunaudotaElektra'] *= $entryArray['kwhKaina']?> EUR</div>
        </div>
        <hr>
    <?php endforeach; ?>
    <div style="font-weight: bold">
        Iš viso moketi: <?= $grandTotal?> EUR
    </div>
</fieldset>
<br>

<form method="post" action="../Handlers/EntryDeleteHandler.php">
    <input type="submit" name="deklaruoti-sumoketi" value="Deklaruoti ir Sumoketi">
</form>
<br>
<br>
<a href="http://localhost/OOP_atsiskaitymas/index.php">Grįžt į suvedimo puslapį</a>

</body>


