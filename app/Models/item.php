<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $fillable = ['product_id','quantity','price','sale_type','customer_id','work_id'];
    use HasFactory;
    public function sale(): belongsTo
    {
        return $this->belongsTo(sale::class);
    }
public function getId()
{
    return $this->attributes['id'];
}


public function setId($id)
{
    $this->attributes['id'] = $id;
}


public function getQuantity()
{
    return $this->attributes['quantity'];
}


public function setQuantity($quantity)
{
    $this->attributes['quantity'] = $quantity;
}


public function getPrice()
{
    return $this->attributes['price'];
}


public function setPrice($price)
{
    $this->attributes['price'] = $price;
}


public function getSaleId()
{
    return $this->attributes['sale_id'];
}


public function setSaleId($saleId)
{
    $this->attributes['sale_id'] = $orderId;
}


public function getProductId()
{
    return $this->attributes['product_id'];
}


public function setProductId($productId)
{
    $this->attributes['product_id'] = $productId;
}


public function getCreatedAt()
{
    return $this->attributes['created_at'];
}


public function setCreatedAt($createdAt)
{
    $this->attributes['created_at'] = $createdAt;
}


public function getUpdatedAt()
{
    return $this->attributes['updated_at'];
}


public function setUpdatedAt($updatedAt)
{
    $this->attributes['updated_at'] = $updatedAt;
}
}
