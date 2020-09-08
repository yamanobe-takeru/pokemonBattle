<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * 技　全件取得
     * @return Skill[]|\Illuminate\Database\Eloquent\Collection
     */
    public function skillIndex (){
        return Skill::all();
    }
}
