@extends('layouts.app')

@section('content')
    <section class="container elegant-color h-100">
        <div class="card  w-100 m-1 m-md-5 z-depth-2 grey lighten-4">
            <div class="card-header red darken-3 text-white">
                <h4>Ajouter une recette</h4>
            </div>

            <div class="card-body p-1 px-md-5 m-1 m-md-5 text-md-left">
                <form method="POST" action="{{ route('recettes.ajout.post') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="titre" class="col-form-label text-md-right">Titre</label>
                        <input id="titre" type="text"
                               class="form-control{{ $errors->has('titre') ? ' is-invalid' : '' }}"
                               name="titre" value="{{ old('titre') }}" required="required" autofocus>

                        @if ($errors->has('titre'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('titre') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="categorie" class="col-form-label text-md-right">Catégorie</label>
                        <select class="form-control {{ $errors->has('categorie') ? ' is-invalid' : '' }}"
                                name="categorie" value="{{ old('categorie') }}" required="required" autofocus
                                id="categorie">

                            @foreach(\App\Categorie::categoriesPrincipales() as $categorie_principale)
                                <optgroup label="{{ucfirst($categorie_principale->libelle_categorie)}}">
                                    @foreach($categorie_principale->sousCategories as $categorie)
                                        <option value="{{$categorie->id}}">{{ucfirst($categorie->libelle_categorie)}}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach

                        </select>

                        @if ($errors->has('categorie'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('categorie') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="photo" class="col-form-label text-md-right">Photo principale</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile04" name="photo" required>
                            <label class="custom-file-label text-left" for="inputGroupFile04">Choisissez un
                                fichier</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nb_pers" class="col-form-label text-md-right">Nombre de personnes</label>
                        <input id="nb_pers" type="number" min="0"
                               class="form-control{{ $errors->has('nb_pers') ? ' is-invalid' : '' }}"
                               name="nb_pers" value="{{ old('nb_pers') }}" required autofocus>

                        @if ($errors->has('nb_pers'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('nb_pers') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="temps_preparation" class="col-form-label text-md-right">Temps de
                            préparation</label>
                        <input id="temps_preparation" type="time"
                               class="form-control{{ $errors->has('temps_preparation') ? ' is-invalid' : '' }}"
                               name="temps_preparation" value="{{ old('temps_preparation') }}" required autofocus>

                        @if ($errors->has('temps_preparation'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('temps_preparation') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="temps_cuisson" class="col-form-label text-md-right">Temps de cuisson</label>
                        <input id="temps_cuisson" type="time"
                               class="form-control{{ $errors->has('temps_cuisson') ? ' is-invalid' : '' }}"
                               name="temps_cuisson" value="{{ old('temps_cuisson') }}" required autofocus>

                        @if ($errors->has('temps_cuisson'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('temps_cuisson') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 text-md-center">
                            <label for="difficulte" class="col-form-label text-md-right">Difficulté</label>

                            <div class="form-check pl-0" data-toggle="tooltip" data-placement="left"
                                 title="Facile">
                                <input class="form-check-input regular-radio" checked="checked" type="radio"
                                       name="difficulte" id="facile"
                                       value="facile">
                                <label class="form-check-label" for="facile">
                                    <span class="icon-toque icone_difficulte"></span>
                                </label>
                            </div>

                            <div class="form-check pl-0" data-toggle="tooltip" data-placement="left"
                                 title="Normale">
                                <input class="form-check-input regular-radio" type="radio" name="difficulte"
                                       id="normale"
                                       value="normale">
                                <label class="form-check-label" for="normale">
                                    <span class="icon-toque icone_difficulte"></span>
                                    <span class="icon-toque icone_difficulte"></span>
                                </label>
                            </div>

                            <div class="form-check pl-0" data-toggle="tooltip" data-placement="left"
                                 title="Difficile">
                                <input class="form-check-input regular-radio" type="radio" name="difficulte"
                                       id="difficile"
                                       value="difficile">
                                <label class="form-check-label" for="difficile">
                                    <span class="icon-toque icone_difficulte"></span>
                                    <span class="icon-toque icone_difficulte"></span>
                                    <span class="icon-toque icone_difficulte"></span>
                                </label>
                            </div>
                        </div>


                        <div class="form-group col-md-6 text-md-center">
                            <label for="prix" class="col-form-label">Prix</label>
                            <div class="form-check pl-0" data-toggle="tooltip" data-placement="left"
                                 title="Bon marché">
                                <input class="form-check-input regular-radio" checked="checked" type="radio" name="prix"
                                       id="bon_marche"
                                       value="bon marché">
                                <label class="form-check-label" for="bon_marche">
                                    <span class="icon-euro icone_prix"></span>
                                </label>
                            </div>

                            <div class="form-check pl-0" data-toggle="tooltip" data-placement="left"
                                 title="Moyen">
                                <input class="form-check-input regular-radio" type="radio" name="prix" id="moyen"
                                       value="moyen">
                                <label class="form-check-label" for="moyen">
                                    <span class="icon-euro icone_prix"></span>
                                    <span class="icon-euro icone_prix"></span>
                                </label>
                            </div>

                            <div class="form-check pl-0" data-toggle="tooltip" data-placement="left"
                                 title="Cher">
                                <input class="form-check-input regular-radio" type="radio" name="prix" id="cher"
                                       value="cher">
                                <label class="form-check-label" for="cher">
                                    <span class="icon-euro icone_prix"></span>
                                    <span class="icon-euro icone_prix"></span>
                                    <span class="icon-euro icone_prix"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="conseil_presentation" class="col-form-label text-md-right">Conseil de
                            présentation</label>
                        <textarea class="form-control" id="conseil_presentation" name="conseil_presentation"
                                  rows="3"></textarea>
                        @if ($errors->has('titre'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('conseil_presentation') }}</strong>
                                    </span>
                        @endif
                    </div>


                    <div class="form-group row mb-0 justify-content-center">
                        <button type="submit" class="btn btn-red">
                            Ajouter la description
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
