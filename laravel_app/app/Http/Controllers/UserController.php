<?php

namespace App\Http\Controllers;

use App\{
    Http\Requests\UpdateUserInfoRequest, OrderList, User, UserInfo
};
use Session;

class UserController extends MainController
{
    public function __construct()
    {
        parent::__construct();
        self::$data['user'] = auth()->user();
    }

    public function index(){
        self::$data['userInfo'] = Session::get('userInfo');
        return view('users.update-info',self::$data);
    }
    public function orders(){
        OrderList::getAllOrdersPaginate(self::$data['orders'],auth()->user()->id);
        return view('users.orders',self::$data);
    }
    public function updateInfoPost(UpdateUserInfoRequest $request){
        $user = User::find(Session::get('user')->id);
        $userInfo = $user->info;
        $requestAll = $request->all();
        //isset($userInfo)?$userInfo->update($request->all()):(new UserInfo($request->all()))->save()->attach(Session::get('user'));
        if($request->hasFile('profile_img')){
            $user->uploadImg($request,'_img/profiles',['width'=>800,'height'=>800],'profile_img');
        }
        if(empty($userInfo)){
            $userInfo = new UserInfo($requestAll);
            $userInfo->user_id = $user->id;
            $userInfo->save();
        }else $userInfo->update($requestAll);
        Session::put('userInfo',$userInfo);
        return redirect('user/profile');
    }

}
