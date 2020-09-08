<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /**
     * 多対多　中間テーブル経由
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pokemon() {
        return $this->belongsToMany(PokemonSample::class, 'pokemon_types', 'pokemon_type_id', 'type_category_id');
    }

}
