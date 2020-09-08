<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PokemonSample extends Model
{
    /**
     * 多対多　中間テーブル経由
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function types() {
        return $this->belongsToMany(
            Type::class, 'pokemon_type', 'pokemon_id', 'type_id'
        );
    }

    /**
     * 多対多
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function skill()
    {
        return $this->belongsToMany(
            Skill::class, 'pokemon_skills', 'pokemon_skills', 'skill_id'
        )
            ->using(PokemonSkill::class)
            ->as('pokemon_skills')
            ->withPivot(['skill_id', 'memorize_skill']);
    }
}
