@extends('admin.app');
@section('content')
<h2>Products</h2>
<div class="box-header with-border">
	<a href="{{route('admin.product.create')}}" type="button" class="btn btn-default">Add Product</a>
</div>
<br>

<table class="table table-bordered">
	<tbody>
		<tr>
			<th>Title</th>
			<th>Description</th>
			<th>Price</th>
			<th>Image</th>
			<th>Action</th>
		</tr>
		@if(isset ($products))
		@foreach ($products as $product)
		<tr>
			<td>{{$product->title}}</td>
			<td>{{$product->description}}</td>
			<td>{{$product->price}}</td>
			<td><img src="{{asset('images/'.$product->picture)}}"></td>
			<td><a href="{{route('admin.product.edit',$product->id)}}" class="btn btn-success">Edit</a>
				<a href="{{route('admin.product.delete_data',$product->id)}}" class="btn btn-danger">Delete</a> 
				<a href="{{route('admin.product.cart',$product->id)}}" class="btn btn-default">Add To Cart</a> 
			</td>
			</tr>
			@endforeach
			@endif
		</tbody>
		
	</table>
	
<!-- @foreach ($products as $product)
<li>
	{{$product->title}}
</li>
@endforeach -->
@endsection