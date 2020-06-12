<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        $pageConfigs = [
            'pageHeader' => false
        ];

        return view('/pages/dashboard', [
            'pageConfigs' => $pageConfigs
        ]);
    }
}
