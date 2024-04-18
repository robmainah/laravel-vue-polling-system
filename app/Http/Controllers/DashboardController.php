<?php

namespace App\Http\Controllers;

use App\Repositories\PollRepository;

class DashboardController extends Controller
{
    public function __construct(public readonly PollRepository $pollRepository)
    {
    }

    public function index(): \Inertia\Response
    {
        return inertia('Dashboard', ['polls' => $this->pollRepository->totalCount(auth()->user())]);
    }
}
