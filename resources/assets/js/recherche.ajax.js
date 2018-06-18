$(document).ready(function () {

    // On execute la requete ajax uniquement si le formulaire #formSearchAjax existe sur la page
    if ($("#formSearchAjax").length !== 0) {

        // On récupère l'url du formulaire
        var action = $("#formSearchAjax").attr("action");

        // On récupère la method HTTP du formulaire
        var method = $("#formSearchAjax").attr("method");

        // On serialise les données du formulaire pour les envoyés en ajax
        var data = $("#formSearchAjax").serialize();

        // On execute la requete ajax
        $.ajax({
            type: method,
            url: action,
            data: data,
            success: function (response) {
                // On met a jour le contenu de la page par ce que le serveur a renvoyé
                $("#resultat_recherche").html(response);
            }
        });
    }
});

