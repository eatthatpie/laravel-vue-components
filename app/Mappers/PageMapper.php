<?php 

namespace App\Mappers;

class PageMapper extends Mapper 
{
    /**
     * @param App\Page
     * 
     * @return array
     */
    public function map($item) 
    {
        return [
            'name' => $item->name
        ];
    }
}