<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{

    /**
     * 多対多
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pokemon() {
        return $this->belongsToMany(Skill::class, 'pokemon_skills', 'pokemon_skills', 'skill_id');
    }


}
