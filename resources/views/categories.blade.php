@extends('layouts.master')

@section('content')	
	
	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">

			<div class="row ">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach($categories as $item)
                             <li data-filter=".{{$item -> id}}">{{$item -> name}}</li>

                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
			</div>
			
<div class=" row product-lists">
		@foreach($products as $item)

 <div class="col-lg-4 col-md-6 text-center 	{{ $item ->Category-> id}} " >
					<div class="single-product-item ">
						<div class="product-image ">
							<a href="/single-product/{{$item->id}}"><img src="{{ asset('assets/img/' . $item->imagpath) }}" alt=""></a>
						</div>
						<h3>{{$item -> name}}</h3>
						<p class="product-price"> {{$item -> price }} </p>
						<p class="product-price"><span>Quantity</span> {{$item -> quantity }} </p>

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
	
