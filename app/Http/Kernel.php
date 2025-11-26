<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * پشته میان‌افزارهای HTTP جهانی برنامه.
     *
     * این آرایه شامل لیستی از میان‌افزارها است که در طول هر درخواست به برنامه اجرا می‌شوند.
     *
     * @var array
     */
    protected $middleware = [
        // این میان‌افزار برای اعتماد به میزبان‌ها استفاده می‌شود.
        // \App\Http\Middleware\TrustHosts::class,

        // این میان‌افزار برای اعتماد به پروکسی‌ها استفاده می‌شود.
        \App\Http\Middleware\TrustProxies::class,

        // این میان‌افزار برای مدیریت درخواست‌های CORS استفاده می‌شود.
        \Illuminate\Http\Middleware\HandleCors::class,

        // این میان‌افزار برای جلوگیری از درخواست‌ها در زمان نگهداری استفاده می‌شود.
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,

        // این میان‌افزار برای اعتبارسنجی اندازه پست‌ها استفاده می‌شود.
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,

        // این میان‌افزار برای حذف فضای خالی از رشته‌ها استفاده می‌شود.
        \App\Http\Middleware\TrimStrings::class,

        // این میان‌افزار برای نصب برنامه استفاده می‌شود.
        \Webkul\Installer\Http\Middleware\CanInstall::class,
    ];

    /**
     * گروه‌های میان‌افزارهای مسیریابی برنامه.
     *
     * این آرایه شامل گروه‌هایی از میان‌افزارها است که برای مسیریابی استفاده می‌شوند.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            // این میان‌افزار برای رمزگذاری کوکی‌ها استفاده می‌شود.
            \App\Http\Middleware\EncryptCookies::class,

            // این میان‌افزار برای افزودن کوکی‌های صف به پاسخ استفاده می‌شود.
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,

            // این میان‌افزار برای شروع جلسه استفاده می‌شود.
            \Illuminate\Session\Middleware\StartSession::class,

            // این میان‌افزار برای اشتراک‌گذاری خطاها از جلسه استفاده می‌شود.
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,

            // این میان‌افزار برای اعتبارسنجی توکن CSRF استفاده می‌شود.
            \App\Http\Middleware\VerifyCsrfToken::class,

            // این میان‌افزار برای جایگزینی بایندینگ‌ها استفاده می‌شود.
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth'             => \App\Http\Middleware\Authenticate::class,
        'auth.basic'       => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers'    => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can'              => \Illuminate\Auth\Middleware\Authorize::class,
        'guest'            => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed'           => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle'         => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified'         => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    ];
}
