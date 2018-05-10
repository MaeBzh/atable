@extends('layouts.app')
@section('content')

    <section class="container elegant-color h-100">
        <div class="card w-100 m-5 z-depth-2">
            <div class="card-header red darken-3 text-white"> @if($user->id == Auth::user()->id)
                    <h4 class="white-text">Mon profil</h4>
                @else
                    <h4 class="white-text">Profil de {{$user->pseudo}}</h4>
                @endif
            </div>
            <div class="card-body grey lighten-4 p-5">
                <form method="POST" action="{{ route('update_profil.post') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="edit_nom" class="col-form-label col-5 py-2 text-right">Nom :</label>
                        <span class="text-left col-5 py-2" id="nom" style="display: block"> {{$user->nom}}</span>
                        <input id="edit_nom" style="display: none" type="text" name="nom" value="{{$user->nom}}"
                               class="col-5 py-2 form-control">

                        @if ($errors->has('nom'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nom') }}</strong>
                                    </span>
                        @endif
                        <a class="edit_button col-2" onclick="showEditNom()"><i class="fa fa-edit"></i></a>
                    </div>

                    <div class="form-group row">
                        <label for="edit_prenom" class="col-form-label col-5 py-2 text-right">Prénom :</label>
                        <span class="col-5 text-left py-2" id="prenom" style="display: block"> {{$user->prenom}}</span>
                        <input id="edit_prenom" style="display: none" type="text" name="prenom" value="{{$user->prenom}}"
                               class="col-5 py-2 form-control">

                        @if ($errors->has('prenom'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('prenom') }}</strong>
                                    </span>
                        @endif
                        <a class="edit_button col-2" onclick="showEditPrenom()"><i class="fa fa-edit"></i></a>
                    </div>

                    <div class="form-group row">
                        <label for="edit_email" class="col-form-label col-5 py-2 text-right">Adresse e-mail :</label>
                        <span class="text-left col-5 py-2" style="display: block" id="email"> {{$user->email}}</span>
                        <input id="edit_email" style="display: none" type="text" name="email" value="{{$user->email}}"
                               class=" col-5 py-2 form-control">

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                        <a class="edit_button col-2" onclick="showEditEmail()"><i class="fa fa-edit"></i></a>
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

    <script>
        function showEditEmail() {
            var show_input = document.getElementById("edit_email");
            var hide_span = document.getElementById("email");
            if (show_input.style.display === "none" && hide_span !== "none") {
                show_input.style.display = "block";
                hide_span.style.display = "none";
                document.getElementById("edit_email").focus();
            } else {
                show_input.style.display = "none";
                hide_span.style.display = "block";
            }
        }

        function showEditNom() {
            var show_input = document.getElementById("edit_nom");
            var hide_span = document.getElementById("nom");
            if (show_input.style.display === "none" && hide_span !== "none") {
                show_input.style.display = "block";
                hide_span.style.display = "none";
                document.getElementById("edit_nom").focus();
            } else {
                show_input.style.display = "none";
                hide_span.style.display = "block";
            }
        }

        function showEditPrenom() {
            var show_input = document.getElementById("edit_prenom");
            var hide_span = document.getElementById("prenom");
            if (show_input.style.display === "none" && hide_span !== "none") {
                show_input.style.display = "block";
                hide_span.style.display = "none";
                document.getElementById("edit_prenom").focus();
            } else {
                show_input.style.display = "none";
                hide_span.style.display = "block";
            }
        }
    </script>
@endsection