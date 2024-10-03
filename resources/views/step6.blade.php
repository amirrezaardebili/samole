@extends("welcome")
@section('content')
    <div class="flex items-center">
        <div class="ml-4 text-lg leading-7 font-semibold">مرحله ششم</div>
    </div>

    <div class="mr-12">
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            خسته نباشی!
            دیگه بقیش ایشاا.. برای بعدا<br>
            حالا که تا اینجا آمدی بنظر خود چقدر به php و لاراول تسلط داری؟<br>
            فقط زحمتت روی لینک زیر کلیک کن و خروجی رو برامون بفرست. ما نتیجه رو بررسی میکنیم و بهت اطلاع میدیم. فقط اگه لازمه برگرد و موارد رو با دقت و تمرکز بیشتری انجام بده.
            کوچکترین نکته ای تو تمیزی کد و استفاده از بهترین پترن برامون اهمیت داره.

            <div style="text-align:left;">
                <a class="next-lvl" href="{{ route('result') }}">
                    دانلود پروژه
                </a>
            </div>
        </div>
    </div>
@endsection
