@extends('layouts.master')

@section('content')
<div style="max-width: 600px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); font-family: Arial, sans-serif;">
    <h2 style="font-size: 22px; margin-bottom: 20px; color: #2f855a;">✅ تم حفظ الفاتورة بنجاح</h2>

    <p style="margin-bottom: 20px;">
        يمكنك تحميل الفاتورة من هنا:
    </p>

        <a href="{{route('invoices.view',$invoice->id)}}"
   style="display: inline-block; background-color: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
    عرض الفاتورة (PDF)
 </a>

</div>
@endsection
