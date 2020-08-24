document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.collapsible').collapsible();
  });


  $(document).ready(function(){
      $('.datepicker').datepicker();
    });

    $(document).ready(function(){
    $('select').formSelect();
  });
  
  document.addEventListener('DOMContentLoaded', function() {
    var floatingActionButton = document.querySelectorAll('.fixed-action-btn');
    var ActionButton = M.FloatingActionButton.init(floatingActionButton, {
      direction: 'left',
      hoverEnabled: false
    });
  });
              
 $(document).ready(function(){
    $('.tabs').tabs();
  });

// Print Data
    function printDoc() {
      var toPrint = document.getElementById('printCard');
      var popupWin = window.open(''); 

      popupWin.document.open();
      popupWin.document.write('<html><link rel="stylesheet" type="text/css" href="http://localhost/itclub/assets/css/style.css" /> </head><body onload="window.print()">');
      popupWin.document.write('<html><link rel="stylesheet" type="text/css" href="http://localhost/itclub/assets/css/materialize.css" /></head><body onload="window.print()">');
      popupWin.document.write('<html><link rel="stylesheet" type="text/css" href="http://localhost/itclub/assets/css/materialize.min.css" /></head><body onload="window.print()">');
      popupWin.document.write('<html><link rel="stylesheet" type="text/css" href="http://localhost/itclub/assets/vendor/fontawesome-free/css/all.min.css" /></head><body onload="window.print()">');
      popupWin.document.write('</html>');
      popupWin.document.write(toPrint.outerHTML);
      popupWin.document.close(); 
    }



/*--This JavaScript method for Print Preview command--*/
    function printPreview() {
        var toPrint = document.getElementById('printCard');
        var popupWin = window.open('');

        popupWin.document.open();
        popupWin.document.write('<html><link rel="stylesheet" type="text/css" href="http://localhost/itclub/assets/css/style.css" media="screen"/></head><body">');
        popupWin.document.write('<html><link rel="stylesheet" type="text/css" href="http://localhost/itclub/assets/css/materialize.css"" media="screen"/></head><body">');
        popupWin.document.write('<html><link rel="stylesheet" type="text/css" href="http://localhost/itclub/assets/vendor/fontawesome-free/css/all.min.css" media="screen"/></head><body">');
        popupWin.document.write('</html>');
        popupWin.document.write(toPrint.outerHTML);
        popupWin.document.close();
    }
// tutup print

// Carousel

 $('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true
  });

  // Slider
$(document).ready(function(){
    $('.slider').slider();
  });


  $(document).ready(function(){
    $('.scrollspy').scrollSpy();
  });

    $(document).ready(function(){
    $('.carousel').carousel();
  });
      

 
  $(document).ready(function(){
    $('.modal').modal();
  });

   $('.dropdown-trigger').dropdown();

     $(document).ready(function(){
    $('.tooltipped').tooltip();

    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
  });



 
    
