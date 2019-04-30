<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Book extends Model
{
    //

    protected $fillable = ['title', 'description', 'image','auther','lease_fees','total_copies_no','category_id'];
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}

// $table->bigIncrements('id');
// $table->string('title');
// $table->text('description');
// $table->integer('rate');
// $table->string('image');
// $table->string('auther');
// $table->float('lease_fees');
// $table->integer('total_copies_no');
// $table->integer('available_copies_no');
// $table->unsignedBigInteger('category_id');
// $table->softDeletes();
// $table->timestamps();
// DB_CONNECTION=mysql
// DB_HOST=localhost
// DB_PORT=3306
// DB_DATABASE=library
// DB_USERNAME=root
// DB_PASSWORD=
