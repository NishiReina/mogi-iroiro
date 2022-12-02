<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Http\Request;

class QrController extends Controller
{
    public function getQr()
    {   
        // $item = QrCode::url('https://laravel.com/')
        //     ->setSize(10)
        //     ->setMargin(2)
        //     ->png();
        // return $item;
        return view('qr-code');
    }
}
