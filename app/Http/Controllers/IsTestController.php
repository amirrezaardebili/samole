<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use ZanySoft\Zip\Zip;

class IsTestController extends Controller
{
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function step3()
    {
        $users = User::query()
            ->leftJoin('user_attributes as ua', 'ua.user_id', '=', 'users.id')
            ->where('users.name', 'like', 'Dr.%')
            ->where('ua.attributes', 'regexp', '\"mobile\"\:\"\+1[0-9-]+"')
            ->orderByRaw('substr(ua.attributes, 5, 10) desc');

        $sql = $users->toSql();

        $begin = microtime(true);
        $users->get();
        $duration = microtime(true) - $begin;

        return view('step3', compact('duration', 'sql'));
    }

    public function result()
    {
        File::delete(resource_path('result.zip'));
        $zip = Zip::create(resource_path('result.zip'), true);
        foreach (['app', 'bootstrap', 'config', 'database', 'public', 'resources', 'routes', '.env', 'composer.json', 'storage', 'tests'] as $add) $zip->add(base_path($add));
        $zip->close();
        return response()->download($zip->getZipFile());
    }
}
