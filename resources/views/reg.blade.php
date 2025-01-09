@extends('layout')
@section('content')

    <main class="container pb-2">
        <h1 class="text-center display-6 py-3">Regisztráció</h1>
        <div class="card mx-auto" style="width: 30rem">
            <div class="card-body">
                <form action="/reg" method="POST">
                    @csrf
                    <div class="py-2">
                        <label for="name" class="form-label">Felhasználónév:</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="py-2">
                        <label for="password" class="form-label">Jelszó:</label>
                        <input type="password" id="password" name="password" class="form-control">
                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="py-2">
                        <label for="password_confirmation" class="form-label">Jelszó ismétlés:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                        @error('password_confirmation')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="py-2">
                        <label for="bio" class="form-label">Bemutatkozás:</label>
                        <textarea name="bio" id="bio" cols="30" rows="10" class="form-control">{{old('bio')}}</textarea>
                        @error('bio')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="py-2 d-flex justify-content-center">
                        <button type="submit" class="btn btn-dark ">Regisztráció</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
