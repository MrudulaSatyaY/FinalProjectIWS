$('.dropdown').on('show.bs.dropdown', function(e){
	$(this).find('.dropdown-menu').first().stop(true,true).slideDown(300);
});

$('.dropdown').on('hide.bs.drop',function(e){
	$(this).find('.dropdown-menu').first().stop(true,true).slideUp(200);
});


 function bookmark_color()
 {
 	var x = document.getElementById("bookmark_button");
 	x.style.color = 'blue';
 }

 function star1_color()
 {
 	var y = document.getElementById("star1");
 	y.style.color = 'gold';
 	var y = document.getElementById("star2");
 	y.style.color = 'black';
 	var y = document.getElementById("star3");
 	y.style.color = 'black';
 	var y = document.getElementById("star4");
 	y.style.color = 'black';
 	var y = document.getElementById("star5");
 	y.style.color = 'black';
 }
 function star2_color()
 {
 	var y = document.getElementById("star1");
 	y.style.color = 'gold';
 	var y = document.getElementById("star2");
 	y.style.color = 'gold';
 	var y = document.getElementById("star3");
 	y.style.color = 'black';
 	var y = document.getElementById("star4");
 	y.style.color = 'black';
 	var y = document.getElementById("star5");
 	y.style.color = 'black';
 }
 function star3_color()
 {
 	var y = document.getElementById("star1");
 	y.style.color = 'gold';
 	var y = document.getElementById("star2");
 	y.style.color = 'gold';
 	var y = document.getElementById("star3");
 	y.style.color = 'gold';
 	var y = document.getElementById("star4");
 	y.style.color = 'black';
 	var y = document.getElementById("star5");
 	y.style.color = 'black';
 }
 function star4_color()
 {
 	var y = document.getElementById("star1");
 	y.style.color = 'gold';
 	var y = document.getElementById("star2");
 	y.style.color = 'gold';
 	var y = document.getElementById("star3");
 	y.style.color = 'gold';
 	var y = document.getElementById("star4");
 	y.style.color = 'gold';
 	var y = document.getElementById("star5");
 	y.style.color = 'black';
 }
 function star5_color()
 {
 	
 	var y = document.getElementById("star5");
 	y.style.color = 'gold';
 	var y = document.getElementById("star1");
 	y.style.color = 'gold';
 	var y = document.getElementById("star2");
 	y.style.color = 'gold';
 	var y = document.getElementById("star3");
 	y.style.color = 'gold';
 	var y = document.getElementById("star4");
 	y.style.color = 'gold';
 }
