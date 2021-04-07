<?php

class Helper{

    public static function defaultLogo(){
        return asset('frontend/images/logo.png');
    }

    public static function defaultFavicon(){
        return asset('frontend/images/favicon.jpg');
    }

    public static function userDefaultImage(){
        return asset('frontend/images/avatars/website_-_female_user-512.webp');
    }

    public static function minPrice(){
        return floor(\App\Models\Product::min('offer_price'));
    }

    public static function maxPrice(){
        return floor(\App\Models\Product::max('offer_price'));
    }

    // monthly income
    public static function getMonthlySum()
    {
        $year = \Carbon\Carbon::now()->year;
        $month = \Carbon\Carbon::now()->month;
        if ($month < 10) {
            $month = '0' . $month;
        }

        $search = $year . '-' . $month;
        $revenues = \App\Models\Order::where('created_at', 'like', $search .'%')->where('condition','delivered')->get();

        $sum = 0;
        foreach ($revenues as $revenue) {
            $sum += $revenue->total_amount;
        }


        return $sum;
    }
}

