@extends('admin.app');
@section('content')

<form method="POST" action="{{url('admin/product')}}" class=" form-horizontal">
	<!-- {{csrf_field()}} -->
	<fieldset>
	@csrf
		<!-- Form Name -->
		<legend>PRODUCTS</legend>


		<!-- Text input-->
		<div class="form-group">
			<label class="control-label" for="">PRODUCT TITLE</label>  
			<div>
				<input id="" name="title" placeholder="PRODUCT TITLE" class="form-control input-md" required="" type="text">
			</div>
		</div>

		<!-- Text input-->
		<div class="form-group">
			<label class=" control-label" for="">PRODUCT DESCRIPTION</label>  
			<div>
				<input id="" name="description" placeholder="PRODUCT DESCRIPTION" class="form-control input-md" required=""type="text">
			</div>
		</div>

		<!-- Select Basic -->
		<div class="form-group">
			<label class=" control-label" for="">PRODUCT PRICE</label>
			<div>
				<input id="" name="price" placeholder="PRODUCT PRICE" class="form-control input-md" required="" type="number">
			</div>
		</div>
		<!-- File Button --> 
		<div class="form-group">
			<label class=" control-label" for="filebutton">auxiliary_images</label>
			<div>
				<input id="" name="thumbnail" class="input-file" type="file">
			</div>
		</div>

		<!-- Button -->
		<div class="form-group">
			<div>
				<button type="submit" id="" name="" class="btn btn-primary">Add Product</button>
			</div>
		</div>

	</fieldset>
</form>

@endsection