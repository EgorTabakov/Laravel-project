<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function categoryList()
    {
        return \DB::table($this->table)
            ->select(['id', 'title', 'description'])
            ->get()->toArray();
    }

    public function category(int $id)
    {
        return \DB::table($this->table)
            ->select(['id', 'title', 'description'])
            ->where(['id' => $id])
            ->first();
    }
}

