@extends('layouts.master')
@section('content')

<div class="single-product mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="single-product-img">
                    <img style="max-height: 350px; min-height: 350px;" src="{{ asset('assets/img/' . $product->imagpath) }}" alt="photo">
                </div>
            </div>
            <div class="col-md-7">
                <div class="single-product-content">
                    <h3>{{ $product->name }}</h3>
                    <h4><span>القسم:</span> {{ $product->Category->name }}</h4>
                    <p class="single-product-pricing"><span>الكمية: {{ $product->quantity }}</span> ${{ $product->price }}</p>
                    <p>{{ $product->description }}</p>
                    <a href="/addproducttocart/{{ $product->id }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> إضافة إلى السلة</a>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            @foreach($reletedproduct as $item)
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="/single-product/{{ $item->id }}">
                            <img style="max-height: 250px; min-height: 250px;" src="{{ asset('assets/img/' . $item->imagpath) }}" alt="photo">
                        </a>
                    </div>
                    <h3>{{ $item->name }}</h3>
                    <p class="product-price"><span>Per Kg</span> {{ $item->price }} </p>
                    <a href="/addproducttocart/{{ $item->id }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> إضافة إلى السلة</a>

                    @if(auth()->check() && auth()->user()->user === 'admin')
                    <a href="/removeproduct/{{ $item->id }}" class="btn btn-danger"><i class="fas fa-trash"></i> حذف المنتج</a>
                    <a href="/editproduct/{{ $item->id }}" class="btn btn-danger"><i class="fas fa-edit"></i> تعديل المنتج</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        @if($product->productphoto->count() > 1)
        <div class="testimonail-section mt-80 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="testimonial-sliders">
                            @foreach($product->productphoto as $item)
                            <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    <img src="{{ asset('assets/img/' . $item->imagpath) }}" alt="photo">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>

@endsection
