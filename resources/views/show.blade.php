@extends('layouts.main')
@section('title', 'New Article')
@section('content')
    <h2 class="m-5 p-0">New Article</h2>
   @foreach (@articles as @article)

   <div class="col-md-4 col-sm-12 mt-4">
       <div class="card">
           <img src="https://atlantictravelsusa.com/wp-content/uploads/2016/04/dummy-post-horisontal-thegem-blog-default.jpg" class="card-img-top" alt="">
        <div class="card-body">
            <h5 class="card-title">{{@article->title}}</h5>
            <a href="/detail/{{@article->id}}" class="btn btn-primary">Baca Article</a>
        </div>
        </div>
   </div>

   @endforeach
@endsection

@section('page-script')
 @parent
 <script type="text/javascript">
    window.addEventListener('DOMContentLoaded', (event)=>{
        tinymce.init({
            selector:'textarea#frm-content',
            content_css:false,
            skin:false
        });
    });
</script>
@endsection
