<?php 

namespace App\Mappers;

abstract class Mapper {
    /**
     * @param array
     * 
     * @return array
     */
    public function mapBatch($items) 
    {
        $out = [];

        foreach ($items as $item) {
            $out[] = $this->map($item);
        }

        return $out;
    }

    /**
     * @param array
     * 
     * @return array
     */
    public abstract function map($item);
}