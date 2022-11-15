<?php

declare(strict_types=1);

namespace App\Http\Controllers;


use App\Models\Potion;
use App\Services\PotionValidation;
use Illuminate\Http\Client\Request;

class PotionController extends Controller
{
    public function welcome()
    {
        return view('Welcome');
    }

    public function brewery()
    {
        return view('Brewery');
    }

    /**
    * @param PotionValidation $kettle *
    */
    public function checkPotion(PotionValidation $kettle, Request $request)
    {
        $ingredients = $request->validate([
            'love' => 'nullable|boolean',
        ]);

        //pass ingredient id as array key
        $kettle->brew($ingredients);

        return redirect()->action([PotionController::class, 'potionResult'], ['status' => $kettle]);
    }

    public function potionResult(PotionValidation $kettle)
    {
        if ($kettle->status == "stable")
        {
            return redirect()->action([PotionController::class, 'claimPage'])->with(['potion_ids' => $kettle->ingredients]);
        }

        return redirect()->action([PotionController::class, 'brewery'])->with(["potionStatus", $kettle->status]);
    }

    public function claimPage()
    {

    }

    public function claimSave(Request $request)
    {
        $newPotion = $request->validate([
            'name' => 'required|string|max:200',
            'description' => 'required|string',
        ]);

        try
        {
            Potion::create([
                "name" => $newPotion['name'],
                'description' => $newPotion['description'],
            ]);
        }
        catch (\PDOException $message)
        {
            return redirect()->action([PotionController::class, 'claimPage']);
        }

        return redirect()->action([PotionController::class, 'brewery'])->with(['succes' => "proficiat u hebt een potion gevonden"]);
    }
}
