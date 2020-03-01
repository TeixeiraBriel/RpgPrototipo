<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['title','category_id','desc','tipo'];
    // this relationship will only return one level of child items
    public function categories()
    {
        return $this->hasMany(Categories::class, 'category_id');
    }
 
    // This is method where we implement recursive relationship
    public function childCategories()
    {
        return $this->hasMany(Categories::class, 'category_id')->with('categories');
    }

    public function statusAcao()
    {
        return $this->hasMany(statusAcao::class);
    }
    public function statusReacao()
    {
        return $this->hasMany(statusReacao::class);
    }
}
