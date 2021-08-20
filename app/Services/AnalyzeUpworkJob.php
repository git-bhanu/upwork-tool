<?php

namespace App\Services;

use App\Models\Phrases;

class AnalyzeUpworkJob
{
    private $description;
    private $words;
    public $found = [];

    public function __construct($description)
    {
        $this->description = $description;
        $this->words = Phrases::all()->pluck('word')->toArray();

    }


    public function analyze()
    {
        foreach ($this->words as $word) {
            $regex = '/\b'.$word.'\b/';
            preg_match_all($regex, $this->description, $issue, PREG_OFFSET_CAPTURE);
            if (!empty($issue[0])) {
                $found_array = [
                    'term' => $issue[0][0][0],
                    'count' => count($issue[0])
                ];
                array_push($this->found, $found_array);
            }
        }

        return $this->found;
    }
}
