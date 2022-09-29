<?php

namespace ACME\PageSpeed\Http\Controllers\Admin;

use ACME\PageSpeed\Services\PageSpeedService;
use ACME\PageSpeed\Http\Request\PageSpeedRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PageSpeedController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;
    protected $res;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected PageSpeedService $pageSpeedService)
    {
        $this->middleware('admin');
        $this->_config = request('_config');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view($this->_config['view']);
    }

    /**
     * @param PageSpeedRequest $pageSpeedRequest
     * @return Application|Factory|View
     */
    public function getSiteInfo(PageSpeedRequest $pageSpeedRequest): View|Factory|Application
    {
        $data = $pageSpeedRequest->validated();
        $link = $data['link'];
        $res = $this->pageSpeedService->getPageSpeedInfo($link);
        if (isset($res['error'])){
            $errorMessage = $res['error']['message'];
            return view($this->_config['view'], compact('errorMessage'));
        }
        $res = $res['lighthouseResult']['audits'];

        return view($this->_config['view'], compact('res'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view($this->_config['view']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        return view($this->_config['view']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
