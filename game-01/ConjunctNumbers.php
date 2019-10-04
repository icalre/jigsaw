<?php


class ConjunctNumbers
{

    private $numbers;
    private $sumNumber;

    public function __construct($numbers, $sumNumber)
    {
        $this->numbers = explode(',', $numbers);
        $this->sumNumber = $sumNumber;
    }


    //Function for validate elmenets of array are a numbers.
    public function validateOnlyNumbers()
    {
        $valid = true;
        foreach ($this->numbers as $number) {
            if (!is_numeric($number)) {
                $valid = false;
            }
        }


        return $valid;
    }

    //Function to get the result
    public function getSum()
    {
        $results = array();

        $validNumbers = $this->validateOnlyNumbers();

        if($validNumbers)
        {
            foreach ($this->numbers as $number) {
                $rest = $this->sumNumber - $number;

                if (in_array($rest, $this->numbers) && empty($results)) {
                    $results = [$number, $rest];
                }
            }
        }

        return $results;

    }
}