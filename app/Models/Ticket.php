<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'typeticket_id', 'priority_id', 'status_id', 'tittle', 'description'
    ];

    /* 
    public function getDatapickAttribute()
    {
    return $this->user_id . ' ' . $this->tittle;
        } 
        */


    public function area(){
        return $this->belongsTo(Area::class);
    }
    
    public function status(){
        return $this->belongsTo(TicketStatus::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
  
    public function typeticket(){
        return $this->belongsTo(TypeTicket::class);
    }
    public function priority(){
        return $this->belongsTo(TicketPriority::class);
    }



    public function users(){
        return $this->belongsTo(User::class);
    }
    
}
