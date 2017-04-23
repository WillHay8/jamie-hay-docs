console.log('main.js start')

$('#menuButton').on('click', toggleMenu);

function toggleMenu(){
	console.log('toggle menu');
	$menu = $('.menu');
	$menu.toggle();
}