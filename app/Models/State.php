<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class State extends Model
{
    use HasFactory, SearchableTrait;
    protected $guarded = [];

    public $timestamps = false;


    protected $searchable = [
        'columns' => [
            'states.name' => 10,
        ]
    ];

    public function status()
    {
        return $this->status ? 'Active' : 'Inactive';
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }
}
