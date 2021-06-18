<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = ['name_host', 'name_customer', 'price', 'service','method_payment','user_id','verify','invoice_id','due_date'];


    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public static function selectUserAddDomain()
    {

        return DB::table('domains')
            ->join('users', 'users.id', '=', 'domains.user_id')
            ->select('domains.name_host','domains.verify','domains.service','domains.name_customer', 'users.name'
                ,'domains.price','domains.method_payment','domains.created_at','domains.invoice_id','domains.due_date')
            ->orderByDesc('created_at')->get();
    }

    public static function selectDomainUser($user_id)
    {
        return DB::table('domains')
            ->where('user_id', $user_id)
            ->orderByDesc('created_at')
            ->paginate(5);
    }
}
