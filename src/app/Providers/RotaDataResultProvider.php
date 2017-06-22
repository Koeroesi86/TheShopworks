<?php

namespace App\Providers;

use App\Eloquent\RotaSlotStaff;
use App\Models\RotaCollection;
use App\Models\RotaResult;
use App\Models\RotaResultDay;
use App\Models\RotaResultStaff;
use Illuminate\Support\Collection;

class RotaDataResultProvider
{
    public static function getRotaSlotStaff() {
        $rotaQuery = RotaSlotStaff::query();
        $rotas = $rotaQuery
            ->whereNotNull('staffid')
            ->where('slottype', '=', 'shift')
            ->orderBy('rotaid', 'ASC')
            ->get()
        ;

        $rotaCollection = self::transformRotaResults($rotas);

        return $rotaCollection;
    }

    /**
     * @param RotaSlotStaff[]|Collection $rotas
     * @return RotaCollection
     */
    public static function transformRotaResults($rotas) {
        $rotaCollection = new RotaCollection();
        foreach ($rotas as $rota) {
            $rotaResult = new RotaResult();
            $rotaResult->rotaId = $rota->rotaid;
            $rotaCollection->addRotaResult($rotaResult);

            $rotaResult =  $rotaCollection->getRotaResult($rota->rotaid);

            $day = new RotaResultDay();
            $day->dayNumber = $rota->daynumber;
            $rotaResult->addDay($day);

            $staffRotaResult = new RotaResultStaff();
            $staffRotaResult->id = $rota->staffid;
            $rotaResult->addStaffRecord($staffRotaResult);
            $staffRotaResult = $rotaResult->getStaffRecord($staffRotaResult->id);

            $staffRotaResult->addRotaSlotStaff($rota);
        }

        return $rotaCollection;
    }
}