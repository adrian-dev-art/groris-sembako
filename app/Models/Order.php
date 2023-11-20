<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    
    use HasFactory;

    protected $fillable = ['asset_id', 'quantity', 'total_amount'];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}