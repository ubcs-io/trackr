// by leaving this commented, the default "active" is the dashboard
// $(".dashboard").hide();
$(".control").hide();

// minimize button size on small screen
if ( $(window).width() < 800) {   
	$(".affect").addClass("btn-sm"); 
	$(".affect").removeClass("btn-lg");
	$(".masthead-brand").hide();
	$(".headline").hide();
}

$( ".logo1" ).hover(
  function() {
    $( this ).append( $( "<span> <br> Control Panel</span>" ) );
  }, function() {
    $( this ).find( "span:last" ).remove();
  }
);


$(".dashboard-nav").click(
	function() {
		$(".control").hide();
		$(".page-disp").removeClass("active");
		$(this).addClass("active");
		$(".dashboard").show();
	}
)

$(".create-nav").click(
	function() {
		$(".dashboard").hide();
		$(".page-disp").removeClass("active");
		$(this).addClass("active");
		$(".control").show();
	}
)