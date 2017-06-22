<?php

namespace App\Http\Controllers;

use App\Eloquent\RotaSlotStaff;
use App\Providers\RotaDataResultProvider;

class DefaultController extends Controller
{
    public function index()
    {
        $rotaCollection = RotaDataResultProvider::getRotaSlotStaff();

        return view('rota_slot_staff', [
            'rotaCollection' => $rotaCollection,
            'days' => [
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
                'Saturday',
                'Sunday'
            ]
        ]);
    }
}