<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    protected $fillable =['task','task_status','work_id'];

       /**
         * Get all of the product for the category
         *
         * @return \Illuminate\Database\Eloquent\Relations\belongsTo
         */
        public function work(): belongsTo
        {
            return $this->belongsTo(work::class);
        }
}
