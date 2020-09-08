<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PokemonSkill extends Pivot
{
    public function skill(){
        return $this->belongsTo(Skill::class, 'skill_id', 'id');
    }
}
