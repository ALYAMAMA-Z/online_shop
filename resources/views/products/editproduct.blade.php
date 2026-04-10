@extends('layouts.master')
@section('content')

<div class="product-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title mt-50 mb-50">	
					<h3><span class="orange-text">تعديل</span> المنتج</h3>
				</div>

				<div class="contact-form">
					<form method="POST" action="{{ route('product.update') }}" enctype="multipart/form-data">
						@csrf
						
						{{-- ID المخفي --}}
						<input type="hidden" name="id" value="{{ $product->id }}">

						{{-- الاسم --}}
						<p>
							<input type="text" placeholder="الاسم" name="name" value="{{ old('name', $product->name) }}" style="width:100%">
							<span class="text-danger">@error('name') {{ $message }} @enderror</span>
						</p>

						{{-- السعر والكمية --}}
						<p style="display: flex; gap: 10px;">
							<input type="number" placeholder="السعر" name="price" value="{{ old('price', $product->price) }}" style="width: 50%;">
							<input type="number" placeholder="الكمية" name="quantity" value="{{ old('quantity', $product->quantity) }}" style="width: 50%;">
						</p>
						<span class="text-danger">@error('price') {{ $message }} @enderror</span><br>
						<span class="text-danger">@error('quantity') {{ $message }} @enderror</span>

						{{-- الوصف --}}
						<p>
							<textarea name="description" placeholder="الوصف" rows="5" style="width:100%">{{ old('description', $product->description) }}</textarea>
							<span class="text-danger">@error('description') {{ $message }} @enderror</span>
						</p>

						{{-- التصنيف --}}
						<p>
							<select name="category_id" class="form-control" required>
								@foreach($allcategories as $item)
									<option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected' : '' }}>
										{{ $item->name }}
									</option>
								@endforeach
							</select>
							<span class="text-danger">@error('category_id') {{ $message }} @enderror</span>
						</p>

						{{-- صورة المنتج --}}
						<p>
							<label>تحديث الصورة:</label>
							<input type="file" name="photo" class="form-control">
							<span class="text-danger">@error('photo') {{ $message }} @enderror</span>
						</p>

						{{-- عرض الصورة الحالية --}}
						@if($product->imagpath)
							<p>
								<img src="{{ asset('assets/img/' . $product->imagpath) }}" width="200" height="200" alt="صورة المنتج الحالية">
							</p>
						@endif

						{{-- زر الإرسال --}}
						<p>
							<input type="submit" value="تحديث المنتج" class="btn btn-primary">
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
