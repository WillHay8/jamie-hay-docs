
var $headerImg = $('#headerImg');
var $headerImgBack = $('#headerImgBack');
const WIDE = {NAME: 'wide', MINWIDTH: 1024, HEADERIMGHEIGHT: 250};
const MEDIUM = {NAME: 'medium', MINWIDTH: 701, HEADERIMGHEIGHT: 200};
const SMALL = {NAME: 'small', MINWIDTH: 0, HEADERIMGHEIGHT: 150};
const STYLESHEETS = {WIDE: WIDE, MEDIUM: MEDIUM, SMALL: SMALL};
const ORIGINALIMGRATIO = 338/1280;
var currentStylesheet = identifyStylesheet();
var windowWidth;
var menuBottom;



function identifyChange(){
	var newStylesheet = identifyStylesheet();
	if(newStylesheet !== currentStylesheet){
		currentStylesheet = newStylesheet;
		adjustHeaderImg();
	}
	else{
		adjustHeaderImg();
	}
}

function identifyStylesheet(){
	windowWidth = window.innerWidth;
	if(windowWidth >= 1024){
		return STYLESHEETS.WIDE;
	}
	else if(windowWidth >= 701){
		return STYLESHEETS.MEDIUM;
	}
	else{
		return STYLESHEETS.SMALL;
	}	
}

function adjustHeaderImg(){
	menuBottom = parseInt($('#headerBar').css('height'));
	if(currentStylesheet === STYLESHEETS.WIDE){
		stretchWidthAndCropHeight();
	}
	else if(currentStylesheet === STYLESHEETS.MEDIUM){
		const IMGWIDTHFORMEDIUMSTYLE = 1023;
		fixSizeOverflowWidthAndCropHeight(IMGWIDTHFORMEDIUMSTYLE);
	}
	else{
		const IMGWIDTHFORSMALLSTYLE = 700;
		fixSizeOverflowWidthAndCropHeight(IMGWIDTHFORSMALLSTYLE);
	}
	$headerImg.show();
}

function fixSizeOverflowWidthAndCropHeight(imgWidth){

	//fix width

	$headerImg.css('width', imgWidth+'px');
	$headerImg.css('height', imgWidth*ORIGINALIMGRATIO+'px');

	//overflow width
	var shiftLeft = (imgWidth - window.innerWidth)/2;
	$headerImg.css('left', -shiftLeft);

	//crop height
	var headerImgHeight = parseInt($headerImg.css('height'));
	var clipAmount = (headerImgHeight-currentStylesheet.HEADERIMGHEIGHT)/2;
	var clipLine = 'rect('+clipAmount+'px, auto,'+ (headerImgHeight-clipAmount)+'px, auto)';
	$headerImg.css('clip', clipLine);
	$headerImg.css('top', menuBottom-clipAmount+'px');
}

function stretchWidthAndCropHeight(){
	$headerImg.css('width', windowWidth+'px');
	$headerImg.css('height', windowWidth*ORIGINALIMGRATIO+'px');
	var headerImgHeight = parseInt($headerImg.css('height'));
	var clipAmount = (headerImgHeight-currentStylesheet.HEADERIMGHEIGHT)/2;
	var clipLine = 'rect('+clipAmount+'px, auto,'+ (headerImgHeight-clipAmount)+'px, auto)';
	$headerImg.css('clip', clipLine);
	$headerImg.css('top', menuBottom-clipAmount+'px');
	$headerImg.css('left', 0);
}

