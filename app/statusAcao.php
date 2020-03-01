<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class statusAcao extends Model
{
    protected $table = 'statusAcao';
    protected $fillable = ['dificuldade'];
    
    public function statusAcao()
    {
        return $this->belongsTo(Categories::class);
    }
}
