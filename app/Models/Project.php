<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
      'title',
      'slug',
      'image_path',
      'summary',
      'languages',
      'link'
    ];

    public function type() {
      return $this->belongsTo(Type::class);
    }

}
