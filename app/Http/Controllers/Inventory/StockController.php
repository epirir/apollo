<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;

class StockController extends Controller
{
    public function index()
    {
        $pageConfigs = [
            'pageHeader' => true,
        ];

        return view('/pages/inventory/stocks/index', [
            'pageConfigs' => $pageConfigs,
        ]);
    }
}
