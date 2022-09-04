<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = ['name','model','cost_price','price','quantity','product_code','barcode','color','reorder_quantity'];
       /**
         * Get all of the product for the category
         *
         * @return \Illuminate\Database\Eloquent\Relations\belongsTo
         */
        /**
         * Get the store that owns the product
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function store()
        {
            return $this->belongsTo(store::class,);
        }
        public function category()
        {
            return $this->belongsToMany(category::class);
        }
        public function getId()
        {
            return $this->attributes['id'];
        }
        public function getName()
        {
            return $this->attributes['name'];
        }
        public function getPrice()
        {
            return $this->attributes['price'];
        }

        public static function sumPricesByQuantities($products, $productsInSession)
        {
            $total = 0;
            foreach ($products as $product) {
                $total = $total + ($product->getPrice()*$productsInSession[$product->getId()]);
            }
            return $total;
        }
        /**
         * Get all of the items for the product
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function items(): HasMany
        {
            return $this->hasMany(item::class,);
        }


        public function getItems()
        {
            return $this->items;
        }
        public function setItems()
        {
            $this->items = $items;
        }

        
}
