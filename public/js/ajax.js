$(document).ready(function() {

    $('.edit_profil').click(function () {

        var id = $('.edit_profil').attr('name');

        $.ajax({
            url: '/admin/edit_user/',
            type: 'GET', // Le type de la requête HTTP, ici devenu POST
            data: 'id=' + id,
            dataType: 'html',
            async: true,
            success: function (data) {
                console.log(data)
            }
        });
    });

});