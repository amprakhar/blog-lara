@extends('layouts.default')
@section('content')
<div class="wrapper">
  <div class="col-md-8 mx-auto">
    <div class="card-header border mb-3 rounded">
        <div class="card-title mb-0"> @if(isset($post)) {{ __('Update Posts') }} @else {{ __('Add Posts') }} @endif</div>
    </div>
    <div class="section">
        @if(isset($post))
            {{ Form::model($post, ['url' => ['addPost', $post['id']], 'files' => true]) }}
        @else
            {{ Form::open(array('url' => 'addPost', 'files' => true)) }}
        @endif
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label class="label">Title<span class="text-danger">*</span></label>
              {{ Form::text('title', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Enter Title', 'required']) }}
            </div>
            <div class="mb-3">
              <label class="label">Content<span class="text-danger">*</span></label>
              {{ Form::textarea('description', null, ['class' => 'form-control form-control-sm', 'rows' => 4, 'placeholder' => 'Enter Description', 'required']) }}
            </div>
            <div class="mb-3">
              @if(isset($post))
                {{ Form::submit('Update') }}
              @else
                {{ Form::submit('Save') }}
              @endif
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label class="label">Image</label>
              {{ Form::file('file', ['class' => 'form-control form-control-sm', 'onchange' => 'imageshow(this)']) }}
              @if(isset($post['image']))
                <div class="mt-2"><img id="preview" width="300" class="img-thumbnail" src="{{ asset('images/'. $post['image']) }}"></div>
              @else 
                <div class="mt-2"><img id="preview" width="300" class="img-thumbnail" src="{{ asset('images') }}/download.jpg"></div>
              @endif
            </div>
          </div>
        </div>
        {{ Form::close() }}
      </form>
    </div>
  </div>
</div>
@endsection
<script>
function imageshow(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      var img = new Image;
      img.onload = function() {
      };
      img.src = reader.result;
      document.getElementById("preview").src = e.target.result;
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>