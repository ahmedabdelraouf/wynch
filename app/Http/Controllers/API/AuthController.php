<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\ForgetPasswordRequest;
use App\Http\Requests\user\LoginRequest;
use App\Http\Requests\user\ProfileRequest;
use App\Http\Requests\user\RegisterRequest;
use App\Http\Requests\user\RegisterRequestRequest;
use App\Http\Requests\user\SendCodeRequest;
use App\Http\Requests\user\VerifyPhoneRequest;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use Dev\Domain\Service\UserService;

class AuthController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(RegisterRequest $request)
    {
        $data = $this->userService->register($request->validated());
        $returnData = new UserResource($data['user']);
        return $returnData;
    }

    public function login(LoginRequest $request)
    {
        return $this->userService->login($request->validated());
    }

    public function updateProfile(User $user, ProfileRequest $request)
    {
        return $this->userService->updateProfile($user, $request->validated());
    }

    public function profile(User $user)
    {
        return new UserResource($user);
//        return response(['user' => $user]);
    }

    public function forgetPassword(ForgetPasswordRequest $request)
    {
        return $this->userService->forgetPassword($request->validated());
    }

    public function verifyPhone(VerifyPhoneRequest $request)
    {
        return $this->userService->verifyPhone($request->validated());
    }
    public function sendCode(SendCodeRequest $request)
    {
        return $this->userService->sendCode($request->validated());
    }
}
