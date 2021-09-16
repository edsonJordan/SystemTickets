<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketPriority extends Model
{
    protected $fillable = [
        'priority'
    ];
    use HasFactory;
    
    public function priorities(){
        return $this->hasMany(Ticket::class);
    }
}
