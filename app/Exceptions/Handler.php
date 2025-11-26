<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    // این آرایه شامل ورودی‌هایی است که برای استثناهای اعتبارسنجی ذخیره نمی‌شوند.
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    // این متد برای ثبت بازخوردهای مدیریت استثناها استفاده می‌شود.
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            // اینجا می‌توانید کد مدیریت استثناها را اضافه کنید.
        });
    }
}
