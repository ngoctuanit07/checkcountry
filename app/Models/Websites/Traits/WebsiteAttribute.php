<?php

namespace App\Models\Websites\Traits;

/**
 * Class WebsiteAttribute.
 */
trait WebsiteAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-website", "admin.websites.edit").'
                '.$this->getDeleteButtonAttribute("delete-website", "admin.websites.destroy").'
                </div>';
    }
}
