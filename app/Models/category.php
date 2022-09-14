<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = ['name','description'];

   /**
         * Get all of the product for the category
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function product()
        {
            return $this->hasMany(product::class,'product_id');
        }
        public function getName()
        {
            return $this->attributes['name'];
        }
    
}
