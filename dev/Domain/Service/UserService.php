<?php


namespace Dev\Domain\Service;


use App\Models\User;
use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Repository\UserRepository;

class UserService extends AbstractService
{
    /**
     * UserService constructor.
     * @param UserRepository $repository
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

    public function register(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        $data['image'] = $data['image']->store('storage/uploads/users', 'public');
        $user = $this->repository->create($data);
        $accessToken = $user->createToken('authToken')->accessToken;
        //TODO send email and phone confirmation codes
        return ['user' => $user, 'access_token' => $accessToken];
    }

    public function login(array $loginData)
    {
        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user' => auth()->user(), 'access_token' => $accessToken]);
    }

    public function updateProfile(User $user, array $validated)
    {
        $this->repository = $user;
        if ($validated['image'] != null && isset($validated['image'])) {
            $validated['image'] = $validated['image']->store('storage/uploads/users', 'public');
        } else
            $validated['image'] = $this->repository->image;

        if ($validated['name'] == null || !isset($validated['name'])) {
            $validated['name'] = $this->repository->name;
        }
        if ($validated['email'] == null || !isset($validated['email'])) {
            $validated['email'] = $this->repository->email;
        }
        if ($validated['phone'] == null || !isset($validated['phone'])) {
            $validated['phone'] = $this->repository->phone;
        }
        $this->repository->update($validated);
        return $this->repository;
    }

}
