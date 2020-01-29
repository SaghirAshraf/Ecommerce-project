@entends('admin.app')
@section('content')
<h2>Create Product</h2>
@endsection
<!-- <form action="{{route('admin.category.store')}}" method="post" accept-charset="utf-8">
	@csrf

  <div class="form-group row">
  	<div class="col-sm-12">
  		<label class="form-control-label">Title</label>
  		<input type="hidden" name="slug" id="slug" value="">
  	</div>
  </div>
  <div class="form-group row">
  	<div class="col-sm-12">
  		<label class="form-control-label">Description</label>
  		<textarea name="description" id="editor" class="form-control" rows="10" cols="80"></textarea>
  	</div>
  </div>
  <div class="form-group row">
  	<div class="col-sm-12">
  		<label class="form-control-label">Selet Category:</label>
  		<select name="parent_id[]" id="parent_id" class="form-control" multiple>
  			@if ($errors)
  			<option value="0">Top Level</option>
  			option
  			@foreach($errors as $category)
  			<option value="{{$category->id}}">{{$category->title}}</option>
  			@endforeach
  			@endif
  			option
  		</select>
  	</div>
  </div>
   
		<div class="form-group row">
  	<div class="col-sm-12">
  		<input type="submit" name="submit" class="btn btn-primary" value="Add Category">
  	</div>
  </div>

</form> -->





