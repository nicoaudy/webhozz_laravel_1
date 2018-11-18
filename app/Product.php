<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $guarded = [];
	
	# relasi has one -> category
	public function category()
	{
		return $this->belongsTo(Category::class);
	}
}
