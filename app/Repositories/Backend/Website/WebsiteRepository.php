<?php

namespace App\Repositories\Backend\Website;

use App\Exceptions\GeneralException;
use App\Models\Website\Website;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MenuRepository.
 */
class WebsiteRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Website::class;

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                         config('access.website_table').'.id',
                         config('access.website_table').'.website_url',
                         config('access.website_table').'.country_id',
                         config('access.website_table').'.created_at',
                         config('access.website_table').'.updated_at',
                     ]);
    }

    /**
     * @param array $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function create(array $input)
    {
        if ($this->query()->where('name', $input['name'])->first()) {
            throw new GeneralException(trans('exceptions.backend.website.already_exists'));
        }

        $input['created_by'] = access()->user()->id;

        if (Website::create($input)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.website.create_error'));
    }

    /**
     * @param \App\Models\Website\Website $website
     * @param  $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * return bool
     */
    public function update(Website $website, array $input)
    {
        if ($this->query()->where('name', $input['name'])->where('id', '!=', $website->id)->first()) {
            throw new GeneralException(trans('exceptions.backend.website.already_exists'));
        }

        $input['updated_by'] = access()->user()->id;

        if ($website->update($input)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.website.update_error'));
    }

    /**
     * @param \App\Models\Websites\Websites $website
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function delete(Website $website)
    {
        if ($website->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.website.delete_error'));
    }
}
