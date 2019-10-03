@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <table class="table table-hover">
                    <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Member Since</th>
                    <th>Role</th>
                    <th></th>
                    </thead>
                    <tbody>
                @foreach($users as $user)
                        <tr>
                        <td>{{$user->name}} </td>
                        <td>{{$user->email}} </td>
                        <td>{{date_format($user->created_at, 'd-M-Y')}} </td>
                        @if ($user->role == 1)
                        <td>Buyer </td>
                        @endif
                        @if ($user->role == 2)
                        <td>Seller </td>
                        @endif
                        @if ($user->role == 3)
                        <td>Admin </td>
                        @endif

                        
                        <td><a href="{{ route('editUser', ['id' => $user->id]) }}" > Edit</a> </td>
                        </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection