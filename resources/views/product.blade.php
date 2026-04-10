@extends('layouts.master')

@section('content')


	<div class="row">
	@foreach($products as $item)
<div class="col-lg-4 col-md-6 text-center ">
	
					<div class="single-product-item">
						<div class="product-image">
							<a href="/single-product/{{$item->id}}"><img style="max-height: 250px;min-height:250px" src="{{ asset('assets/img/' . $item->imagpath) }}" alt=""></a>
						</div>
						<h3>{{$item -> name}}</h3>
						<p class="product-price"><span>Per Kg</span> {{$item -> price }} </p>
						<a href="/addproducttocart/{{$item -> id}}" class="cart-btn"><i class="fas fa-shopping-cart"></i>  
						إضافة إلى السلة 
					</a>
					@if(auth()->check()&& auth()->user()->user==='admin')


						<a href="/removeproduct/{{ $item -> id }}" class="btn btn-danger"><i class="fas fa-trash"></i>  
						حذف المنتج
					</a>
						<a href="/editproduct/{{ $item -> id }}" class="btn btn-danger"><i class="fas fa-edit"></i>  
						تعديل المنتج
					</a>
					@endif
					</div>
	
</div>
	@endforeach

	</div>
	<div style="text-align:center; margin:5px 5px; ">

			{{$products->links()}}

	</div>

@endsection
<style> 
svg{
	height: 40px !important;
}
	</style>