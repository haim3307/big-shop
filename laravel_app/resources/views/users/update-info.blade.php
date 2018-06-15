@extends('users.profile')
@section('settings-content')
   <div class="f-row">
       <div class="col-12 col-md-5">
           <div class="profile-thumb" style="background-image: url('{{asset('_img/profiles/'.$user->profile_img)}}');width: initial; max-width: 100%;"></div>
           <form class="profile-thumb-upload mt-15" enctype="multipart/form-data" method="post">
               {{$user->name}}
               <div class="form-group">
                   {{csrf_field()}}
                   <div class="f-row justify-content-between">
                       <input type="file" class="form-control-file fade" id="upload-new-thumb" name="profile_img">
                       <label class="submit" for="upload-new-thumb">Upload Profile Img</label>
                       <label class="submit" for="submitImg">Submit Profile Img</label>
                       <input type="submit" name="submit" id="submitImg" class="fade">
                   </div>
                   @if($errors->has('profile_img')) <div class="text-danger">{{$errors->first('profile_img')}}</div> @endif

               </div>
           </form>
       </div>

       <div class="col-12 col-md-7">
           <div class="profile_form">
               <form action="#" method="post" class="text-left" novalidate="novalidate">
                   {{csrf_field()}}
                   <div class="g-row" style="grid-column-gap: 20px;">
                       <div class="g-col-12 g-col-md-6">
                           <div class="form-group">
                               <label for="first_name">First Name</label>
                               <input type="text" class="form-control" name="first_name" id="first_name" value="{{$userInfo->first_name??''}}">
                               @if($errors->has('first_name')) <div class="text-danger">{{$errors->first('first_name')}}</div> @endif
                           </div>
                       </div>
                       <div class="g-col-12 g-col-md-6">
                           <div class="form-group">
                               <label for="last_name">Last Name</label>
                               <input type="text" class="form-control" name="last_name" id="last_name" value="{{$userInfo->last_name??''}}">
                               @if($errors->has('last_name')) <div class="text-danger">{{$errors->first('last_name')}}</div> @endif

                           </div>
                       </div>
                   </div>
                   <div class="form-group">
                       <label for="email">Email address</label>
                       <input type="email" class="form-control" id="email" value="{{Session::get('user')->email}}" disabled="disabled">
                   </div>
                   <div class="form-group">
                       <label for="p_number">Phone Number</label>
                       <input type="tel" class="form-control" id="p_number" name="phone" value="{{$userInfo->phone??''}}">
                       @if($errors->has('phone')) <div class="text-danger">{{$errors->first('phone')}}</div> @endif
                   </div>
                   <button type="submit" class="btn btn-success w-100 submit">Update Information</button>
               </form>
           </div>
       </div>
   </div>

@endsection
