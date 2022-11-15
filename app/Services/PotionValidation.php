<?php

namespace App\Services;

use App\Models\Ingredient;

class PotionValidation
{
    public $status;
    private $statusEnum = [
        "Stable",
        "Explosive",
        "possioness",
        "weak",
        "instable",
    ];
    public $ingredients = [];
    private $score;

    public function __construct()
    {
        $this->status = $this->statusEnum[1];
    }

    public function brew($ingredients)
    {
        foreach ($ingredients as $key => $ingredient)
        {
            $item = Ingredient::where('name', $key)->first();
            if ($item != null)
            {
                array_push($this->ingredients, $item);
            }
            $this->score = $this->score + $item->value;
        }
        $this->potionLogic();
    }

    protected function potionLogic()
    {
        if ($this->score % 4 == 0)
        {
            $this->status = $this->statusEnum[0];
            return true;
        }

        if ($this->score % 3 == 1)
        {
            $this->status = $this->statusEnum[2];
            return true;
        }

        if ($this->score % 6 > 4)
        {
            $this->status = $this->statusEnum[1];
            return true;
        }

        if (($this->score - 1) % 3 == 0)
        {
            $this->status = $this->statusEnum[4];
            return true;
        }

        if ($this->score % 2 == 0)
        {
            $this->status = $this->statusEnum[3];
            return true;
        }

        return false;
    }
}
