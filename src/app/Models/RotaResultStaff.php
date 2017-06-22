<?php

namespace App\Models;

use App\Eloquent\RotaSlotStaff;

class RotaResultStaff
{
    /** @var integer */
    public $id;

    /** @var RotaSlotStaff[] */
    public $rotaDaySlots = [];

    /**
     * @param RotaSlotStaff $rotaSlotStaff
     */
    public function addRotaSlotStaff(RotaSlotStaff $rotaSlotStaff) {
        if(!array_key_exists($rotaSlotStaff->daynumber, $this->rotaDaySlots)) {
            $this->rotaDaySlots[$rotaSlotStaff->daynumber] = $rotaSlotStaff;
            ksort($this->rotaDaySlots);
        }
    }

    /**
     * @return array
     */
    public function getRotaSlotSummary() {
        $slots = [];
        for ($i = 0; $i <= 6; $i++) {
            $slots[$i] = (isset($this->rotaDaySlots[$i]) ? $this->rotaDaySlots[$i]->workhours : 0);
        }

        return $slots;
    }

    public function getTotalHours() {
        $hours = 0;
        foreach ($this->getRotaSlotSummary() as $summaryField) {
            $hours += $summaryField;
        }

        return $hours;
    }
}