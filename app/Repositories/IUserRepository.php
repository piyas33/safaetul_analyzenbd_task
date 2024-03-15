<?php

namespace App\Repositories;

use App\Models\User;

interface IUserRepository
{
    public function index();

    public function create();

    public function store($id, $collection = []);

    public function view($id);

    public function Edit($id);

    public function update($id, $collection = []);

    public function softDelete(User $user);

    public function deletedUserList();

    public function restoreUser($id);

}
