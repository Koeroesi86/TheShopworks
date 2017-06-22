<?php

namespace Tests\Unit;

use App\Providers\RotaDataResultProvider;
use Tests\TestCase;

class RotaDataResultProviderTest extends TestCase
{
    /**
     * Simple test to make sure about the return object
     *
     * @return void
     */
    public function testInstance()
    {
        $rotaCollection = RotaDataResultProvider::getRotaSlotStaff();

        $this->assertInstanceOf('\App\Models\RotaCollection', $rotaCollection);
    }
    /**
     * Simple test to make sure about the return object
     *
     * @return void
     */
    public function testFullConsistency()
    {
        $rotaCollection = RotaDataResultProvider::getRotaSlotStaff();

        foreach ($rotaCollection->rotaResults as $rotaResult) {
            $this->assertInstanceOf('\App\Models\RotaResult', $rotaResult);

            foreach ($rotaResult->staffRecords as $staffRecord) {
                $this->assertInstanceOf('\App\Models\RotaResultStaff', $staffRecord);

                foreach ($staffRecord->rotaDaySlots as $rotaDaySlot) {
                    $this->assertInstanceOf('\App\Eloquent\RotaSlotStaff', $rotaDaySlot);
                }
            }
        }
    }
}
