<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $rotaid
 * @property boolean $daynumber
 * @property integer $staffid
 * @property string $slottype
 * @property string $starttime
 * @property string $endtime
 * @property float $workhours
 * @property integer $premiumminutes
 * @property integer $roletypeid
 * @property integer $freeminutes
 * @property integer $seniorcashierminutes
 * @property string $splitshifttimes
 */
class RotaSlotStaff extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'rota_slot_staff';

    /**
     * @var array
     */
    protected $fillable = ['rotaid', 'daynumber', 'staffid', 'slottype', 'starttime', 'endtime', 'workhours', 'premiumminutes', 'roletypeid', 'freeminutes', 'seniorcashierminutes', 'splitshifttimes'];

}
