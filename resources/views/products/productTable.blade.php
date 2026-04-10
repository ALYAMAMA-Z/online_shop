<link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/jquery.dataTables.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-MXe5EK5gyK+fbhwQy/dukwz9fw71HZcsM4KsyDBDTvMyjymkiO0M5qqU0lF4vqLI4VnKf1+DIKf1GM6RFkO8PA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/2.3.7/js/jquery.min.js"></script>

@extends('layouts.master')
@section('content')
<div class="container mt-5 mb-5">
    <div class="text-right">
	<a href="/addproducts" class="btn btn-primary mt-5 mb-5 w-25">
        <i class="fas fa-plus"></i>  
						إضافة منتج
	</a>
</div>
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>price</th>
            <th>Quantity</th>     
            <th>image</th>      
           <th>Action</th>



        </tr>
    </thead>
    <tbody>
        @foreach($products as $item)
        <tr>   

             <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->quantity}}</td>
            <td><img src="{{$item->imagpath}}" width="100" height="100"/></td>

            <td>

					<a href="/removeproduct/{{ $item -> id }}" class="btn btn-danger"><i class="fas fa-trash"></i>  
						حذف المنتج
					</a>

					<a href="/editproduct/{{ $item -> id }}" class="btn btn-success"><i class="fas fa-edit"></i>  
						تعديل المنتج
					</a>

                    	<a href="/Addproductimag/{{ $item -> id }}" class="btn btn-dark"><i class="fas fa-image"></i>  
						إضافة صور المنتج
					</a>

            </td>

        </tr>
  
        @endforeach
        
    </tbody>
</table>
</div>
@endsection
<script> 
$(document).ready( function () {
    let table = new DataTable('#myTable');
} );
</script>