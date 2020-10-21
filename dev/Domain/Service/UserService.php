<?php


namespace Dev\Domain\Service;


use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;
use Dev\Infrastructure\Repository\UserRepository;
use Illuminate\Http\Request;

class UserService extends AbstractService
{
    /**
     * UserService constructor.
     * @param AbstractRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $filters
     * @return
     */
    public function index(array $filters = [])
    {
        return $this->repository->get();
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);

    }

}
