@extends("welcome")
@section('content')
    <div class="flex items-center">
        <div class="ml-4 text-lg leading-7 font-semibold">مرحله سوم</div>
    </div>

    <div class="mr-12">
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            مرسی<br>
            این خروجی خیلی بدردمون میخوره ولی بنظر میاد تو دیتابیس یه مشکلی داریم.<br>
            ازت میخوایم یه بررسی بکنی ببینی میشه دیتا بیس رو بهینه تر کرد؟ طوری که سرعت لودش بالا تر بره. حتی اگه بشه کوئری رو هم اصولی تر نوشت و موارد اضافی رو حذف کرد.<br>
            الان برای اجرای یه کوئری ساده {{ number_format($duration, 2) }} ثانیه زمان گرفته میشه که خیلی زیاده.<br>
            فک کن این پروژه آنلاین بشه و کلی درخواست همزمان بیاد. بهتره زمانش به زیر چند میلی ثانیه کاهش پیدا کنه.

            <pre style="direction:ltr;color:#79a342;white-space:normal">{{ $sql }}</pre>

            یادت باشه تو این مرحله استفاده از migration ها خیلی مهمه برای اینکه ماهم میخوایم این تغییرات رو داشته باشیم. پس لطفا migration بهینه کردن جدول کاربران رو برامون بنویس.

            <div style="text-align: left;">
                <a class="next-lvl" href="{{ route('step4') }}">
                    مرحله بعد
                </a>
            </div>
        </div>
    </div>
@endsection
