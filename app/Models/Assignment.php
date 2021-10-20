<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        'group_id', 'ticket_id'
    ];
    use HasFactory;

    public function group(){
        return $this->belongsTo(GroupSupport::class);
    }
    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }

    public function groups(){
        return $this->belongsToMany(GroupSupport::class);
    }
    public function tickets(){
        return $this->belongsToMany(Ticket::class);
    }

}
