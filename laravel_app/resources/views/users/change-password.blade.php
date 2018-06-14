@extends('users.profile')
@section('settings-content')
    <form action="" method="POST">
        <div class="form-group">
            <label for="create_password">Create Password</label>
            <input type="password" id="create_password" class="form-control" aria-describedby="passwordHelpBlock">
            <small id="passwordHelpBlock" class="form-text text-muted">If you don't want to change password, please leave blank.</small>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" class="form-control">
        </div>
        <button type="submit" class="btn btn-success w-100 submit">Update Information</button>
    </form>

@endsection
