// Activate Next Step

$(document).ready(function() {
    
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
   
});


$(document).ready(function() {

var nextButtons = 

$('.sljedeci').click(function(e)
{
    e.preventDefault();
    
    var $activeStep = $(document).find('ul.setup-panel li.active')
    $activeStep.removeClass('active');
    var $nextStep = $activeStep.next();
    $nextStep.addClass('active');
    $($activeStep.find('a').attr('href')).hide();
    $($nextStep.find('a').attr('href')).show();
    

});

$('.prethodni').click(function(e)
{
    e.preventDefault();
    
    var $activeStep = $(document).find('ul.setup-panel li.active')
    $activeStep.removeClass('active');
    var $prevStep = $activeStep.prev();
    $prevStep.addClass('active');
    $($activeStep.find('a').attr('href')).hide();
    $($prevStep.find('a').attr('href')).show();
    

});

});

// kod za listbox

$(document).ready(function () {
    $(".btn-select").each(function (e) {
        var value = $(this).find("ul li.selected").html();
        if (value != undefined) {
            $(this).find(".btn-select-input").val(value);
            $(this).find(".btn-select-value").html(value);
        }
    });
});

$(document).on('click', '.btn-select', function (e) {
    e.preventDefault();
    var ul = $(this).find("ul");
    if ($(this).hasClass("active")) {
        if (ul.find("li").is(e.target)) {
            var target = $(e.target);
            target.addClass("selected").siblings().removeClass("selected");
            var value = target.html();
            $(this).find(".btn-select-input").val(value);
            $(this).find(".btn-select-value").html(value);
        }
        ul.hide();
        $(this).removeClass("active");
    }
    else {
        $('.btn-select').not(this).each(function () {
            $(this).removeClass("active").find("ul").hide();
        });
        ul.slideDown(300);
        $(this).addClass("active");
    }
});

$(document).on('click', function (e) {
    var target = $(e.target).closest(".btn-select");
    if (!target.length) {
        $(".btn-select").removeClass("active").find("ul").hide();
    }
});

// Add , Delete row dynamically

     $(document).ready(function(){
      var i=1;
      // niz svih fakulteta
      var sviFaxovi = ['Akademija likovnih umjetnosti',
'Akademija scenskih umjetnosti',
'American University in BiH',
'Arhitektonski fakultet',
'Ekonomski fakultet',
'Elektrotehnički fakultet',
'Fakultet islamskih nauka',
'Fakultet političkih nauka',
'Fakultet sporta i tjelesnog odgoja',
'Fakultet za kriminalistiku, kriminologiju i sigurnosne studije',
'Fakultet za saobraćaj i komunikacije',
'Fakultet za upravu',
'Fakultet zdravstvenih studija',
'Farmaceutski fakultet',
'Filozofski fakultet',
'Građevinski fakultet',
'International Burch University',
'International University of Sarajevo',
'Katolički bogoslovni fakultet',
'Mašinski fakultet',
'Medicinski fakultet',
'Muzička akademija',
'Pedagoški fakultet',
'Poljoprivredno-prehrambeni fakultet',
'Pravni fakultet',
'Prirodno-matematički fakultet',
'Sarajevo School of Science and Technology',
'Stomatološki fakultet sa klinikama',
'Šumarski fakultet',
'Veterinarski fakultet'];

    var j;
    var t = '';
    for(j=1; j < sviFaxovi.length; j++)
        t += '<li class="listItem">' + sviFaxovi[j] + '</li>';



     $("#add_row").click(function(){
              $('#addr'+i).html('<div class="form-group col-xs-12 col-md-9">\
                            <label for="fakultet">\
                                Fakultet*</label>\
                                <a class=" listbox btn btn-info btn-select btn-select-light">\
    <input type="hidden" class="btn-select-input" id="fakultet' + i +'" name="fakultet' + i + '" value="Akademija likovnih umjetnosti" />\
    <span class="btn-select-value">Akademija likovnih umjetnosti</span>\
    <span class="btn-select-arrow glyphicon glyphicon-chevron-down"></span>\
    <ul class="selectLista">\
        <li class="selected listItem">Akademija likovnih umjetnosti</li>' + t +
        
    '</ul>\
</a>\
                                  <p class="error errorFakultet' + i +'"></p>\
                        </div>\
\
                        <div class="form-group col-xs-12 col-md-3">\
                            <label for="godinaStudija">\
                                Godina studija*</label>\
                                <a class=" listbox btn btn-info btn-select btn-select-light">\
    <input type="hidden" class="btn-select-input" id="godina' + i +'" name="godina' + i + '" value="1." />\
    <span class="btn-select-value">1.</span>\
    <span class="btn-select-arrow glyphicon glyphicon-chevron-down"></span>\
    <ul class="selectLista">\
        <li class="selected listItem">1.</li>\
        <li class="listItem">2.</li>\
        <li class="listItem">3.</li>\
        <li class="listItem">4.</li>\
        <li class="listItem">5.</li>\
        <li class="listItem">6.</li>\
    </ul>\
</a>\
                                  <p class="error errorGodina' + i +'"></p>\
                        </div>\
\
\
                        <div class="form-group col-xs-12 col-md-6">\
                            <label for="odsjek">\
                                Odsjek</label>\
                            <input type="text" class="form-control" id="odsjek' + i +'" name="odsjek' + i + '"  />\
                            <p class="error error' + i +'"></p>\
                        </div>\
                          <div class="form-group col-xs-12 col-md-6">\
                            \
                            <input type="button" id= "' + i +'" class="form-control btn btnObrisi delete_row' + i  +'" value="Obriši fakultet"/>\
                        </div>');




      //$('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name"+i+"' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='sur"+i+"' type='text' placeholder='Surname'  class='form-control input-md'></td><td><input  name='email"+i+"' type='text' placeholder='Email'  class='form-control input-md'></td><td><select type='text' name='gender"+i+"' class='form-control'><option name='male"+i+"' value='male'>Male</option><option name='Female"+i+"' value='Female'>Female</option><option name='3rdgen"+i+"' value='none'>None</option></select></td>");

      $('#sviFaksovi').append('<div id="addr' + (i+1) +'"></div>');
      
      $(".delete_row" + i).click(function(){
        var Addrid = $(this).attr('id');
         if(i>=1){
         $("#addr"+(Addrid)).html('');
         //i--;
         }
     });
      i++; 
  });
     

});


 $(document).ready(function(){

$('#radioBtn1 a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
});

$('#radioBtn2 a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
});


$('.listItem').on('click', function(){
    var vrijednost = $(this).html();
    $(this).parent().prev().prev().prev().prop('value', vrijednost);

});






});

 $(document).ready(function(){


 $("#prijavaForm").submit(function(e) {


    var valid1 = true;
    var valid3 = true;
    var valid4 = true;

    var valid = true;

    //validacija polja

    //korak1

    //ime
    var regexIme = /^[a-z ,.'-ćčšžđČĆŠŽĐ]+$/i;
    if($('#ime').val() == '')
    {
        $('#errorIme').html('Molimo unesite Vaše ime.');
        $('#ime').addClass('tbError');
        valid1 = false;
    }
    else if($('#ime').val().length > 30)
    {
        $('#errorIme').html('Molimo unesite maksimalno 30 karaktera.');
        $('#ime').addClass('tbError');
        valid1 = false;
    }
    else if(!regexIme.test($('#ime').val()))
    {
        $('#errorIme').html('Molimo unesite validno ime.');
        $('#ime').addClass('tbError');
        valid1 = false;
    }
    else
    {   
        $('#errorIme').html('');
        $('#ime').removeClass('tbError');
    }

    //prezime
    if($('#prezime').val() == '')
    {
        $('#errorPrezime').html('Molimo unesite Vaše prezime.');
        $('#prezime').addClass('tbError');
        valid1 = false;
    }
    else if($('#prezime').val().length > 30)
    {
        $('#errorPrezime').html('Molimo unesite maksimalno 30 karaktera.');
        $('#prezime').addClass('tbError');
        valid1 = false;
    }
    else if(!regexIme.test($('#prezime').val()))
    {
        $('#errorPrezime').html('Molimo unesite validno prezime.');
        $('#prezime').addClass('tbError');
        valid1 = false;
    }
    else
    {   
        $('#errorPrezime').html('');
        $('#prezime').removeClass('tbError');
    }

    //datum
    var regexDatum = /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})\.?$/
    if($('#datum').val() == '')
    {
        $('#errorDatum').html('Molimo unesite Vaš datum rođenja.');
        $('#datum').addClass('tbError');
        valid1 = false;
    }
    else if(!regexDatum.test($('#datum').val()))
    {
        $('#errorDatum').html('Molimo unesite validan datum.');
        $('#datum').addClass('tbError');
        valid1 = false;
    }
    else
    {   
        $('#errorDatum').html('');
        $('#datum').removeClass('tbError');
    }

    //email
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if($('#email').val() == '')
    {
        $('#errorEmail').html('Molimo unesite Vašu email adresu.');
        $('#email').addClass('tbError');
        valid1 = false;
    }

    else if(regex.test($('#email').val()) == false)
    {
        $('#errorEmail').html('Molimo unesite validnu email adresu.');
        $('#email').addClass('tbError');
        valid1 = false;
    }
    
    else
    {   
        $('#errorEmail').html('');
        $('#email').removeClass('tbError');
    }

    //telefon
    if($('#telefon').val() == '')
    {
        $('#errorTelefon').html('Molimo unesite Vaš broj telefona.');
        $('#telefon').addClass('tbError');
        valid1 = false;
    }
    else if($('#telefon').val().length > 20)
    {
        $('#errorTelefon').html('Molimo unesite validan broj telefona.');
        $('#telefon').addClass('tbError');
        valid1 = false;
    }
    else
    {   
        $('#errorTelefon').html('');
        $('#telefon').removeClass('tbError');
    }

    //majica
    var velicine = ["S", "M", "L", "XL", "XXL"];

    if(velicine.indexOf($('#majica').val()) == -1) // ne nalazi se u nizu
    {
        $('#errorMajica').html('Molimo izaberite jednu od ponuđenih veličina.');
        $('#majicaLista').addClass('tbError');
        valid1 = false;
    }
    else
    {   
        $('#errorMajica').html('');
        $('#majicaLista').removeClass('tbError');
    }

    // korak 2

    // korak 3

    if($('#pismo').val() == '')
    {
        $('#errorPismo').html('Molimo napišite Vaše motivaciono pismo.');
        $('#pismo').addClass('tbError');
        valid3 = false;
    }
    else
    {   
        $('#errorPismo').html('');
        $('#pismo').removeClass('tbError');
    }

    // korak 4

    // ranije ucesce

    var dane = ["DA", "NE"];

    if(dane.indexOf($('#ranije').val()) == -1) // ne nalazi se u nizu
    {
        $('#errorRanije').html('Molimo izaberite jednu od ponuđenih opcija.');
        $('#ranijeLista').addClass('tbError');
        valid4 = false;
    }
    else
    {   
        $('#errorRanije').html('');
        $('#ranijeLista').removeClass('tbError');
    }

    // trenutno

    if(dane.indexOf($('#trenutno').val()) == -1) // ne nalazi se u nizu
    {
        $('#errorTrenutno').html('Molimo izaberite jednu od ponuđenih opcija.');
        //$('#ranijeLista').addClass('tbError');
        valid4 = false;
    }
    else
    {   
        $('#errorTrenutno').html('');
        //$('#ranijeLista').removeClass('tbError');
    }

    // kakostesaznali

    var kako = ["Promocija na fakultetu", "Društvene mreže", "Mediji", "Web stranica", "Preporuka prijatelja", "Promotivni leci i plakati", "Ništa od navedenog"];

    if(kako.indexOf($('#kakostesaznali').val()) == -1) // ne nalazi se u nizu
    {
        $('#errorKako').html('Molimo izaberite jednu od ponuđenih opcija.');
        //$('#ranijeLista').addClass('tbError');
        valid4 = false;
    }
    else
    {   
        $('#errorKako').html('');
        //$('#ranijeLista').removeClass('tbError');
    }

    if(!valid1)
        $('#korak1').addClass('korakError');
    else
        $('#korak1').removeClass('korakError');
    
    if(!valid3)
        $('#korak3').addClass('korakError');
    else
        $('#korak3').removeClass('korakError');
    if(!valid4)
        $('#korak4').addClass('korakError');
    else
        $('#korak4').removeClass('korakError');

    if(!valid1 || !valid3 || !valid4)
        valid = false;


    if(!valid)    
    e.preventDefault();
});

 }); 