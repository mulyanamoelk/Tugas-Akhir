<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Schema\Blueprint;

class Content extends Model
{
    use HasFactory;
    protected $fillable=[
        'title', 'content'
    ];
    public function up()
    {
        Schema::create('artikel', function (Blueprint $table){
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('artikel');
    }
}
