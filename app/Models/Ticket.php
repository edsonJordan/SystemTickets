<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'type_ticket', 'priority_id', 'status_id', 'description'
    ];

  


    public function type(){
        return $this->belongsTo(TypeTicket::class);
    }
    public function area(){
        return $this->belongsTo(Area::class);
    }
    public function priority(){
        return $this->belongsTo(TicketPriority::class);
    }
    public function status(){
        return $this->belongsTo(TicketStatus::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
