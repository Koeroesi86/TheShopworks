<?php

namespace App\Models;


class RotaResult
{
    /** @var integer */
    public $rotaId;

    /** @var RotaResultDay[] */
    private $days = [];

    /** @var RotaResultStaff[] */
    public $staffRecords = [];

    /**
     * @param RotaResultDay $day
     */
    public function addDay(RotaResultDay $day) {
        if(!array_key_exists($day->dayNumber, $this->days)) {
            $this->days[$day->dayNumber] = $day;
            ksort($this->days);
        }
    }

    /**
     * @param RotaResultStaff $rotaResultDayStaff
     */
    public function addStaffRecord(RotaResultStaff $rotaResultDayStaff) {
        if(!array_key_exists($rotaResultDayStaff->id, $this->staffRecords)) {
            $this->staffRecords[$rotaResultDayStaff->id] = $rotaResultDayStaff;
            ksort($this->staffRecords);
        }
    }

    /**
     * @param int $id
     * @return RotaResultStaff
     */
    public function getStaffRecord($id) {
        return $this->staffRecords[$id];
    }

    /**
     * @param int $daynumber
     * @return RotaResultDay
     */
    public function getDay($daynumber) {
        return $this->days[$daynumber];
    }

    /**
     * @return RotaResultDay[]
     */
    public function getDays()
    {
        return $this->days;
    }
}