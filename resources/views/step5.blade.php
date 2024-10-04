@extends("welcome")
@section('content')
    <div class="flex items-center">
        <div class="ml-4 text-lg leading-7 font-semibold">مرحله پنجم</div>
    </div>

    <div class="mr-12">
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            خب، حاضری یه سطح بریم بالاتر؟<br>
            یه دیزاین پترن معروفی داریم که لینکشو برات میزارم:<br>
            <pre style="direction:ltr">https://refactoring.guru/design-patterns/chain-of-responsibility</pre>
            میخوام با توجه به امکانات لاراول از این پترن استفاده کنی و کاربرایی که کشورشون ایرانه، به اعتبارشون اضافه کنی.
            فقط حتما لینک رو مطالعه کن و با توجه به چیزی که از لینک متوجه شدی و امکانات لاراول این مورد رو پیاده کن.
            <div style="text-align:left;">
                <a href="{{ route('test2') }}" class="blue">افزایش موجودی</a>

                <a class="next-lvl" href="{{ route('step6') }}">
                    مرحله بعد
                </a>
            </div>
        </div>
    </div>
@endsection
