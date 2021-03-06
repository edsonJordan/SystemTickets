<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTicket extends Model
{
    protected $fillable = [
        'type'
    ];
    use HasFactory;

    public function types(){
        return $this->hasMany(Ticket::class);
    }
}
