<?php

namespace App\Patterns\Repositories;

use App\Http\Resources\PhoneNumbers\PhoneNumberResource;
use App\Models\PhoneNumber;

/**
 * Class UserRepository.
 *
 * @package namespace App\Repositories;
 */
class PhoneNumberRepository extends BaseRepository
{
    function __construct()
    {
        $this->makeModel();
        $this->skipPresenter(false);
        $this->setPresenter(PhoneNumberResource::class);
    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PhoneNumber::class;
    }
}
