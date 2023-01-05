<?php

namespace OopExam\Handlers;

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


var_dump($_POST);

echo '<hr>';
echo '<hr>';
echo '<hr>';

//$newEntry = new NewEntryHandler($_POST);
//echo $newEntry->getEntryArray();