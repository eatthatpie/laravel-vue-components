<?php 

namespace App\Mappers;

class ComponentMapper extends Mapper 
{
    /**
     * @var App\Mappers\PropMapper
     */
    protected $propMapper;

    /**
     * @param App\Mappers\PropMapper
     */
    public function __construct(PropMapper $propMapper)
    {
        $this->propMapper = $propMapper;
    }

    /**
     * @param App\Component
     * 
     * @return array
     */
    public function map($item) 
    {
        return [
            'name' => $item->name,
            'codename' => $item->codename,
            'props' => $this->propMapper->mapBatch($item->props)
        ];
    }
}