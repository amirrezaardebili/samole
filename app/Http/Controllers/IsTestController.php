<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\File;
use ZanySoft\Zip\Zip;
use Illuminate\Support\Facades\Cache;

class IsTestController extends Controller
{
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function step3()
    {

        $users = $this->userQuery();
        $sql = $users->toSql();
        $begin = microtime(true);
        // The cache will be cleared every time a user is created.
        // You can use User::created() event to clear the cache when a new user is created.
       Cache::remember('user_join_key_{{$user_auth_id}}',env('CACHE_EXPIRE_TIME'),function () use ($users) {
         return $users->get();
        });
        $duration = microtime(true) - $begin;
        return view('step3', compact('duration', 'sql'));
    }

    public function userQuery()
    {

              return  User::query()
                ->leftJoin('user_attributes as ua', 'ua.user_id', '=', 'users.id')
                ->select(['users.name', 'ua.attributes', 'email'])
                ->where('users.name', 'like', 'Dr.%')
                ->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(ua.attributes, '$.mobile')) REGEXP '\\\\+1[0-9-]+'")
                ->orderByRaw('SUBSTRING(JSON_UNQUOTE(JSON_EXTRACT(ua.attributes, \'$.mobile\')), 5, 10) DESC');

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
