<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getFullPath()
    {
        $path = $this->name;
        $parent = $this->parent;

        while (!is_null($parent)) {
            $path = $parent->name . ' > ' . $path;
            $parent = $parent->parent;
        }

        return $path;
    }
}
