<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class ApiTokenController extends Controller
{
    public function update(Request $request): View
    {
        $token = Str::random(60);
        $request->user()->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();
        return view('token.update')
            ->with('token', $token);
    }
}
