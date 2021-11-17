<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Country extends Model
{
    use HasFactory , SearchableTrait;
    protected $guarded = [];

    public $timestamps = false;


 protected $searchable = [
        'columns' => [
            'countries.name' => 10,
        ]
    ];

    public function status()
    {
        return $this->status ? 'Active' : 'Inactive';
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }

    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }

}
