<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MembersRepositoryInterface AS MembersRepository;

class SampleController extends Controller
{
    protected $Members;

    public function __construct(MembersRepository $Members) {
        $this->Members = $Members;
    }

    public function index()
    {
        # code...
    }
}
