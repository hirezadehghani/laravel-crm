<x-admin::layouts.anonymous>
    <!-- این بخش عنوان صفحه را مشخص می‌کند. -->
    <x-slot:title>
        <!-- عنوان صفحه بازیابی رمز عبور -->
        @lang('admin::app.users.forget-password.create.page-title')
    </x-slot>

    <!-- این بخش برای نمایش فرم بازیابی رمز عبور استفاده می‌شود. -->
    <div class="flex h-[100vh] flex-col items-center justify-center gap-10">
        <div class="flex flex-col items-center gap-5">
            <!-- این بخش لوگوی برنامه را نمایش می‌دهد. -->
            @if ($logo = core()->getConfigData('general.design.admin_logo.logo_image'))
                <!-- اگر لوگو وجود داشته باشد، آن را نمایش می‌دهد. -->
                <img
                    class="h-10 w-[110px]"
                    src="{{ Storage::url($logo) }}"
                    alt="{{ config('app.name') }}"
                />
                <!-- اگر لوگو وجود نداشته باشد، از لوگوی پیش‌فرض استفاده می‌کند. -->
            @else
                <img
                    class="w-max"
                    src="{{ vite()->asset('images/logo.svg') }}"
                    alt="{{ config('app.name') }}"
                />
            @endif

            <div class="box-shadow flex min-w-[300px] flex-col rounded-md bg-white dark:bg-gray-900">
                {!! view_render_event('admin.sessions.forgor_password.form_controls.before') !!}

                <!-- این فرم برای بازیابی رمز عبور استفاده می‌شود. -->
                <x-admin::form :action="route('admin.forgot_password.store')">
                    <div class="p-4">
                        <!-- این بخش عنوان فرم را نمایش می‌دهد. -->
                        <p class="text-xl font-bold text-gray-800 dark:text-white">
                            @lang('admin::app.users.forget-password.create.title')
                        </p>
                    </div>

                    <div class="border-y p-4 dark:border-gray-800">
                        <!-- این بخش برای وارد کردن ایمیل ثبت‌شده است. -->
                        <x-admin::form.control-group>
                            <x-admin::form.control-group.label class="required">
                                @lang('admin::app.users.forget-password.create.email')
                            </x-admin::form.control-group.label>

                            <!-- این بخش کنترل ورودی ایمیل را نمایش می‌دهد. -->
                            <x-admin::form.control-group.control
                                type="email"
                                class="w-[254px] max-w-full"
                                id="email"
                                name="email"
                                rules="required|email"
                                :value="old('email')"
                                :label="trans('admin::app.users.forget-password.create.email')"
                                :placeholder="trans('admin::app.users.forget-password.create.email')"
                            />

                            <!-- این بخش خطاهای مربوط به ورودی ایمیل را نمایش می‌دهد. -->
                            <x-admin::form.control-group.error control-name="email" />
                        </x-admin::form.control-group>
                    </div>

                    <div class="flex items-center justify-between p-4">
                        <!-- لینک بازگشت به صفحه ورود -->
                        <a
                            class="cursor-pointer text-xs font-semibold leading-6 text-brandColor"
                            href="{{ route('admin.session.create') }}"
                        >
                            @lang('admin::app.users.forget-password.create.sign-in-link')
                        </a>

                        <!-- دکمه ارسال فرم بازیابی رمز عبور -->
                        <button
                            class="primary-button">
                            @lang('admin::app.users.forget-password.create.submit-btn')
                        </button>
                    </div>
                </x-admin::form>

                {!! view_render_event('admin.sessions.forgor_password.form_controls.after') !!}
            </div>
        </div>

        <!-- این بخش نشان‌دهنده قدرت گرفته از Krayin و Webkul است. -->
        <div class="text-sm font-normal">
            @lang('admin::app.components.layouts.powered-by.description', [
                'krayin' => '<a class="text-brandColor hover:underline " href="https://krayincrm.com/">Krayin</a>',
                'webkul' => '<a class="text-brandColor hover:underline " href="https://webkul.com/">Webkul</a>',
            ]) 
        </div>
    </div>
</x-admin::layouts.anonymous>
