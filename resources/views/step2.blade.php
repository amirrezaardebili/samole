@extends("welcome")
@section('content')
    <div class="flex items-center">
        <div class="ml-4 text-lg leading-7 font-semibold">مرحله دوم</div>
    </div>

    <div class="mr-12">
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            خب حالا که پروژه رو نصب کردی باید تو دیتابیس چند هزارتا کاربر داشته باشیم. اگه نداریم قطعا یه جای کارت ایراد داشته.<br>
            ازت میخوایم که با کلیک کردن روی لینک
            <a href="{{ route('export') }}" class="blue">خروجی اکسل</a>
            تمام کاربران رو ازشون خروجی بگیری.<br>
            یادت باشه در این مرحله پیدا کردن یک پکیچ معتبر مد نظره که قابلیت اطمینان داشته باشه و البته نحوه کد نویسی شما هم مهمه
            که باید تمیز و با استفاده از قوائد solid باشه.

            <div style="text-align: left;">
                <a class="next-lvl" href="{{ route('step3') }}">
                    مرحله بعد
                </a>
            </div>
        </div>
    </div>
@endsection
