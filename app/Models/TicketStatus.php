<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketStatus extends Model
{
    protected $fillable = [
        'status'
    ];
    use HasFactory;
    public function status(){
        return $this->hasMany(Ticket::class);
    }
}
