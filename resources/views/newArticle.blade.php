@extends('layouts.main')
@section('title', 'New Article')
@section('content')
    <h2 class="m-5 p-0">New Article</h2>
    <form method="post" action="viewArticle">
        @csrf
        <div class="mb-3">
            <label for="frm-title" class="form-label">Title</label>
            <input type="text" class="form-control" id="frm-title" name="frm-title" placeholder="Judul Artikel">
        </div>
        <div class="mb-3">
            <label for="frm-title" class="form-label">Konten</label>
            <textarea name="frm-content" id="frm-content" rows="3" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary form-control">Upload</button>
        </div>
    </form>
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
