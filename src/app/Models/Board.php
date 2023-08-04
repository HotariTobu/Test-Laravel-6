<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    // blacklist of Mass Assignment < = > fillable
    protected $guarded = ['id'];

    public static $rules = [
        'person_id' => 'required',
        'title' => 'required',
        'message' => 'required',
    ];

    public function describe()
    {
        return "{$this->id}: {$this->title}";
    }

    // relation
    public function person()
    {
        // global scopeのせいで常にnullを返すので注意
        return $this->belongsTo(Person::class);
    }
}
