@extends('layouts.footer')


@section('content')


<div class="cart-section mt-150 mb-150">
		<div class="container"style="margin-top:300px">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
                                @foreach($cartproducts as $item)
								
								<tr class="table-body-row">
									<td class="product-remove">
										<a href="/deleteitem/{{$item -> id}}"><i class="far fa-window-close"></i></a>
									</td>
									<td class="product-image">
										<img src="assets/img/{{$item->Product->imagpath}}" alt="" >
									</td>
									
									<td class="product-name"> 
										<a href="/single-product/{{$item -> product ->id }}">
											{{$item-> product ->name}}
										</a>
											 

									</td>

									<td class="product-price">{{$item-> Product ->price}}</td>
									<td class="product-quantity">{{$item-> quantity}}</td>
									<td class="product-total">{{number_format($item -> Product -> price * $item ->quantity ,2)}}$</td>
								</tr>
                                @endforeach 
							
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
							
							
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>{{
										
									$cartproducts -> sum(function($item){
									return $item -> product -> price * $item -> quantity;
										})
									}}$
										
									</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="{{route('checkout')}}" class="boxed-btn black"style="margin:10px">Check Out</a>
							<a href="/previousorder" class="boxed-btn black"style="margin:10px">Previous Order</a>

						</div>
					</div>
						
						</div>
					</div>
				</div>
			</div>
		</div>
</div>







@endsection