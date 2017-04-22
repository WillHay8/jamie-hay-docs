console.log('main.js start')
adjustHeaderImg();
window.addEventListener('resize',identifyChange);
$('#menuButton').on('click', toggleMenu);

function toggleMenu(){
	console.log('toggle menu');
	$menu = $('.menu');
	$menu.toggle();
}