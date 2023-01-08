<?php

declare(strict_types=1);

namespace OopExam\Checkers;

use OopExam\Exceptions\DateExceptionOriginal;
use DateTime;
use Exception;

class DateCheckerOriginal
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
            throw new DateExceptionOriginal($message);
        }

        if ($inputDateObj->format('Y-m') < $currentDateObj->modify('-1month')->format('Y-m')) {
            $message = sprintf('Jūs vėluojate sumokėti mokesčius %s dienas(-ų).', $_POST['diff']);
            throw new DateExceptionOriginal($message);
        }
    }
}
