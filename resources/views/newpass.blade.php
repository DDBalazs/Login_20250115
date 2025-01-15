@extends('layout')
@section('content')

    <main class="container pb-2">
        <h1 class="text-center display-6 py-3">Jelszó módosítás</h1>
        <div class="card mx-auto" style="width: 30rem">
            <div class="card-body">
                <form action="/newpass" method="POST">
                    @csrf
                    <div class="py-2">
                        <label for="oldpassword" class="form-label">Régi jelszó:</label>
                        <input type="password" id="oldpassword" name="oldpassword" class="form-control">
                        @error('oldpassword')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="py-2">
                        <label for="newpassword" class="form-label">Új jelszó:</label>
                        <input type="password" id="newpassword" name="newpassword" class="form-control">
                        @error('newpassword')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="py-2">
                        <label for="newpassword_confirmation" class="form-label">Új jelszó mégegyszer:</label>
                        <input type="password" id="newpassword_confirmation" name="newpassword_confirmation" class="form-control">
                        @error('newpassword_confirmation')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="py-2 d-flex justify-content-center">
                        <button type="submit" class="btn btn-dark ">Jelszó módosítás</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
