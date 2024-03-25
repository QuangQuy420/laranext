<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Js;

class AuthService extends BaseService
{
    /**
     * Handle login.
     */
    public function login($data)
    {
        $this->formatInputData($data);

        $user = User::where('email', $data->email)->first();

        if (!$user || $data->password === $user->password) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('Token')->plainTextToken;

        return response()->json(
            [
                'message' => 'Login success!',
                'email' => $data->email,
                'token' => $token,
                'type_token' => 'Bearer'
            ],
            200
        );
    }

    // public function create($data)
    // {

    // }

    protected function formatInputData(object &$inputs): void
    {
        $password = $inputs->password;
        if (!empty($password)) {
            $inputs->password = Hash::make($password);
        }
    }
}
