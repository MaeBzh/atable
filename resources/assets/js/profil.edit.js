$(".edit_button_profil").click(function () {
    var edit_btn = $(this);
    var edit_input = edit_btn.prev();
    var edit_span = edit_input.prev();

    if(edit_input.css('display') === 'none'){
        edit_input.css('display', 'block');
        edit_input.focus();
    } else {
        edit_input.css('display', 'none');
    }

    if(edit_span.css('display') === 'none'){
        edit_span.css('display', 'block');
        edit_span.focus();
    } else {
        edit_span.css('display', 'none');
    }
});