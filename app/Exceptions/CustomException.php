<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    // يمكنك تخصيص هذه الدالة لمعالجة الاستثناء بطريقة معينة
    public function report()
    {
        // يمكنك هنا تسجيل الاستثناء في السجلات أو إرسال إشعارات
    }

    public function render($request)
    {
        // يمكنك تخصيص كيفية عرض الاستثناء للمستخدم
        return response()->view('errors.custom', [], 500);
    }
}
