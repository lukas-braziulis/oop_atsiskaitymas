<?php

namespace OopExam\Handlers;

function setPaid()
{
    $entries = json_decode(file_get_contents('../Files/paymentEntries.json'), true);

    $newEntriesArray = [];
    foreach ($entries as $entry){
        $entry['paid'] = 'yes';
        $newEntriesArray[] = $entry;
    }

    file_put_contents('../Files/paymentEntries.json', json_encode($newEntriesArray, JSON_PRETTY_PRINT));

    header("Location: http://localhost/OOP_atsiskaitymas/indexTest.php");
};

setPaid();



