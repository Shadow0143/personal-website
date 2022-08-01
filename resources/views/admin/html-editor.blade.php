@extends('admin.layouts.app')
@section('css')
@endsection
@section('content')
    <section class="content">
        <div class="body_scroll">
            {{-- <form method="post">
                <textarea type="text" id="longDescriptionUpdate">Hello, World!</textarea>
            </form> --}}
            <textarea name="editor1"></textarea>
        </div>
    </section>
@endsection
@section('js')
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor1' );
</script>
    {{-- <script type="text/javascript">
        $(function() {
            $('#longDescriptionUpdate').summernote()
        })
    </script> --}}
@endsection
