@extends('cms.model.create')

@section('create-content')
    @include('cms.inc.forms.form-unit',['prop'=>'email','type'=>'email'])
    @component('cms.inc.forms.form-unit',['prop'=>'role_id','displayProp'=>'Role','entity'=>$entity])
        @slot('input')
            @include('cms.inc.forms.inputs.select-role',['item'=>$entityItem??null])
        @endslot
    @endcomponent
    @include('cms.inc.forms.form-unit',['prop'=>'password','displayProp'=>'password','type'=>'password'])
    @include('cms.inc.forms.form-unit',['prop'=>'password_confirmation','displayProp'=>'repeat password','type'=>'password'])

@endsection
