<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>فاتورة الطلب #{{ $order_id }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; direction: rtl; }
        .invoice-box { padding: 30px; border: 1px solid #eee; }
        table { width: 100%; line-height: inherit; text-align: right; }
        table td { padding: 5px; vertical-align: top; }
        .total { font-weight: bold; }
    </style>
</head>
<body>
    <div class="invoice-box">
        <h2>فاتورة الطلب</h2>
        <p><strong>رقم الطلب:</strong> {{ $order_id }}</p>
        <p><strong>العميل:</strong> {{ $customer_name }}</p>
        <p><strong>البريد الإلكتروني:</strong> {{ $customer_email }}</p>

        <hr>

        <table>
            <thead>
                <tr>
                    <th>المنتج</th>
                    <th>الكمية</th>
                    <th>السعر</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['qty'] }}</td>
                        <td>{{ number_format($item['price'], 2) }} ريال</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2" class="total">المجموع الكلي:</td>
                    <td class="total">{{ number_format($total, 2) }} ريال</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
