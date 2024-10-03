@extends("welcome")
@section('content')
    <div class="flex items-center">
        <div class="ml-4 text-lg leading-7 font-semibold">مرحله چهارم</div>
    </div>

    <div class="mr-12">
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            خیلی خوبه که تا اینجا آمدی.<br>
            یادت باشه برای این مراحل راه حل های زیادی وجود داره و شما باید بهترین راه حلی که به ذهنت میرسه رو انجام بدی.<br>
            اگه با دقت دیتابیس رو نگاه کنی یک جدول میبینی به اسم user_attributes که ازت میخوام محتوای اون جدول رو در پایین صفحه نشون بدی و امکان سرچ در اون جدول داشته باشیم. بصورت ajax.<br>
            برای اینکار حتما از datatable یا یه ابزار خوب استفاده کن تا خیلی وقتتو نگیره. فقط سرچ تو ستون های جدول خیلی مهمه پس یادت نره.<br><br>

            <table>
                <thead>
                <tr>
                    <th>شماره کاربر</th>
                    <th>نام کاربر</th>
                    <th>ایمیل</th>
                    <th>موبایل</th>
                    <th>آدرس</th>
                    <th>موجودی</th>
                </tr>
                </thead>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>

            <div style="text-align:left;">
                <a class="next-lvl" href="{{ route('step5') }}">
                    مرحله بعد
                </a>
            </div>
        </div>
    </div>
@endsection
