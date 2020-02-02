$(document).ready(function() {
    $('#modalMaxPrio').modal();
    $('#modalComp').modal();
    $('#modalQuestion').modal();
    $('#modalDisconnect').modal();

    var active1 = false;
    var active2 = false;

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

    $('.collapsible').collapsible();

    $('.parent2').click(function() {

        if (!active1) $(this).find('.test1').css({'transform': 'translate(-150px,50px)'});
        else $(this).find('.test1').css({'transform': 'none'});
        if (!active2) $(this).find('.test2').css({'transform': 'translate(-30px,130px)'});
        else $(this).find('.test2').css({'transform': 'none'});
        active1 = !active1;
        active2 = !active2;
    });

    $('#step_langage').autocomplete({
        data: {
            "Espagnol": null,
            "Anglais": null,
            "Italien": null,
            "Allemand": null,
            "Japonais": null,
            "Russe": null
        },
    });

    /*LOADER*/

    var pathname = window.location.pathname;

    if (pathname != "/login"){
        setTimeout(
            function()
            {
                $( "#loadercontent" ).animate({
                    opacity: 0
                }, 500, function() {
                    $( "#loadercontent" ).css("display", "none");
                });
            }, 1000);
    }
    else{
        setTimeout(
            function()
            {
                $( "#loadercontent" ).animate({
                    opacity: 0
                }, 0, function() {
                    $( "#loadercontent" ).css("display", "none");
                });
            }, 0);
    }


    $('.slick_part').slick({
        centerMode: false,
        infinite: false,
        arrows: true,
        draggable : false,
        centerPadding: '200px',
        appendArrows: $('.arrow_slick'),
        prevArrow:"<button id='previous' class='btn waves-effect waves-light prevclick'><i class=\"fa fa-arrow-left\"></i>&nbsp;&nbsp;Précedent</span></button>",
        nextArrow:"<button id='nextious' class='btn waves-effect waves-light nextclick'>Suivant&nbsp;&nbsp;<i class=\"fa fa-arrow-right\"></i></button>",
        adaptiveHeight: false
    });

    /* Appearance of the Business and Service fields */
    $('#step_job_demand').change(function(){
        if($('#step_job_demand').val() == 'Oui'){
            $('#divBusiness').show(500);
            $('#divService').show(500);
            $('#business').attr('required', 'true');
            $('#service').attr('required', 'true');
        }
        else{
            $('#divBusiness').hide(500);
            $('#divService').hide(500);
            $('#business').removeAttr('required');
            $('#service').removeAttr('required');
        }
    });

    /*
    Check if at least 1 center has been selected */
    $('#step_place').change(function(){
        $count = $('#step_place option:checked').length;
        if($count < 1){
            $('#errorCenter').text('Choisir au moins 1 centre de formation');
        }
        else{
            $('#errorCenter').text("");
        }
    });


    $('.slick_part').on('beforeChange', function(event, slick, currentSlide, nextSlide){
        if (nextSlide==2) $('#modalComp').modal('open');
    });

    /* Appearance of the fields Specify */
    $('#step_matern').change(function(){
        $langue = $('#step_matern option:selected').text();
        if($langue == "Autre"){
            $('#divDetails').show(500);
            $('#step_matern_precise').attr('required', 'true');
        }else{
            $('#divDetails').hide(500);
            $('#step_matern_precise').removeAttr('required');
        }
    });

    $('select').formSelect();

    var compteur = $("input:checked").length;
    $(".info_priority").html(compteur + " priorité / 4 selectionnées");
    /* Checking the number of priorities */
    $(".comprehension input[type='checkbox']").click(function(){
        if(this.checked == true){
            if(compteur < 4) {
                compteur = compteur + 1;
            }
            else{
                $('#modalMaxPrio').modal('open');
                this.checked = false;
            }
        }
        else{
            compteur = compteur-1;
        }
        $(".info_priority").html(compteur + " priorité / 4 selectionnées");
    });


    $('#step_domain').change(function(){
        domain = $('#step_domain option:selected').text();
        domainSearch = domain.search("Autre");
        if(domainSearch != "-1"){
            $('#divDomain_detail').show(500);
            $('.precisez.validate').attr('required', 'true');
        }
        else{
            $('#divDomain_detail').hide(500);
            $('.precisez.validate').removeAttr('required');
            $('#details').val("");
        }});

    $('#domain').formSelect();

    /* Empeche les nombres et les caractères spéciaux lors de l'ajout de centre*/
    $('#locations_name').on('keypress', function(e) {
        var regex = new RegExp("^[a-zA-Z ]*$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        e.preventDefault();
        return false;
    });
    /* Verification for all the fields */
    /* initialisation */
    $('#nextious').prop('disabled', true);
    $('#linktoquest').attr('disabled',true);
    $('#previous').css("visibility","hidden");
    var score;
    score = 0;
    correct = 35;
    function verifscore(number){
        score = score + number;
        if (score == correct){
            $('#nextious').prop('disabled', false);
        }
        else{
            $('#nextious').prop('disabled', true);
        }
    }
    /* step 1 */
    $('#step_langage').change(function(){
        var langage =  $('#step_langage').val()

        if (langage == ""){
            $('#nextious').prop('disabled', true);
        }
        else{
            $('#nextious').prop('disabled', false);

        }
    });
    /* step 2 */
    var completed_last = false;
    $('#step_last_name').keyup(function(){
        if ($("#step_last_name")[0].validity.valid && !completed_last){
            completed_last = true;
            verifscore(5)
            console.log(score)
        }
        else if (!$("#step_last_name")[0].validity.valid && completed_last){
            completed_last = false;
            verifscore(-5)
            console.log(score)
        }
    });
    var completed_first = false;
    $('#step_first_name').keyup(function(){
        if ($("#step_first_name")[0].validity.valid && !completed_first){
            completed_first = true;
            verifscore(5)
        }
        else if (!$("#step_first_name")[0].validity.valid && completed_first){
            completed_first = false;
            verifscore(-5)
        }
    });
    $('#job .select-dropdown').mouseout(function(){
        var verif = $('#job .select-dropdown').val();
        if(verif == "Non"){
            if (completed_compagny){
                score = score-5;
                completed_compagny = false;
            }
            if (completed_service){
                score = score-5;
                completed_service = false;
            }
            correct = 35
            console.log(verif)
            console.log(correct)
            $("#step_compagny, #step_service").val("");
            verifscore(0)
        }
        else{
            correct = 45
            console.log(verif)
            console.log(correct)
            verifscore(0)
        }
    });
    var completed_compagny = false;
    $('#step_compagny').keyup(function(){
        if ($("#step_compagny")[0].validity.valid && !completed_compagny){
            completed_compagny = true;
            verifscore(5)
            console.log(score)
        }
        else if (
            !$("#step_compagny")[0].validity.valid && completed_compagny){
            completed_compagny = false;
            verifscore(-5)
            console.log(score)
        }
    });
    var completed_service = false;
    $('#step_service').keyup(function(){
        if ($("#step_service")[0].validity.valid && !completed_service){
            completed_service = true;
            verifscore(5)
            console.log(score)
        }
        else if (
            !$("#step_service")[0].validity.valid && completed_service){
            completed_service = false;
            verifscore(-5)
            console.log(score)
        }
    });
    var completed_mail = false;
    $('#step_mail').keyup(function(){

        if ($("#step_mail")[0].validity.valid && !completed_mail){
            completed_mail = true;
            verifscore(5)
        }
        else if (!$("#step_mail")[0].validity.valid && completed_mail){
            completed_mail = false;
            verifscore(-5)
        }
    });
    var completed_phone = false;
    $('#step_phone').keyup(function(){

        if ($("#step_phone")[0].validity.valid && !completed_phone){
            completed_phone = true;
            verifscore(5)
        }
        else if (!$("#step_phone")[0].validity.valid && completed_phone){
            completed_phone = false;
            verifscore(-5)
        }
    });
    var completed_formation_site = false;
    $('.formation_souhaite input').click(function(){
        if ($('.formation_souhaite input')[0].validity.valid && !completed_formation_site){
            completed_formation_site = true;
            verifscore(5)
        }
        else if (!$('.formation_souhaite input')[0].validity.valid && completed_formation_site){
            completed_formation_site = false;
            verifscore(-5)
        }
    });
    var completed_step_function = false;
    $('#step_function').keyup(function(){
        if ($('#step_function')[0].validity.valid && !completed_step_function){
            completed_step_function = true;
            verifscore(5)
        }
        else if (!$('#step_function')[0].validity.valid && completed_step_function){
            completed_step_function = false;
            verifscore(-5)
        }
    });
    var completed_step_context = false;
    $('#step_context').keyup(function(){
        if ($('#step_context')[0].validity.valid && !completed_step_context){
            completed_step_context = true;
            verifscore(5)
        }
        else if (!$('#step_context')[0].validity.valid && completed_step_context){
            completed_step_context = false;
            verifscore(-5)
        }
    });
    /* step 3, we don't need any verifications for the step 3 */
    /* step 4 */
    $('#domaindetail .select-dropdown').mouseout(function(){
        var domain =  $('#domaindetail .select-dropdown').val()
        console.log("ok")
        console.log(domain)
        if (domain == ""){
            $('#linktoquest').attr('disabled',true);
            console.log(domain)
        }
        else{
            $('#linktoquest').attr('disabled',false);
            console.log(domain)
        }
    });
    /* reset */
    $('#nextious').click(function(){
        if(score != correct){
            $('#nextious').prop('disabled', true);
        }
    });
    /* hide the previous button on the step 1,
    and the nextious button on the step 4 */
    var hide;
    hide = 0;
    $('#nextious').click(function(){
        hide = hide + 1
        if (hide == 3){
            $('#nextious').css("visibility","hidden");
            $('#previous').css("visibility","visible");
        }
        else{
            $('#nextious').css("visibility","visible");
            $('#previous').css("visibility","visible");
        }
    });
    $('#previous').click(function(){
        hide = hide - 1
        if (hide == 0){
            $('#nextious').css("visibility","visible");
            $('#previous').css("visibility","hidden");
        }
        else {
            $('#nextious').css("visibility","visible");
            $('#previous').css("visibility","visible");
        }
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

});