@extends("welcome")
@section('content')
    <div class="flex items-center">
        <div class="ml-4 text-lg leading-7 font-semibold">مرحله اول</div>
    </div>

    <div class="mr-12">
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            سلام وقتت بخیر<br>
            لطفا پروژه رو نصب کن و migration هارو به همراه seeder اجرا کن تا بتونیم ادامه بدیم.
            تو این مرحله احتیاج به اینترنت داری تا بتونی نصب رو کامل انجام بدی.<br>
            ممکنه اجرای migration زمان ببره پس تحمل کن.

            <div style="text-align: left;">
                <a class="next-lvl" href="{{ route('step2') }}">
    مرحله بعد
                </a>
            </div>
        </div>
    </div>
@endsection
