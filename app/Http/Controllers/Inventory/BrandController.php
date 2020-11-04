<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function index()
    {
        $pageConfigs = [
            'pageHeader' => true,
        ];

        return view('/pages/inventory/brands/index', [
            'pageConfigs' => $pageConfigs,
        ]);
    }
}
