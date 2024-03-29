<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\UserAddress;
use App\Repositories\IUserRepository;
use App\Repositories\UserAddress\IUserAddressRepository;
use App\Utils\CommonHelper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $user;
    public $user_address;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IUserRepository $user,IUserAddressRepository $user_address)
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->user_address = $user_address;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $users = $this->user->index();

        return view('home', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserRequest $request)
    {
        try {

            $user = $this->user->store($request);

            $this->user_address->create($user->id,$request);

            $notification = array(
                'message' => 'User created successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        } catch (\Exception $ex) {
            $notification = array(
                'message' => $ex->getMessage(),
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function view($id)
    {
        $user = $this->user->view($id);

        return view('user.single_user_details', compact('user'));
    }

    public function Edit($id)
    {
        $user = $this->user->Edit($id);

        return view('user.edit', compact('user'));
    }

    public function update($id,UserRequest $request)
    {
        try {

            $this->user->update($id,$request);

            $this->user_address->create($id,$request);

            $notification = array(
                'message' => 'User updated successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        } catch (\Exception $ex) {
            $notification = array(
                'message' => $ex->getMessage(),
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function softDelete(User $user)
    {
        try {

            $this->user->softDelete($user);

            $notification = array(
                'message' => 'User Deleted successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        } catch (\Exception $ex) {
            $notification = array(
                'message' => $ex->getMessage(),
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function deletedUserList()
    {
        $deletedUsers = $this->user->deletedUserList();

        return view('user.deleted_user', compact('deletedUsers'));
    }

    public function restoreUser($id)
    {
        try {

            $this->user->restoreUser($id);

            $notification = array(
                'message' => 'User Restored successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        } catch (\Exception $ex) {
            $notification = array(
                'message' => $ex->getMessage(),
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }

    }

}
