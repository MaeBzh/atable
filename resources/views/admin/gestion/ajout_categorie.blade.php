@extends('layouts.app')

@section('content')
    <section class="container elegant-color h-100">
        <div class="card  w-100 m-1 m-md-5 z-depth-2 grey lighten-4">
            <div class="card-header red darken-3 text-white">
                <h4>Ajouter une catégorie</h4>
            </div>

            <div class="card-body p-1 px-md-5 m-1 m-md-5 text-md-left">
                <form method="POST" action="{{ route('admin.gestion.categorie.ajout.post') }}"
                      enctype="multipart/form-data">
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
                        <label for="categorie" class="col-form-label text-md-right">Catégorie parent</label>
                        <select class="form-control {{ $errors->has('categorie') ? ' is-invalid' : '' }}"
                                name="categorie" value="{{ old('categorie') }}" required="required" autofocus
                                id="categorie">
                            <option>Aucune</option>

                            @foreach(\App\Categorie::categoriesPrincipales() as $categorie_principale)
                                <option label="{{ucfirst($categorie_principale->libelle_categorie)}}">
                                </option>
                                @foreach($categorie_principale->sousCategories as $categorie)
                                    <option value="{{$categorie->id}}">{{ucfirst($categorie->libelle_categorie)}}</option>
                                @endforeach
                            @endforeach



                        </select>

                        @if ($errors->has('categorie'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('categorie') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group row mb-0 justify-content-center">
                        <button type="submit" class="btn btn-red">
                            Valider
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
