<?php

namespace App\Repositories;

use App\Models\User;
use App\Utils\CommonHelper;
use Illuminate\Support\Facades\Auth;

class UserRepository implements IUserRepository
{
    public function index()
    {
        return User::query()->with('user_address')
            ->where('id', '!=', Auth::id())
            ->get();
    }

    public function create()
    {

    }

    public function store($collection = [])
    {
        $image = ($collection->hasFile('image'))
            ? CommonHelper::fileUpload($collection->image, 'upload/user/image')
            : null;

        $user = User::query()->create([
            'name' => $collection->name,
            'email' => $collection->email,
            'image' => $image,
            'password' => $collection->password,
        ]);

        return $user;

    }

    public function view($id)
    {
        return User::with('user_address')->find($id);
    }

    public function Edit($id)
    {
        return User::with('user_address')->find($id);
    }

    public function update($id = null, $collection = [])
    {
        $user = User::query()->where('id', $id)->first();

        $image = ($collection->hasFile('image'))
            ? CommonHelper::fileUpload($collection->image, 'upload/user/image')
            : $user->image;

        User::query()->where('id', $id)->update([
            'name' => $collection->name,
            'email' => $collection->email,
            'image' => $image ?? $user->image,
            'password' => $collection->password,
        ]);

        return $user;
    }

    public function softDelete(User $user)
    {
        $user->delete();
    }

    public function deletedUserList()
    {
        return User::onlyTrashed()->get();
    }

    public function restoreUser($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();

        return $user;
    }
}
