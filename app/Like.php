<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // !Fillable has no like field 
    protected $fillable = ['user_id','book_id'];
    protected $table = "favorites";
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function book() {
        return $this->belongsTo('App\Book');
    }
}