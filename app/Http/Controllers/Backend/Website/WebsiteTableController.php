<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Website\WebsiteRepository;
use App\Http\Requests\Backend\Website\ManageWebsiteRequest;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class PagesTableController.
 */
class WebsiteTableController extends Controller
{
    protected $websites;

    /**
     * @param WebsiteRepository $website
     */
    public function __construct(WebsiteRepository $website)
    {
        $this->websites = $website;
    }

    /**
     * @param ManageWebsiteRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageWebsiteRequest $request)
    {
        return Datatables::of($this->websites->getForDataTable())
            ->escapeColumns(['title'])
            ->addColumn('status', function ($page) {
                return $page->status_label;
            })
            ->addColumn('created_at', function ($page) {
                return $page->created_at->toDateString();
            })
            ->addColumn('created_by', function ($page) {
                return $page->created_by;
            })
            ->addColumn('actions', function ($page) {
                return $page->action_buttons;
            })
            ->make(true);
    }
}
