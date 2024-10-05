@extends("welcome")

@section('content')
    <div class="flex items-center mt-8">
        <div class="ml-4 text-lg leading-7 font-semibold text-gray-800 dark:text-gray-100">مرحله چهارم</div>
    </div>

    <div class="mr-12 mt-4 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
        <p class="text-gray-600 dark:text-gray-400 text-sm">
            خیلی خوبه که تا اینجا آمدی.<br>
            یادت باشه برای این مراحل راه حل‌های زیادی وجود داره و شما باید بهترین راه‌حلی که به ذهنت می‌رسه رو انجام بدی.<br>
            اگه با دقت دیتابیس رو نگاه کنی، یک جدول می‌بینی به اسم user_attributes که ازت می‌خوام محتوای اون جدول رو در پایین صفحه نشون بدی و امکان سرچ در اون جدول داشته باشیم. بصورت ajax.<br>
            برای اینکار حتما از datatable یا یه ابزار خوب استفاده کن تا خیلی وقتتو نگیره. فقط سرچ تو ستون‌های جدول خیلی مهمه پس یادت نره.<br><br>
        </p>

        <table id="userTable" class="min-w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 rounded-lg shadow-md mt-4">
            <thead>
            <tr class="bg-gray-700 text-white text-center">
                <th class="py-2 px-4 border border-gray-300">شماره کاربر</th>
                <th class="py-2 px-4 border border-gray-300">نام کاربر</th>
                <th class="py-2 px-4 border border-gray-300">ایمیل</th>
                <th class="py-2 px-4 border border-gray-300">موبایل</th>
                <th class="py-2 px-4 border border-gray-300">آدرس</th>
                <th class="py-2 px-4 border border-gray-300">موجودی</th>
            </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-300">
            <!-- DataTables به‌طور خودکار داده‌ها را بارگذاری می‌کند -->
            </tbody>
        </table>

        <div class="text-left mt-4">
            <a class="next-lvl inline-block border border-gray-300 bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-100 py-2 px-4 rounded hover:bg-gray-300 dark:hover:bg-gray-700" href="{{ route('step5') }}">
                مرحله بعد
            </a>
        </div>
    </div>

    <!-- لینک‌های CSS و JavaScript -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('test') }}",
                    type: "GET"
                },
                paging: true,
                pageLength: 10,
                lengthChange: true,
                searching: true,
                ordering: true,
                pagingType: "full_numbers",
                language: {
                    "search": "جستجو:",
                    "lengthMenu": "نمایش _MENU_ ردیف",
                    "info": "نمایش _START_ تا _END_ از _TOTAL_ ردیف",
                    "infoEmpty": "هیچ داده‌ای موجود نیست",
                    "paginate": {
                        "first": "اولین",
                        "last": "آخرین",
                        "next": "بعدی",
                        "previous": "قبلی"
                    },
                    "emptyTable": "داده‌ای برای نمایش موجود نیست"
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'mobile', name: 'mobile' },
                    { data: 'address', name: 'address' },
                    { data: 'credit', name: 'credit' }
                ]
            });
        });
    </script>
@endsection
