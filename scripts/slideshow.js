console.log('slideshow.js start');
window.setInterval(changeSlides,6000);
//window.setTimeout(changeSlides, 2000);	
var $slides = $('.slide');
var topSlideIndex = 0;
var nextSlideIndex = indexAfter(topSlideIndex);
var afterNextSlideIndex = indexAfter(nextSlideIndex);

setup();

function setLeft($topSlide){
	$topSlide.css('left', '-200px');
	
}

function setup(){
	$($slides[0]).addClass('topSlide');
	$($slides[1]).addClass('nextSlide');
	for(var i=2; i<$slides.length; i++){
		$($slides[i]).addClass('otherSlide');
	}
}

function changeSlides(){
	var $topSlide = $($slides[topSlideIndex]);
	var $nextSlide = $($slides[nextSlideIndex]);
	animateLeft($topSlide, $nextSlide);
}

function afterAnimation(){
	$topSlide = $($slides[topSlideIndex]);
	$nextSlide = $($slides[nextSlideIndex]);
	$afterNextSlide = $($slides[afterNextSlideIndex]);
	
	$topSlide.removeClass('topSlide');
	$topSlide.addClass('otherSlide');
	$nextSlide.removeClass('nextSlide');
	$nextSlide.addClass('topSlide');
	$afterNextSlide.removeClass('otherSlide');
	$afterNextSlide.addClass('nextSlide');
	$slides.css('opacity',1);
	$slides.css('left','0px');
	
	topSlideIndex = indexAfter(topSlideIndex);
	nextSlideIndex = indexAfter(topSlideIndex);
	afterNextSlideIndex = indexAfter(nextSlideIndex);
}

function indexAfter(index){
	index++;
	if(index>=$slides.length){
		index = 0;
	}
	return index;
}

var animationStartTime;
var leftOrigin;
var slideWidth;
var traverseTime = 1500;
var fadingTime = 400;

function animateLeft($topSlide, $nextSlide){
	animationStartTime = Date.now();
	leftOrigin = parseInt($topSlide.css('left'));
	slideWidth = $topSlide.width();
	var speed = slideWidth / traverseTime;
	animateLeftHelper($topSlide, $nextSlide, speed, fadingTime);
}

function animateLeftHelper($topSlide, $nextSlide, speed, fadingTime){	
	var currentTime = Date.now();
	var elapsedTime = currentTime - animationStartTime;
	var leftPosition = leftOrigin - elapsedTime*speed;
	$topSlide.css('left', leftPosition + 'px');
	$topSlide.css('opacity', 1 - elapsedTime/fadingTime);
	if($topSlide.css('opacity') <= 0 ||
		leftOrigin - parseFloat($topSlide.css('left')) >= slideWidth || elapsedTime>3000){
		afterAnimation();
		}
	else{
		window.requestAnimationFrame(function(){
			animateLeftHelper($topSlide, $nextSlide, speed, fadingTime);
		});
	}
}

