$(document).ready(function(){
    let delButton = $('.btn-delete');
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
                        alert(result.message);
                    }
                    else {
                        alert(result.message);
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