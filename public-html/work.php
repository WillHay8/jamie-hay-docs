<?php 
$page = "work"; 
include('../dao.php');
$work_array = get_all_work();
$latest_cv_full_path = get_latest_cv_full_path();
$title = 'Past Work | Jamie Hay';
$description = 'A list of the television documentaries Jamie Hay has worked on during his carreer';
include('header.php');
?>

<div class="page" id="workPage">
<div class="heading-and-download-con">
	<div class="heading-con">
		<h1>Work</h1>
	</div>
	<div class="download-con">
		<a href="<?=$latest_cv_full_path?>" download><button>Download CV</button></a></p>
	</div>
</div>
<div class="pageContent">
<ul class="mainList">
<?php foreach($work_array as $work_item){ ?>
	<li><ul class="subList">
			<li class="programTitle"><?=$work_item['program_title']?></li>
			<li><?=$work_item['company']?></li>
			<li><?=$work_item['channel']?></li>
			<li><?=substr($work_item['date'],0,4)?></li>
	</ul></li>
<?php } ?>
</ul>
<div id="downloadCV">
	<p>For full list: <a href="<?=$latest_cv_full_path?>" download><button>Download CV</button></a></p>
</div>
</div>
</div>
<?php
include('footer.php');
?>