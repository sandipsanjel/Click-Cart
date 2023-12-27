@extends('master')
{{-- from here content section starts  --}}
@section('content')
    <div class="container custom-login">
        {{-- this methos is for the uesr authentication --}}
        <form action="{{ url('/register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="sandip sanjel"
                    aria-describedby="helpId" value="{{ old('name') }}" />
                <span class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="form-control" placeholder="sandip@gmail.com"
                    aria-describedby="helpId" value="{{ old('email') }}" />
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control" placeholder="*******"
                    aria-describedby="helpId" />
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            {{-- <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="password_confirmation" id="" class="form-control" placeholder=""
                    aria-describedby="helpId"/>
                <span class="text-danger">
                    @error('password_confirmation')
                        {{$message}}
                    @enderror
                </span>
            </div> --}}
            <button type="submit" class="btn btn-primary">
                Register
            </button>
        </form>
    </div>
@endsection
