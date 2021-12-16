<?php

namespace Modules\CommentModule\Entities;

use App\Models\User;
use Database\Factories\CommentsFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\ProductModule\Entities\Product;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'content',
        'product_id',
        'user_id'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected static function newFactory()
    {
        return CommentsFactory::new();
    }
}
