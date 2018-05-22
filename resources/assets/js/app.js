
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./navbar.search.js');
require('./profil.edit.js');

// Affichage des tooltips au survol de la souris
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

// Surcharge de l'input type='file' de bootstrap pour afficher le nom de l'image dans un input text
$(document).ready(function () {
    $('.custom-file-input').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $('.custom-file-label').html(fileName? fileName : "Choisissez un fichier");
    });
});