$(document).ready(function () {

    // On execute la requete ajax uniquement si le formulaire #formSearchAjax existe sur la page
    $(".recette_categorie").click(function () {

        var recette_categorie = $(this);
        // On récupère l'url du formulaire
        var action = $("#formRecetteCategorieAjax").attr("action");

        // On récupère la method HTTP du formulaire
        var method = $("#formRecetteCategorieAjax").attr("method");

        // On serialise les données pour les envoyés en ajax
        var data = "categorie_id=" + recette_categorie.data('id');

        // On execute la requete ajax
        $.ajax({
            type: method,
            url: action,
            data: data,
            success: function (response) {
                // On met a jour le contenu de la page par ce que le serveur a renvoyé
                $("#resultat_recettes_categorie").html(response);
                $(".recette_categorie").removeClass("red text-white");
                recette_categorie.addClass("red text-white");
            }
        });
    });
});

