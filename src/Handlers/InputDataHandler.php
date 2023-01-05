<?php

namespace OopExam\Handlers;

class InputDataHandler
{
    private const PAYMENT_ENTRIES_PATH = '../Files/paymentEntries.json';

    public function __construct(private array $newEntry)
    {
    }

    public function getEntryArray(): array
    {
        return $this->newEntry;
    }

    public function addEntry(): void
    {
        $existingEntries = $this->getPaymentEntriesInfo();
        $existingEntries[] = $this->getEntryArray();
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

$newInputObj = new InputDataHandler($_POST);
$newInputObj->addEntry();
