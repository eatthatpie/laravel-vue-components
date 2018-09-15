<?php

namespace App\Http\Controllers;

use App\Mappers\PageMapper;
use App\Page;
use App\Traits\RespondTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PagesController extends Controller
{
    use RespondTrait;

    /**
     * @var App\Mappers\PageMapper
     */
    protected $pageMapper;

    /**
     * @param App\Mappers\PageMapper
     */
    public function __construct(PageMapper $pageMapper) 
    {
        $this->pageMapper = $pageMapper;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Illuminate\Http\Request
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->query('limit') ? $request->query('limit') : 5;
        $pages = Page::paginate($limit);

        return $this->setStatus(200)->respond([
            'data' => $this->pageMapper->mapBatch($pages->all()),
            'nav' => [
                'count' => $pages->count(),
                'total' => $pages->total(),
                'last_page' => $pages->lastPage(),
                'current_page' => $pages->currentPage(),
                'next_page_url' => $pages->nextPageUrl(),
                'previous_page_url' => $pages->previousPageUrl()
            ]
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
        if (!$request->name) {
            return $this->setStatus(422)->respondUnprocessableEntity();
        }

        Page::create([
            'name' => $request->name
        ]);

        return $this->setStatus(201)->respondSuccessfullyCreated();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::find($id);

        if (!$page) {
            return $this->setStatus(404)->respondNotFound();
        }

        return $this->setStatus(200)->respond([
            'data' => $this->pageMapper->map($page)
        ]);
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
