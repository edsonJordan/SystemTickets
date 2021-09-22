<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeSupport extends Model
{
    protected $fillable = [
        'type'
    ];
    use HasFactory;

    public function groups(){
        return $this->belongsToMany(GroupSupport::class);
    }

    
}
