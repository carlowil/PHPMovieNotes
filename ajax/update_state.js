$(document).ready(function(){
    let innButton = $('.btn-innactive');
    let my_alert = $('#my-alert');
    let alert_text = my_alert.find('#my-alert-text');
    innButton.click( function() {
        try {
            let card = $(this).closest('.my-card');
            let img_ref = card.find('.image-ref');
            let button_del = card.find('.btn-delete');
            let btn_edit = card.find('.btn-editt');
            let edit_ref = card.find('.edit-ref');
            let id = card.data('id');
            console.log(img_ref);
            let data = new FormData();
            data.append('id', id);
            fetch(`../innactive_movie/innactive_movie.php`, {
                method: 'POST',
                body: data
            }).then (
                res => res.json()
            ).then (
                result => {
                    console.log(result)
                    if (result.status == 0) {
                        $(this).html('Active');
                        img_ref.css('pointer-events', 'none');
                        edit_ref.css('pointer-events', 'none');
                        button_del.prop('disabled', true);
                        btn_edit.prop('disabled', true);
                        alert_text.html(result.message);
                        my_alert.css('visibility', 'visible');
                    } else {
                        $(this).html('Innactive');
                        img_ref.css('pointer-events', 'auto');
                        edit_ref.css('pointer-events', 'none');
                        button_del.prop('disabled', false);
                        btn_edit.prop('disabled', false);
                        alert_text.html(result.message);
                        my_alert.css('visibility', 'visible');
                    }
                }
            );
        } catch(err) {
            console.log(err.message)
        }
    });
});