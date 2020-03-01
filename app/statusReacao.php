<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class statusReacao extends Model
{
    protected $table = 'statusReacao';
    protected $fillable = ['status'];
    
    public function statusReacao()
    {
        return $this->belongsTo(Categories::class);
    }
}
