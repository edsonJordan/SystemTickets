<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupSupport extends Model
{
    protected $fillable = [
        'group', 'type_id'
    ];
    use HasFactory;
    
    public function type(){
        return $this->belongsTo(TypeSupport::class);
    }
    
    
}
