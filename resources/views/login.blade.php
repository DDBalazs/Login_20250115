@extends('layout')
@section('content')

    <main class="container pb-2">
        <h1 class="text-center display-6 py-3">Bejelentkezés</h1>
        <div class="card mx-auto" style="width: 30rem">
            <div class="card-body">
                <form action="/login" method="POST">
                    @csrf
                    @if ($errors->any())
                        <span class="text-danger">Adja meg minkét mező adadtát!</span>
                    @endif
                    @if (isset($sv))
                        <span class="text-danger">A név vagy a jelszó nem egyezik!</span>
                    @endif
                    <div class="py-2">
                        <label for="name" class="form-label">Felhasználónév:</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="py-2">
                        <label for="password" class="form-label">Jelszó:</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <div class="py-2 d-flex justify-content-center">
                        <button type="submit" class="btn btn-dark ">Bejelentkezés</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
