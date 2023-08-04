<?php

namespace App\Models;

use App\Models\Scopes\TeensScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public function describe()
    {
        return "{$this->id}: {$this->name} ({$this->age})";
    }

    // local scope
    public function scopeChild($query, $threshold = 20)
    {
        return $query->where('age', '<', $threshold);
    }

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('adult', function (Builder $query) {
            $query->where('age', '>', 20);
        });

        static::addGlobalScope(new TeensScope);
    }

    protected $guarded = ['id'];

    public static $rules = [
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|between:0,150',
    ];
}
