<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carro extends Model
{
    use HasFactory;

    public function brand_relacion(){

        return $this->belongsTo('App\Models\Brands', 'Brand_id', 'id');
    }
}
