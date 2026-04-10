@extends('layouts.master')
@section('content')
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0 text-center">
                <div class="section-title mt-50 mb-50">
                    <h3><span class="orange-text">Add</span> Products</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="contact-form">
                    <form method="post" action="/storproduct" enctype="multipart/form-data">
                        @csrf
                        <p>
                            <input type="text" placeholder="Name" required style="width:100%" name="name" id="name" value="{{ old('name') }}">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </p>
                        <p style="display:flex; gap: 10px;">
                            <input type="number" placeholder="Price" style="width:50%" name="price" id="price" value="{{ old('price') }}">
                            <input type="number" placeholder="Quantity" style="width:50%" name="quantity" id="quantity" value="{{ old('quantity') }}">
                        </p>
                        <span class="text-danger">
                            @error('price')
                                {{ $message }}
                            @enderror
                            @error('quantity')
                                {{ $message }}
                            @enderror
                        </span>
                        <p>
                            <textarea name="description" id="description" cols="30" rows="10" placeholder="Description">{{ old('description') }}</textarea>
                            <span class="text-danger">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </p>
                        <p>
                            <select class="form-control" required name="category_id" id="category_id">
                                <option value="">اختر التصنيف</option>
                                @foreach($allcategories as $item)
                                    <option value="{{ $item->id }}" {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('category_id')
                                    {{ $message }}
                                @enderror
                            </span>
                        </p>
                        <p>
                            <label for="photo">صورة المنتج:</label>
                            <input type="file" name="photo" id="photo" />
                            <span class="text-danger">
                                @error('photo')
                                    {{ $message }}
                                @enderror
                            </span>
                        </p>
                        <p>
                            <input type="submit" value="Submit" class="btn btn-primary" />
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
