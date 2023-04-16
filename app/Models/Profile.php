<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    // 課題：Laravel14-05
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
    );
    
    // 課題：Laravel17 Profile Modelに関連付けを行う
    public function profilehistories()
    {
        return $this->hasMany('App\Models\ProfileHistory');
    }
}
