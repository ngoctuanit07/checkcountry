<?php

namespace App\Http\Responses\Backend\Websites;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Websites\Website
     */
    protected $website;

    /**
     * @param App\Models\Websites\Website $websites
     */
    public function __construct($websites)
    {
        $this->website = $websites;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.websites.edit')->with([
            'website' => $this->website
        ]);
    }
}