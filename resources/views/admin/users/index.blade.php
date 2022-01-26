@extends('admin.layouts.app')
@section('title') {{ __('users_list') }} @endsection

@section('content')

    @php
    $userr = Auth::user();
    @endphp

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('users_list') }}</h3>
                            <a href="{{ route('user.create') }}"
                                class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                    class="fas fa-plus"></i>{{ __('create_user') }}</a>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th width="5%">{{ __('sl') }}</th>
                                    <th>{{ __('name') }}</th>
                                    <th>{{ __('email') }}</th>
                                    <th>{{ __('roles') }}</th>
                                    @if ($userr->can('admin.edit') || $userr->can('admin.delete'))
                                        <th width="10%">{{ __('action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @foreach ($user->roles as $role)
                                                <span class="badge badge-primary">{{ $role->name }}</span>
                                            @endforeach
                                        </td>
                                            <td>
                                                    <a href="{{ route('user.edit', $user->id) }}" class="btn bg-info"><i
                                                            class="fas fa-edit"></i></a>
                                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                        class="d-inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button
                                                            onclick="return confirm('Are you sure you want to delete this item?');"
                                                            class="btn bg-danger"><i class="fas fa-trash"></i></button>
                                                    </form>
                                            </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">
                                            <x-admin.not-found route="user.create" />
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
