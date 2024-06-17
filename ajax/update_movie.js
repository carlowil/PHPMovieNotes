$(document).ready(function(){
    let form = $('#updateMovieForm')
    let id = form.data('id');
    form.on("submit", async function( event ) {
        event.preventDefault()
        try {
            let title = form.find('[id=title]').val();
            let href = form.find('[id=href]').val();
            let rating = form.find('[id=rating]').val();
            let desc = form.find('[id=desc]').val();
            let comment = form.find('[id=comment]').val();
            let img = document.querySelector('input[type="file"]').files[0];

            if(!href || !title || !desc || !rating || !img || !comment) {
                return alert("Pass all fiealds please!");
            }

            let data = new FormData();
            data.append('id', id);
            data.append('img', img);
            data.append('title', title);
            data.append('rating', rating);
            data.append('desc', desc);
            data.append('comment', comment);
            data.append('href', href);

            await fetch('../update_movie/update_movie.php', {
                method: 'POST',
                body: data
            }).then((res) => {
                return res.json()
            }).then((mes) => {
                if (alert(mes.message))
                {
                    location.assign('/home.php');
                }
                else
                {
                    location.assign('/home.php');
                }
            }).catch(err => {
                if (alert("Cant update movie! Server fault. Err: " + err))
                {
                    location.assign('/home.php');
                }
                else
                {
                    location.assign('/home.php');
                }
            }) 

            console.log(data);

        } catch(err) {
            console.log(err)
        }
    })
})