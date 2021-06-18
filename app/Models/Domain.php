<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = ['name_host', 'name_customer', 'price', 'service', 'method_payment', 'user_id', 'verify', 'invoice_id', 'due_date'];


    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public static function selectUserAddDomain()
    {

        return DB::table('domains')
            ->join('users', 'users.id', '=', 'domains.user_id')
            ->select('domains.name_host', 'domains.verify', 'domains.service', 'domains.name_customer', 'users.name'
                , 'domains.price', 'domains.method_payment', 'domains.created_at', 'domains.invoice_id', 'domains.due_date')
            ->orderByDesc('created_at')->get();
    }

    public static function selectDomainUser($user_id)
    {
        return DB::table('domains')
            ->where('user_id', $user_id)
            ->orderByDesc('created_at')
            ->paginate(5);
    }

    public static function sale_of_last_month()
    {
        $sales = DB::table('domains')
            ->whereMonth('created_at', '=', now()->subMonth())
            ->whereYear('created_at', now()->year)
            ->get();

        $total_sale = 0;

        foreach ($sales as $sale) {
            $total_sale += $sale->price;
        }

        return $total_sale;
    }

    public static function sale_of_current_month()
    {
        $sales = DB::table('domains')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->get();

        $total_sale = 0;

        foreach ($sales as $sale) {
            $total_sale += $sale->price;
        }

        return $total_sale;
    }

    public static function percent_of_sale()
    {
        $sale_of_current_month = self::sale_of_current_month();
        $sale_of_last_month = self::sale_of_last_month();

        return ($sale_of_last_month - $sale_of_current_month) / $sale_of_last_month;
    }

    public static function domain_verify()
    {
        return Domain::all()->where('verify', true);
    }

    public static function domain_not_verify()
    {
        return Domain::all()->where('verify', false);
    }

}
