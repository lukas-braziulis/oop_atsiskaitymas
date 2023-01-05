<?php

namespace OopExam\Handlers;

use OopExam\Handlers\NewEntryHandler;

echo '<pre>';

class NewEntryHandler
{
    public function __construct(private array $newEntry)
    {
    }

    public function getEntryArray(): array
    {
        return $this->newEntry;
    }
}

class InputDataHandler
{
    private const PAYMENT_ENTRIES_PATH = '../Files/paymentEntries.json';

    public function addEntry(NewEntryHandler $newEntry): void
    {
        $existingEntries = $this->getPaymentEntriesInfo();
        $existingEntries[] = $newEntry->getEntryArray();
        $this->updatePaymentEntriesInfo($existingEntries);
    }

    private function getPaymentEntriesInfo(): array
    {
        return json_decode(file_get_contents(self::PAYMENT_ENTRIES_PATH),true);
    }

    private function updatePaymentEntriesInfo(array $existingEntries): void
    {
        file_put_contents(self::PAYMENT_ENTRIES_PATH, json_encode($existingEntries), JSON_PRETTY_PRINT);
    }

}

$newEntry = new NewEntryHandler($_POST);
$newInputObj = new InputDataHandler();
$newInputObj->addEntry($newEntry);
