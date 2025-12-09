<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // collego il tipo
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
