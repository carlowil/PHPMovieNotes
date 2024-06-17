$(document).ready(function(){
    let delButton = $('.btn-delete');
    let my_alert = $('#my-alert');
    let alert_text = my_alert.find('#my-alert-text');
    delButton.click( function() {
        try {
            let card = $(this).closest('.my-card');
            let id = card.data('id');
            let title = card.data('title');
            console.log(title);
            let data = new FormData();
            data.append('id', id);
            data.append('title', title);
            fetch(`../del_movie/del_movie.php`, {
                method: 'POST',
                body: data
            }).then (
                res => res.json()
            ).then (
                result => {
                    console.log(result)
                    if (result.status == 0) {
                        card.closest('.card-col').remove();
                        alert_text.html(result.message);
                        my_alert.css('visibility', 'visible');
                    }
                    else {
                        alert_text.html(result.message);
                        my_alert.css('visibility', 'visible');
                        console.log(result.message);
                        console.log(result)
                    }
                }
            );
        } catch(err) {
            console.log(err.message)
        }
    });
});