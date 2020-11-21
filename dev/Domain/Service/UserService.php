<?php


namespace Dev\Domain\Service;


use App\Models\User;
use Dev\Application\Utility\UserType;
use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Repository\UserRepository;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class UserService extends AbstractService
{
    private $driverService;

    /**
     * UserService constructor.
     * @param UserRepository $repository
     * @param DriverService $driverService
     */
    public function __construct(UserRepository $repository, DriverService $driverService)
    {
        parent::__construct($repository);
        $this->driverService = $driverService;
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
        if (isset($data['image']) && $data['image'] != null)
            $data['image'] = $data['image']->store('storage/uploads/users', 'public');
        $data['phone_code'] = generateCode();
        $user = $this->repository->create($data);
        sendMessage([$user->phone], 'Please use this code to activate your account ' . $user->phone_code, 1);
        $accessToken = $user->createToken('authToken')->accessToken;
        if ($user->type == UserType::DRIVER) {
            $data['user_id'] = $user->id;
            $info = \Arr::only($data, ['user_id', 'national_id', 'drug_test', 'driving_licence', 'car_licence']);
            $this->driverService->store($info);
        }
        return ['user' => $user, 'access_token' => $accessToken];
    }

    /**
     * @param array $loginData
     * @return ResponseFactory|Response
     */
    public function login(array $loginData)
    {
        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid username or password'], 403);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user' => auth()->user(), 'access_token' => $accessToken]);
    }

    /**
     * @param User $user
     * @param array $validated
     * @return User|\Dev\Infrastructure\Repository\Abstracts\AbstractRepository
     */
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


    /**
     * @param array $data
     * @return ResponseFactory|Response
     */
    public function verifyPhone(array $data)
    {
        $user = $this->repository->where('phone', $data['phone'])->first();
        if ($user->phone_code == $data['code']) {
            $user->phone_verified_at = date("m/d/Y h:i:s", time());
            $user->save();
            return response(['message' => 'account activated successfully']);
        }
        return response(['message' => 'Invalid code'], 400);
    }

    /**
     * @param array $data
     * @return ResponseFactory|Response
     */
    public function forgetPassword(array $data)
    {
        $user = $this->repository->where('phone', $data['phone'])->first();
        if (isset($user))
            if ($user->phone_code == $data['code']) {
                $user->password = bcrypt($data['password']);
                $user->save();
                return response(['message' => 'Password updated successfully']);
            }
        return response(['message' => 'Invalid Phone number or code'], 400);
    }

    public function sendCode(array $data)
    {
        $user = $this->repository->where('phone', $data['phone'])->first();
        if (isset($user)) {
            $user->phone_code = 123456;
//            $user->phone_code = generateCode();
            $user->save();
            return response(['message' => 'Message sent successfully.']);
        }
        return response(['message' => 'Invalid Phone number.'], 400);
    }
}
