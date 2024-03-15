<?php

namespace App\Repositories\UserAddress;

use App\Models\UserAddress;

class UserAddressRepository implements IUserAddressRepository
{
    public function create($user_id,$collection = [])
    {
        return UserAddress::query()->create([
            'user_id' => $user_id,
            'address' => json_encode($collection->address)
        ]);
    }
}
