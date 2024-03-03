<form method="POST" action="{{url('/')}}/test" enctype="multipart/form-data">
    {{csrf_field()}}
        <input type="file" name="file"  onchange="readURL(this)">
        <button type="submit">submit</button>
    </form>
    