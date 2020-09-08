<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PokemonSampleResource;
use App\Models\PokemonSample;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * ポケモンサンプル　一覧取得
     * @return PokemonSample[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return PokemonSampleResource::collection(PokemonSample::with(['types'])->get());
    }

    /**
     * ポケモン　技更新
     * @param Request $request
     * @param PokemonSample $pokemonSample
     * @return array
     */
    public function update(Request $request, PokemonSample $pokemonSample)
    {
        $result = [];
        for ($i = 0; $i < count($request->skill1); $i++)
        {
            if ($pokemonSample::find($request->id)->skill()
                ->wherePivot('skill_id' ,$request->skill1[$i])
                ->wherePivot('memorize_skill', 1)
                ->first())
            {
                array_push($result, $pokemonSample::find($request->id)->skill()
                    ->updateExistingPivot($request->skill1[$i], ['memorize_skill' => 0]));
            }
            else
            {
                if($pokemonSample::find($request->id)->skill()
                    ->wherePivot('memorize_skill', 1)
                    ->get()
                    ->count() < 3)
                {
                    array_push($result, $pokemonSample::find($request->id)->skill()
                        ->updateExistingPivot($request->skill1[$i], ['memorize_skill' => 1]));
                }
            }
        }
        return $result;
    }
}
