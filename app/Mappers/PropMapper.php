<?php 

namespace App\Mappers;

class PropMapper extends Mapper 
{
    /**
     * @param array
     * 
     * @return array
     */
    public function mapBatch($items) 
    {
        $out = [];

        foreach ($items as $item) {
            $out[$item->name] = $item->value;
        }

        return $out;
    }

    /**
     * @param App\Prop
     * 
     * @return array
     */
    public function map($item) 
    {
        return [
            'name' => $item->name,
            'value' => $item->value,
            'component_id' => $item->component_id,
        ];
    }
}