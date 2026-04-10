@extends('layouts.footer')

@section('content')
<div class="container" style="margin:300px ;width:auto;margin-right:700px">
    <h3 style="text-align:center">نموذج إتمام الطلب</h3>
    <form method="POST" action="{{ route('payment.callback') }}">
        @csrf

        <div class="mb-3">
            <label>الاسم</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>البريد الإلكتروني</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>رقم الهاتف</label>
            <input type="text" name="Phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>العنوان</label>
            <textarea name="Address" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>ملاحظات</label>
            <textarea name="note" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>اختر مزود الدفع</label>
            <select name="provider" class="form-control" required>
                <option value="paypal">PayPal</option>
                <option value="mollie">mollie</option>
            </select>
        </div>

        <input type="hidden" name="amount" value="20.00"> 

      <button type="submit" class="btn boxed-btn" style="  font-family: 'Poppins', sans-serif;
  display: inline-block;
  background-color: #d6a75f;
  margin-bottom: 10px;
    border-radius: 50px;
  color: #fff;
  padding: 10px 40px;
">إتمام الدفع</button>
 
        
    </form>
    <a 
			 href="{{ route('payment.cancel', ['provider' => 'paypal'])}}"
				 class="boxed-btn" style=" font-family: 'Poppins', sans-serif;
  display: inline-block;
  background-color: #d6a75f;
  margin-bottom: 5px;
    border-radius: 50px;
  color: #fff;
  padding: 10px 40px;">
                    إلغاء
          </a>
</div>
@endsection
