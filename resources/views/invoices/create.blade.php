@extends('layouts.app')

@section('content')
<div class="container">
    <h3>إنشاء فاتورة جديدة</h3>

    <form action="{{ route('storepdf') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>عنوان الفاتورة</label>
            <input type="text" name="title" class="form-control" />
        </div>

        <div class="form-group">
            <label>المبلغ</label>
            <input type="number" name="amount" step="0.01" class="form-control" required />
        </div>

        <div class="form-group">
            <label>التصنيف</label>
            <select name="invoice_category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>تاريخ الفاتورة</label>
            <input type="date" name="invoice_date" class="form-control" />
        </div>

        <div class="form-group">
            <label>ملف الفاتورة (PDF فقط)</label>
            <input type="file" name="file" accept="application/pdf" class="form-control" required />
        </div>

        <button type="submit" class="btn btn-primary mt-3">حفظ</button>
    </form>
</div>
@endsection
