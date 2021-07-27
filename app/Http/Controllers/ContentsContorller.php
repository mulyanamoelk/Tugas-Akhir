<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Models\Content as ModelsContent;
use PhpParser\Builder\Function_;
function  index()
{
  $data=ModelsContent::get();
  return $data;
}
class ContentsContorller extends Controller
{
  //
}