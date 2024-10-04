<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Jobs\UpdateUserCreditJob;
use App\Models\User;
use App\Models\User_Attributes;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;
use ZanySoft\Zip\Zip;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;



class IsTestController extends Controller
{
    public User $user;
    public User_Attributes $userAttributes;
    public function __construct(User $user , User_Attributes $userAttributes)
    {
        $this->user = $user;
        $this->userAttributes= $userAttributes;
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function step3()
    {

        $users = $this->userQuery();
        $sql = $users->toSql();
        $begin = microtime(true);
        $this->getUserQuery();
        $duration = microtime(true) - $begin;
        return view('step3', compact('duration', 'sql'));
    }

    public function userQuery()
    {
              return  $this->user->
                query()
                ->leftJoin('user_attributes as ua', 'ua.user_id', '=', 'users.id')
                ->select(['users.name', 'ua.attributes', 'users.email','users.id'])
                ->where('users.name', 'like', 'Dr.%')
                ->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(ua.attributes, '$.mobile')) REGEXP '\\\\+1[0-9-]+'")
                ->orderByRaw('SUBSTRING(JSON_UNQUOTE(JSON_EXTRACT(ua.attributes, \'$.mobile\')), 5, 10) DESC');
    }
    public function getUserQuery()
    {
        $users=$this->userQuery();
        // The cache will be cleared every time a user is created.
        // You can use User::created() event to clear the cache when a new user is created.
        return
            Cache::remember('user_join_key_{{$user_auth_id}}',env('CACHE_EXPIRE_TIME'),function () use ($users) {
            return $users->get();
        });
    }

    public function result()
    {
        File::delete(resource_path('result.zip'));
        $zip = Zip::create(resource_path('result.zip'), true);
        foreach (['app', 'bootstrap', 'config', 'database', 'public', 'resources', 'routes', '.env', 'composer.json', 'storage', 'tests'] as $add) $zip->add(base_path($add));
        $zip->close();
        return response()->download($zip->getZipFile());
    }
    public function step4s(Request $request)
    {

        $userAttributes = $this->userAttributes->query()->with('user')
            ->select('user_attributes.attributes', 'users.name', 'users.email', 'users.id')
            ->join('users', 'user_attributes.user_id', '=', 'users.id');


        return DataTables::of($userAttributes)
            ->addColumn('mobile', function ($row) {
                return $row->attributes['mobile'] ?? '';
            })
            ->addColumn('address', function ($row) {
                return $row->attributes['address'] ?? '';
            })
            ->addColumn('country', function ($row) {
                return $row->attributes['country'] ?? '';
            })
            ->addColumn('city', function ($row) {
                return $row->attributes['country'] ?? '';
            })
            ->addColumn('address2', function ($row) {
                return $row->attributes['address2'] ?? '';
            })
            ->addColumn('credit', function ($row) {
                return $row->attributes['credit'] ?? '';
            })
            ->make(true);
    }

    public function step5(Request   $request)
    {

        var_dump(  ( new UpdateUserCreditJob($request->input('amount',100),$request->input('filters',['country'=>'Iran'])))->handle());
        die();
        return UpdateUserCreditJob::dispatch($request->input('amount',100),$request->input('filters',['country'=>'Iran']));
    }
}
