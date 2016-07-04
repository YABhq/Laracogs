@extends('dashboard')

@section('content')

        <div class="header">
            <h1>Settings</h1>
            <h2>User level settings</h2>
        </div>
        <div class="content">
            <form method="POST" action="/user/settings" class="pure-form pure-form-aligned">
                {!! csrf_field() !!}

                <div class="pure-control-group">
                    @input_maker_label('Email')
                    @input_maker_create('email', ['type' => 'string'], $user)
                </div>

                <div class="pure-control-group">
                    @input_maker_label('Name')
                    @input_maker_create('name', ['type' => 'string'], $user)
                </div>

                @include('user.meta')

                @if ($user->roles->first()->name === 'admin' || $user->id == 1)
                    <div class="pure-control-group">
                        @input_maker_label('Role')
                        @input_maker_create('roles', ['type' => 'relationship', 'model' => 'App\Repositories\Role\Role', 'label' => 'label', 'value' => 'name'], $user)
                    </div>
                @endif

                <div class="pure-control-group">
                    <a class="button-secondary pure-button" href="{{ URL::previous() }}">Cancel</a>
                    <button class="pure-button pure-button-primary" type="submit">Save</button>
                    <a class="pure-button button-info" href="/user/password">Change Password</a><br>
                </div>
            </form>
        </div>

@stop
