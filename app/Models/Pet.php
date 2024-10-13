<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pet extends Model
{
   use HasFactory;

   protected $fillable = [
      'title',
      'price',
      'user_id',
      'description',
      'category_id',
      'categorylocal_id',
      'categoryvariety_id',
      'categorycolor_id',
      'categoryage_id',
      'age',
      'gender',
      'hiking',
      'sterilization',
      'vaccination',
      'chip',
      'processing',
      'vet_pasport',
      'pedigree',
      'fci',
      'metrics',
      'status',
   ];

   public function user(): BelongsTo
   {
      return $this->belongsTo(User::class);
   }

   public function category(): BelongsTo
   {
      return $this->belongsTo(Category::class, 'category_id', 'id');
   }

   public function categorylocal(): BelongsTo
   {
      return $this->belongsTo(Categorylocal::class, 'categorylocal_id', 'id');
   }

   public function categoryvariety(): BelongsTo
   {
      return $this->belongsTo(Categoryvariety::class, 'categoryvariety_id', 'id');
   }

   public function categorycolor(): BelongsTo
   {
      return $this->belongsTo(Categorycolor::class, 'categorycolor_id', 'id');
   }

   public function categoryage(): BelongsTo
   {
      return $this->belongsTo(Categoryage::class, 'categoryage_id', 'id');
   }

}
