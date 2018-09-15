<?php

namespace App\Http\Controllers;

use App\Component;
use App\Mappers\ComponentMapper;
use App\Page;
use App\Traits\RespondTrait;
use Illuminate\Http\Request;

class ComponentsController extends Controller
{
    use RespondTrait;

    /**
     * @var App\Mappers\ComponentMapper
     */
    protected $componentMapper;

    /**
     * @param App\Mappers\ComponentMapper
     */
    public function __construct(ComponentMapper $componentMapper)
    {
        $this->componentMapper = $componentMapper;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Page $page)
    {
        return $this->setStatus(200)->respond([
            'data' => $this->componentMapper->mapBatch($page->components)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
