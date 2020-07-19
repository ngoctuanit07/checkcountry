<?php

namespace App\Http\Controllers\Backend\Websites;

use App\Models\Websites\Website;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Websites\CreateResponse;
use App\Http\Responses\Backend\Websites\EditResponse;
use App\Repositories\Backend\Websites\WebsiteRepository;
use App\Http\Requests\Backend\Websites\ManageWebsiteRequest;
use App\Http\Requests\Backend\Websites\CreateWebsiteRequest;
use App\Http\Requests\Backend\Websites\StoreWebsiteRequest;
use App\Http\Requests\Backend\Websites\EditWebsiteRequest;
use App\Http\Requests\Backend\Websites\UpdateWebsiteRequest;
use App\Http\Requests\Backend\Websites\DeleteWebsiteRequest;

/**
 * WebsitesController
 */
class WebsitesController extends Controller
{
    /**
     * variable to store the repository object
     * @var WebsiteRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param WebsiteRepository $repository;
     */
    public function __construct(WebsiteRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Websites\ManageWebsiteRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageWebsiteRequest $request)
    {
        return new ViewResponse('backend.websites.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateWebsiteRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Websites\CreateResponse
     */
    public function create(CreateWebsiteRequest $request)
    {
        return new CreateResponse('backend.websites.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreWebsiteRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreWebsiteRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.websites.index'), ['flash_success' => trans('alerts.backend.websites.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Websites\Website  $website
     * @param  EditWebsiteRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Websites\EditResponse
     */
    public function edit(Website $website, EditWebsiteRequest $request)
    {
        return new EditResponse($website);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateWebsiteRequestNamespace  $request
     * @param  App\Models\Websites\Website  $website
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateWebsiteRequest $request, Website $website)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $website, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.websites.index'), ['flash_success' => trans('alerts.backend.websites.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteWebsiteRequestNamespace  $request
     * @param  App\Models\Websites\Website  $website
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Website $website, DeleteWebsiteRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($website);
        //returning with successfull message
        return new RedirectResponse(route('admin.websites.index'), ['flash_success' => trans('alerts.backend.websites.deleted')]);
    }
    
}
