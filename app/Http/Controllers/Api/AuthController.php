<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Http\Resources\AuthenticatedUserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class AuthController extends Controller
{
    public function __invoke(AuthRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return Response::json([], 401);
        }

        $user = User::where('email', $request->validated('email'))->firstOrFail();
        $user->tokens()->delete();
        $user->createToken('auth-token');

        return new AuthenticatedUserResource($user);
    }
}
