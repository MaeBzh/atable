@extends('layouts.app')
@section('content')

    <section class="container elegant-color h-100">
        <div class="card w-100 m-5 z-depth-2">
            <div class="card-header red darken-3 text-white">
                <h4 class="white-text">
                    @if($user->id == Auth::user()->id)
                        Mon profil
                    @else
                        Profil de {{$user->pseudo}}
                    @endif
                </h4>
            </div>
            <div class="card-body grey lighten-4 p-5">
                <form method="POST" action="{{ route('profil.post', ['user', Auth::user()]) }}">
                    @csrf
                    <div class="form-group row">
                        <label for="edit_profil_nom" class="col-form-label col-5 py-2 text-right">Nom :</label>
                        <span class="text-left col-4 py-2" style="display: block"> {{$user->nom}}</span>
                        <input id="edit_profil_nom" style="display: none" type="text" name="nom" value="{{$user->nom}}"
                               class="col-4 py-2 form-control">
                        <a class="edit_button_profil col-2 text-left"><i class="fa fa-edit"></i></a>
                    </div>

                    <div class="form-group row">
                        <label for="edit_profil_prenom" class="col-form-label col-5 py-2 text-right">Prénom :</label>
                        <span class="col-4 text-left py-2" style="display: block"> {{$user->prenom}}</span>
                        <input id="edit_profil_prenom" style="display: none" type="text" name="prenom"
                               value="{{$user->prenom}}"
                               class="col-4 py-2 form-control">
                        <a class="edit_button_profil col-2 text-left"><i class="fa fa-edit"></i></a>
                    </div>

                    <div class="form-group row">
                        <label for="edit_profil_email" class="col-form-label col-5 py-2 text-right">Adresse e-mail :</label>
                        <span class="text-left col-4 py-2" style="display: block" > {{$user->email}}</span>
                        <input id="edit_profil_email" style="display: none" type="text" name="email" value="{{$user->email}}"
                               class=" col-4 py-2 form-control">
                        {{--@if ($errors->has('email'))--}}
                        {{--<span class="invalid-feedback">--}}
                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                        {{--</span>--}}
                        {{--@endif--}}
                        <a class="edit_button_profil col-2 text-left">
                            <i class="fa fa-edit"></i>
                        </a>
                    </div>

                    <div class="form-group row mb-0 justify-content-center">
                        <button type="submit" class="btn btn-red">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection