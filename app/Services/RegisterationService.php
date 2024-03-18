<?php

namespace App\Services\Auth;

use App\Constants\StatusConstants;
use App\Models\User;
use App\Services\Finance\Wallet\DefaultUserWalletsService;
use App\Services\Notifications\User\AccountNotificationService;
use Illuminate\Support\Facades\Hash;

class RegisterationService
{

    public static function getNames($name)
    {
        $names = explode(" ", $name);

        if (count($names) > 1) {
            $data = [
                "first_name" => $names[0],
                "last_name" => $names[1],
            ];
        } else {
            $data = [
                "first_name" => $names[0],
                "last_name" => null,
            ];
        }
        return $data;
    }

    public static function createUser($name, $email, $password): User
    {
        $data = array_merge([
            "email" => $email,
            "password" => $password
        ], self::getNames($name));
        $data["password"] = Hash::make($data['password']);
        return User::create($data);
    }

}
