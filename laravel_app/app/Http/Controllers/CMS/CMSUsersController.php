<?php

namespace App\Http\Controllers\CMS;

use App\Http\Requests\CMSUserRequest;
use App\User;
use Illuminate\Http\Request;
use Hash;

class CMSUsersController extends CMSControlller
{
    public function __construct()
    {
        parent::__construct();
        self::$data['entity'] = 'user';
        self::$data['prop1'] = 'name';
    }
    public function index(){
        return view('cms.user.index',self::$data);
    }
    public function updateRole(User $user,Request $request){
        if($request->role_id) {
            $user->role_id = $request->role_id;
            $user->save();
        }
    }
    public function update(User $user,CMSUserRequest $request){
        $this->updateRole($user,$request);
        return $user->update($request->all())?1:0;
    }
    public function edit(User $user){
        return view('cms.user.create',self::$data + ['entityItem' => $user]);
    }
    public function create(){
        return view('cms.user.create',self::$data);
    }
    public function store(CMSUserRequest $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        if($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->back();
    }
}
