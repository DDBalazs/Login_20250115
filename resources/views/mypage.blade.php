@extends('layout')
@section('content')

    <main class="container pb-2">
        <h1 class="text-center display-6 py-3">Szép cicás kép</h1>
        <p><b>Név:</b>{{Auth::user()->name}}</p>
        <p><b>Regisztráció ideje:</b>{{date_format(data_create(Auth::user()->created_at, 'Y. m. d.'))}}</p>
        <p><b>Bemutatkozás:</b> {{Auth::class()->bio}}</p>
        <p>
            <a class="btn btn-primary" href="/newpass">Jelszómódosítás</a>
            <a class="btn btn-danger" href="/del">Regisztráció törlése</a>
        </p>
    </main>
@endsection
