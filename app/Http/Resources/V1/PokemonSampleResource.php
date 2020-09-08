<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PokemonSampleResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'skill'=> $this->pokemon_skills,
                'type' => $this->pokemon_type_id,
                'image_url' => $this->image_url,
            ],
            'relationships' => [
                'types' => TypeResource::collection($this->types),
                'memorize_skills' => SkillResource::collection($this->skill()->wherePivot('memorize_skill', 1)->get()),
                'available_skills' => SkillResource::collection($this->skill()->wherePivot('memorize_skill', 0)->get())
            ],
            'links' => [
                'self' => ''
            ]
        ];
    }

}
