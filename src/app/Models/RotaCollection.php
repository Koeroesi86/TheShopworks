<?php

namespace App\Models;


class RotaCollection
{
    /** @var RotaResult[] */
    public $rotaResults = [];

    /**
     * @param RotaResult $rotaResult
     */
    public function addRotaResult(RotaResult $rotaResult) {
        if(!array_key_exists($rotaResult->rotaId, $this->rotaResults)) {
            $this->rotaResults[$rotaResult->rotaId] = $rotaResult;
            ksort($this->rotaResults);
        }
    }

    /**
     * @param int $rotaid
     * @return RotaResult
     */
    public function getRotaResult($rotaid) {
        return $this->rotaResults[$rotaid];
    }
}