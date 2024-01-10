<?php

namespace App\Patterns\Repositories;

use App\Http\Resources\Countries\CountryResource;
use App\Models\Country;

/**
 * Class UserRepository.
 *
 * @package namespace App\Repositories;
 */
class CountryRepository extends BaseRepository
{
    function __construct()
    {
        $this->makeModel();
        $this->skipPresenter(false);
        $this->setPresenter(CountryResource::class);
    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Country::class;
    }
}
