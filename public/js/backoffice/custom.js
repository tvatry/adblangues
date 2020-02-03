$(document).ready(function() {

    $('.slick_part').slick({
        centerMode: false,
        infinite: false,
        arrows: true,
        draggable: false,
        appendArrows: $('.arrow_slick'),
        prevArrow: "<button id='previous' class='btn prevclick'><i class=\"fa fa-arrow-left\"></i>&nbsp;&nbsp;Précedent</span></button>",
        nextArrow: "<button id='nextious' class='btn nextclick'>Suivant&nbsp;&nbsp;<i class=\"fa fa-arrow-right\"></i></button>",
        adaptiveHeight: false
    });
    $('#nextious').prop('disabled', true);
    $('#previous').css("visibility","hidden");
    $('#a_1_a1_1').change(function(){
        var question = $('#q_a1_1').val()
        var langage =  $('#a_1_a1_1').val()
        if (langage == "" && question == ""){
            $('#nextious').prop('disabled', true);
        }
        else{
            $('#nextious').prop('disabled', false);
        }
    });
    $('#previous').css("visibility","visible");
    /* step 2 */
    $('#a_1_a2_1').change(function(){
        var question = $('#q_a2_1').val()
        var langage =  $('#a_1_a2_1').val()
        if (langage == "" && question == ""){
            $('#nextious').prop('disabled', true);
        }
        else{
            $('#nextious').prop('disabled', false);
        }
    });

    $('#modalDisconnect').modal();

    $( ".languette" ).hover(
        function() {
            $( ".languette" ).animate({
                right: "0px"
            });
        }, function() {
            $( ".languette" ).animate({
                right: "-135px"
            });
        }
    );

    $(".languette").click(function() {
        $('#modalDisconnect').modal('open');
    });

    //RESPONSIVE MENU
    var istoggle = false;
    $('#back_menu').click(function(){

        if (istoggle){
            $( "#menu" ).animate({
                left: "-=350"
            }, 500, function() {
                istoggle = false;
            });
        }
    });

    $('.display_menu').click(function(){
        console.log('ok');
        if (!istoggle){
            $( "#menu" ).animate({
                left: "+=350"
            }, 500, function() {
                istoggle = true;
            });
        }
    });
    $('select').formSelect();

    $( "#test_timer" ).change(function() {
        var nb = $("#test_timer").val();
        $("#timer").text(nb + ' secondes');
    });

});
