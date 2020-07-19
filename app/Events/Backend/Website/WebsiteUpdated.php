<?php

namespace App\Events\Backend\Website;

use Illuminate\Queue\SerializesModels;

/**
 * Class BlogUpdated.
 */
class WebsiteUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $websites;

    /**
     * @param $websites
     */
    public function __construct($websites)
    {
        $this->websites = $websites;
    }
}
