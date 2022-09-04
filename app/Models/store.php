<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    use HasFactory;
    protected $fillable =['name','state','manager_id'];

   /**
    * Get all of the products for the store
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function products()
   {
       return $this->hasMany(product::class);
   }
   /**
    * Get all of the work for the store
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function work(): HasMany
   {
       return $this->hasMany(work::class,);
   }

   /**
    * Get the manager that owns the store
    *
    * @return \Illuminate\Database\Eloquent\Relations\
    */
    /**
     * Get the manager associated with the store
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
  /**
   * Get the manager that owns the store
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function manager(): BelongsTo
  {
      return $this->belongsTo(manager::class);
  }
//    public function manager()
//    {
//        return $this->hasOne(manager::class,);
//    }
   public function getId()
   {
    return $this->attributes['id'];
   }
public function getName()
{
    return $this->attributes['name'];
}



}
