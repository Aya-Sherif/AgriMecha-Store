<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function pModel()
    {
        return $this->belongsTo(PModel::class,'p_model_id');
    }

}
