<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\ProfileRequest;
use App\Http\Requests\user\RegisterRequest;
use App\Http\Requests\user\RegisterRequestRequest;
use App\Http\Requests\user\LoginRequest;
use App\Models\User;
use Dev\Domain\Service\UserService;
use Symfony\Component\HttpKernel\Profiler\Profile;

class AuthController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(RegisterRequest $request)
    {
        return $this->userService->register($request->validated());
    }

    public function login(LoginRequest $request)
    {
        return $this->userService->login($request->validated());
    }

    public function updateProfile(User $user,ProfileRequest $request)
    {
        return $this->userService->updateProfile($user,$request->validated());
    }

    public function profile(User $user)
    {
        return response(['user' => $user]);
    }

    public function forgetPassword(LoginRequest $request)
    {
        return $this->userService->forgetPassword($request);
    }

    public function verifyPhone(LoginRequest $request)
    {
        return $this->userService->verifyPhone($request);
    }
}
