<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class statusComportamento extends Model
{
    protected $fillable = [''];
    
    public function statusComportamento()
    {
        return $this->belongsTo(Categories::class);
    }
}
