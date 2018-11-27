@extends('appshell::layouts.default')

@section('title')
    {{ ucfirst($role->name) }} {{ __('role') }}
@stop

@section('content')

    <div class="card card card-accent-secondary">

        <div class="card-header">
            <i class="zmdi zmdi-shield-security"></i>
            @yield('title')

            @component('appshell::role._user_count', ['count' => $role->users->count()]) @endcomponent

        </div>

        <div class="card-block">

            <div class="form-group">
                <legend>{{ __('Allows') }}</legend>
                @forelse($role->permissions as $permission)
                    <span class="badge badge-pill badge-success">
                        <i class="zmdi zmdi-check"></i>
                        {{ $permission->name }}
                    </span>
                @empty
                    <span class="badge badge-pill badge-warning">
                        <i class="zmdi zmdi-mood-bad"></i>
                        {{ __('nothing') }}
                    </span>
                @endforelse
            </div>

            <?php $noperms = $permissions->diff($role->permissions); ?>
            <div class="form-group">
                <legend>{{ __('Denies') }}</legend>
                @forelse($noperms as $permission)
                    <span class="badge badge-pill badge-danger">
                        <i class="zmdi zmdi-alert-triangle"></i>
                        {{ $permission->name }}
                    </span>
                @empty
                    <span class="badge badge-pill badge-success">
                        <i class="zmdi zmdi-mood"></i>
                        {{ __('nothing') }}
                    </span>
                @endforelse
            </div>

            <div class="form-group">
                <legend>{{ __('Users having this role') }}</legend>
                @forelse($role->users as $user)
                    <div class="btn-group btn-group-sm" style="margin-bottom: 5px" role="group">
                        @can('view users')
                        <a href="{{ route('appshell.user.show', $user) }}" class="btn btn-secondary">{{ $user->name }}</a>
                        @else
                        <button type="button" class="btn btn-secondary">{{ $user->name }}</button>
                        @endcan
                        <button type="button" class="btn btn-secondary"><i class="zmdi zmdi-more-vert"></i></button>
                    </div>
                @empty
                    <a href="javascript:;" class="btn btn-sm btn-secondary" style="margin-bottom: 5px">{{ __('No user assigned so far') }}</a>
                @endforelse

                @can(['edit users'])
                        <a href="{{ route('appshell.user.index') }}"
                           class="btn btn-sm btn-outline-success" style="margin-bottom: 5px">
                            <i class="zmdi zmdi-plus"></i>
                            {{ __('Assign to user') }}
                        </a>

                @endcan

            </div>
        </div>

        <div class="card-footer">
            @can('edit roles')
                <a href="{{ route('appshell.role.edit', $role) }}" class="btn btn-outline-primary">{{ __('Edit role') }}</a>
            @endcan

                <a href="#" onclick="history.back();" class="btn btn-link text-muted">{{ __('Back') }}</a>

            @can('delete roles')
                {!! Form::open(['route' => ['appshell.role.destroy', $role],
                                'method' => 'DELETE',
                                'class' => 'float-right',
                                'data-confirmation-text' => __('Are you sure to delete the :name role?', ['name' => $role->name])
                                ])
                !!}
                <button class="btn btn-outline-danger">
                    {{ __('Delete role') }}
                </button>
                {!! Form::close() !!}
            @endcan
        </div>
    </div>

@stop
