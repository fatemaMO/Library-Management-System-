<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Like;

class Like extends Model
{
    protected $fillable = ['user_id','book_id'];
    protected $table = "favorites";
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function book() {
        return $this->belongsTo('App\Book');
    }
}