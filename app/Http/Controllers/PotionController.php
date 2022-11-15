<?php

declare(strict_types=1);

namespace App\Http\Controllers;


use App\Models\Potion;
use App\Models\PotionIngredient;
use App\Services\PotionValidation;
use Illuminate\Http\Request;

class PotionController extends Controller
{
    public function welcome()
    {
        return view('home');
    }

    public function brewery()
    {
        return view('brewRoom');
    }

    /**
     * @param Request $request
     * @param PotionValidation
     */
    public function checkPotion(Request $request, PotionValidation $kettle)
    {
//        dd($request);
        $ingredients = $request->validate([
            'basil' => 'nullable|boolean',
            'chives' => 'nullable|boolean',
            'lavender' => 'nullable|boolean',
        ]);

        //pass ingredient id as array key
        $kettle->brew($ingredients);
        return $this->potionResult($kettle);
//        return redirect()->action([PotionController::class, 'potionResult'])->with(['status' => $kettle]);
    }

    public function potionResult(PotionValidation $kettle)
    {

        if ($kettle->status == "Stable")
        {
            return redirect()->action([PotionController::class, 'claimPage'])->with(['ingredients' => $kettle->ingredients]);
        }

        return view('brewRoom')->with(["potionStatus" =>$kettle->status]);
    }

    public function claimPage()
    {
        return view('newPotion')->with('ingredients', session('ingredients'));
    }

    public function claimSave(Request $request)
    {
        $newPotion = $request->validate([
            'name' => 'required|string|max:200',
            'description' => 'required|string',
        ]);

        try
        {
            $potion = Potion::create([
                "name" => $newPotion['name'],
                'description' => $newPotion['description'],
            ]);

//            dd(session('ingredients'));
//            foreach (session('ingredients') as $ingredient)
//            {
//                PotionIngredient::create([
//                    'potion_id' => $potion->id,
//                    'ingredient_id' => $ingredient->id,
//                ]);
//            }
        }
        catch (\PDOException $message)
        {
            return redirect()->action([PotionController::class, 'claimPage']);
        }

        return redirect()->action([PotionController::class, 'brewery'])->with(['potionStatus' => "Stable"]);
    }
}
