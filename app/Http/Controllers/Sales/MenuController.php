<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $pageConfigs = [
            'pageHeader' => true
        ];

        return view('/pages/sales/menu', [
            'pageConfigs' => $pageConfigs
        ]);
    }
}
