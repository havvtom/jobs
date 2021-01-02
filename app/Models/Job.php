<?php

namespace App\Models;

use App\Models\Tag;
use App\Scoping\Scoper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tags()
    {
    	return $this->belongsToMany(Tag::class)->orderBy('created_at', 'DESC');
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

}
