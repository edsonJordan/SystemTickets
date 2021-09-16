<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'area'
    ];
    use HasFactory;

    public function areas(){
        return $this->hasMany(Ticket::class);
    }

}
