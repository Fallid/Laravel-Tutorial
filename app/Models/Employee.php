<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'division',
        'position'
    ];
    public function contact(){
        return $this->hasOne(Contact::class);
    }

    public function activities(){
        return $this->belongsToMany(Activity::class);
    }
}
