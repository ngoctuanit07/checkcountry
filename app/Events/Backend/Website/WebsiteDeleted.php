<?php

namespace App\Events\Backend\Website;

use Illuminate\Queue\SerializesModels;

/**
 * Class BlogDeleted.
 */
class WebsiteDeleted
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
