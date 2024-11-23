@extends('layouts.masterApp')
@section('content')
    <div class="container">
        <div class="border rounded shadow-sm text-center align-baseline align-items-center p-2 m-2">
            pusher man Two Section
        </div>
        <div class="py-2 m-2 border rounded shadow rounded-3">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('store.pusher.two.data') }}" method="POST" enctype="multipart/form-data" class="p-5">
                @csrf
                <div class="input-group">
                    <span class="input-group-text">First and last name</span>
                    <input name="firstName_push_two" type="text" aria-label="First name" class="form-control">
                    <input name="lastName_push_two" type="text" aria-label="Last name" class="form-control">
                </div>
                <button class="btn btn-sm my-3 border rounded shadow" type="submit">Submit</button>
            </form>
        </div>
        <div class="mt-3 border rounded shadow py-2 m-2">
            <table class="table">
                <tr>
                    <th>Serial</th>
                    <th>first Name</th>
                    <th>Last Name</th>
                </tr>
                <tbody>
                    @foreach ($push_two as $key => $two)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $two->firstname_pushone }}</td>
                            <td>{{ $two->lastname_pushone }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div id="messages"></div>
@endsection
