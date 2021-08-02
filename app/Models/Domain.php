<?php

namespace App\Models;

use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = ['name_host', 'name_customer', 'price', 'service', 'method_payment', 'user_id', 'verify', 'invoice_id', 'due_date', 'type'];


    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public static function selectUserAddDomain()
    {

        return DB::table('domains')
            ->join('users', 'users.id', '=', 'domains.user_id')
            ->select('domains.name_host', 'domains.verify', 'domains.service', 'domains.name_customer', 'users.name'
                , 'domains.price', 'domains.method_payment', 'domains.created_at', 'domains.invoice_id', 'domains.due_date', 'domains.type')
            ->orderByDesc('created_at')->get();
    }

    public static function selectDomainUser($user_id)
    {
        return DB::table('domains')
            ->where('user_id', $user_id)
            ->orderByDesc('created_at')
            ->get();
    }

    public static function selectStarterDomain()
    {
        return DB::table('domains')
            ->join('users', 'users.id', '=', 'domains.user_id')
            ->select('domains.name_host', 'domains.verify', 'domains.service', 'domains.name_customer', 'users.name'
                , 'domains.price', 'domains.method_payment', 'domains.created_at', 'domains.invoice_id', 'domains.due_date', 'domains.type')
                ->where('domains.type', 'STARTER')
            ->orderByDesc('created_at')
            ->get();
    }

    public static function selectBusinessDomain()
    {
        return DB::table('domains')
            ->join('users', 'users.id', '=', 'domains.user_id')
            ->select('domains.name_host', 'domains.verify', 'domains.service', 'domains.name_customer', 'users.name'
                , 'domains.price', 'domains.method_payment', 'domains.created_at', 'domains.invoice_id', 'domains.due_date', 'domains.type')
                ->where('domains.type', 'BUSINESS')
            ->orderByDesc('created_at')
            ->get();
    }

    public static function selectPremiumDomain()
    {
        return DB::table('domains')
            ->join('users', 'users.id', '=', 'domains.user_id')
            ->select('domains.name_host', 'domains.verify', 'domains.service', 'domains.name_customer', 'users.name'
                , 'domains.price', 'domains.method_payment', 'domains.created_at', 'domains.invoice_id', 'domains.due_date', 'domains.type')
                ->where('domains.type', 'PREMIUM')
            ->orderByDesc('created_at')
            ->get();
    }

    public static function selectUltimateDomain()
    {
        return DB::table('domains')
            ->join('users', 'users.id', '=', 'domains.user_id')
            ->select('domains.name_host', 'domains.verify', 'domains.service', 'domains.name_customer', 'users.name'
                , 'domains.price', 'domains.method_payment', 'domains.created_at', 'domains.invoice_id', 'domains.due_date', 'domains.type')
                ->where('domains.type', 'ULTIMATE')
            ->orderByDesc('created_at')
            ->get();
    }

    public static function selectCountDomain()
    {
        return DB::table('domains')
            ->join('users', 'users.id', '=', 'domains.user_id')
            ->select('domains.name_host', 'domains.verify', 'domains.service', 'domains.name_customer', 'users.name'
                , 'domains.price', 'domains.method_payment', 'domains.created_at', 'domains.invoice_id', 'domains.due_date', 'domains.type')
                ->where('domains.type', 'ULTIMATE')
            ->orderByDesc('created_at')
            ->get();
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

        if($sale_of_last_month == 0){
            return $sale_of_last_month = 0;
        }

        return ($sale_of_last_month - $sale_of_current_month) / $sale_of_last_month;
    }

    public static function domain_verify()
    {
        return Domain::all()->where('verify', true);
    }

    public static function domainDistinct()
    {
        return DB::table('domains')
                ->distinct('name_host')
                ->count('name_host');
    }

    public static function userDistinct()
    {
        return DB::table('users')
                ->distinct('email')
                ->count('email');
    }

    public static function domain_not_verify()
    {
        return Domain::all()->where('verify', false);
    }

    public static function findByTypeAndMonth(string $type, DateTime $date)
    {
        $next = clone $date;
        $next->modify("-1 seconds")->modify("+1 month")->modify('last day of this month');
        return Domain::where("service", "=", $type)
            ->whereDate("created_at", ">", $date)
            ->whereDate("created_at", "<=", $next)
            ->orderBy("created_at")
            ->get();
    }

}
