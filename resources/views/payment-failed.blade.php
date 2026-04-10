@extends('layouts.footer')

@section('content')
<div class="container "style="margin:200px">
    <div class="alert alert-danger">
        <h3>فشل الدفع</h3>
        <p>حدث خطأ أثناء تنفيذ عملية الدفع باستخدام المزود: {{ $provider }}</p>
    </div>

    <a href="/checkout" class="btn btn-warning">المحاولة مرة أخرى</a>
</div>
@endsection
