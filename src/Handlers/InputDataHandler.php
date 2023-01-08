<?php

declare(strict_types=1);

namespace OopExam\Handlers;

use OopExam\Checkers\DateCheckerOriginal;
use OopExam\Exceptions\DateExceptionOriginal;
use DateTime;
use Exception;

class DateException extends Exception
{

}

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

    public function checkDateValidate()
    {
        DateChecker::checkDate();

        $this->addEntry();
    }

    public function addEntry(): void
    {
            $existingEntries = $this->getPaymentEntriesInfo();
            $existingEntries[] = $this->getEntryArray();
            $this->updatePaymentEntriesInfo($existingEntries);

            header("Location:http://localhost/OOP_atsiskaitymas/src/Views/reportsPage.php");
    }

    private function getPaymentEntriesInfo(): array
    {
        return json_decode(file_get_contents(self::PAYMENT_ENTRIES_PATH),true);
    }

    private function updatePaymentEntriesInfo(array $existingEntries): void
    {
        file_put_contents(self::PAYMENT_ENTRIES_PATH, json_encode($existingEntries, JSON_PRETTY_PRINT));
    }

}

class DateChecker
{
    /**
     * @throws DateException
     * @throws Exception
     */
    public static function checkDate(): void
    {
        date_default_timezone_set('Europe/Vilnius');

        $currentDateString = date('Y-m-d');

        $inputDateString = date('Y-m-t', strtotime($_POST['menesis'] . "-01"));
        $currentDateObj = new DateTime($currentDateString);
        $inputDateObj = new DateTime($inputDateString);

        $_POST['current_date'] = $currentDateObj->format('Y-m-d');
        $_POST['input_date'] = $inputDateObj->format('Y-m-d');
        $_POST['diff'] = $currentDateObj->diff($inputDateObj)->days;

        if ($inputDateObj->format('Y-m') >= $currentDateObj->format('Y-m')) {
            $message = 'Mokėjimas atliekamas per anksti.';
            throw new DateException($message);
        }

        if ($inputDateObj->format('Y-m') < $currentDateObj->modify('-1month')->format('Y-m')) {
            $message = sprintf('Jūs vėluojate sumokėti mokesčius %s dienas(-ų).', $_POST['diff']);
            throw new DateException($message);
        }
    }
}

$newInputObj = new InputDataHandler($_POST);
$newInputObj->checkDateValidate();


