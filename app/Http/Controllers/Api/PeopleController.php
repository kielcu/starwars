<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Repositories\People\PeopleRepository;

class PeopleController extends Controller
{
    /**
     * @var PeopleRepository
     */
    private $peopleRepository;

    public function __construct(PeopleRepository $peopleRepository)
    {
        $this->peopleRepository = $peopleRepository;
    }

    public function index()
    {
        return response()->json($this->peopleRepository->filterIndex());
    }
}