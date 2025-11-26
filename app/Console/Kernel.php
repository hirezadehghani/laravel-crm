<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    // این متد برای تعریف زمان‌بندی دستورات برنامه استفاده می‌شود.
    // ایجاد یک تابع schedule برای زمان‌بندی دستورات که ورودی از نوع Schedule می‌گیرد. و خروجی آن void است.
    protected function schedule(Schedule $schedule): void
    {
        // این دستور هر پنج دقیقه اجرا می‌شود و با دسترسی به command `inbound-emails:process`، ایمیل‌های ورودی را پردازش می‌کند.
        $schedule->command('inbound-emails:process')->everyFiveMinutes();
    }

    // این متد برای ثبت دستورات برنامه استفاده می‌شود.
    // دستورات موجود در مسیر Commands بارگذاری می‌شوند و فایل console.php نیز شامل می‌شود.
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
