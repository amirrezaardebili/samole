<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_Attributes extends Model
{
    use HasFactory;
    protected $table = "user_attributes";
    protected $fillable = ['user_id', 'attributes'];
    protected $casts = ['attributes' => 'array'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function  updateCredit(int $amount, array $filters)
    {
        return $this->query()
            ->when(!empty($filters), function ($query) use ($filters) {
                foreach ($filters as $key => $value) {
                    $query->whereJsonContains("attributes->$key", $value);
                }
            })
            ->update([
                'attributes' => DB::raw("json_set(attributes, '$.credit', IFNULL(json_extract(attributes, '$.credit'), 0) + {$amount})")
            ]);
    }



}
