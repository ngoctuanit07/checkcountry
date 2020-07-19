<?php

namespace App\Repositories\Backend\Websites;

use App\Exceptions\GeneralException;
use App\Models\Websites\Website;
use App\Repositories\BaseRepository;
use DB;

/**
 * Class WebsiteRepository.
 */
class WebsiteRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Website::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select(
                [
                    config('module.websites.table') . '.id',
                    config('module.websites.table') . '.website_url',
                    config('module.websites.table') . '.country_id',
                    config('module.websites.table') . '.created_at',
                    config('module.websites.table') . '.updated_at',
                ]
            );
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @return bool
     * @throws GeneralException
     */
    public function create(array $input)
    {
        if (Website::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.websites.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Website $website
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Website $website, array $input)
    {
        if ($website->update($input)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.websites.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Website $website
     * @return bool
     * @throws GeneralException
     */
    public function delete(Website $website)
    {
        if ($website->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.websites.delete_error'));
    }
}
