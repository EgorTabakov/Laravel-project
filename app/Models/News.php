<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function newsList(): array
    {
        return \DB::table($this->table)
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select(['news.*', 'categories.title as category_title'])
            ->get()->toArray();
    }

    public function news(int $id):object
    {
        return \DB::table($this->table)
            ->select(['id', 'title', 'description', 'created_at'])
            ->where(['id' => $id])
            ->first();
    }
}
