<select class="custom-select roleSelect" name="role_id" data-user-id="{{$item->id??''}}">
    <option value="">Select user's role..</option>
    @foreach(\App\Role::all() as $role)
        <option value="{{$role->id}}"
                @if (isset($item) && $item->role && $item->role->id == $role->id) selected="selected" @endif>{{ucwords($role->name)}}</option>
    @endforeach
</select>