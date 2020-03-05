/********** JS *****************/
jQuery(function($) {

  if( $(".status").text().includes("development") ){
    $(".status").css("visibility", "hidden");
    $(".status").css("height", "0px");
  }

});
