<?php

namespace App\Repositories\UserAddress;

interface IUserAddressRepository
{
    public function create($user_id,$collection = []);

}
