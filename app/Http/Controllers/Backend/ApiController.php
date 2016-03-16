<?php

namespace Legacy\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Legacy\Http\Requests;
use Legacy\User;

class ApiController extends Controller
{
    protected $users;

    public function __construct(User $users)
    {
        $this->users = $users;

        parent::__construct();
    }

    public function users()
    {
        return $this->users->get();
    }

    public function storeUser(StoreUserRequest $request)
    {
        $user = $this->users->create($request->only('name','email','password'));

        flash()->success('User has been created.');

        return $user;
    }
}
