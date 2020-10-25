<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RewardRequest;
use App\Models\Reward;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    public function store(RewardRequest $request)
    {
        $data = $request->all();
        $reward = Reward::create($data);
    }
}
