<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function counts($user) {
        $count_thankings = $user->thankings()->count();
        $count_thankers = $user->thankers()->count();
        
        return [
            'count_thankings' => $count_thankings,
            'count_thankers' => $count_thankers,
        ];
    }
}
