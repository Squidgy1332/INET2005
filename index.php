<?php
	$php_files = glob('*.php');
	$dirs = array_filter(glob('*'), 'is_dir');
?>
<h1> MyWeb Files/Folders </h1>
<ul>
<?php
	foreach($php_files as $file){
		echo "<li><a href='$file'>$file</a>.</li>";
	}
	foreach($dirs as $dir){
		if ($dir != "Image"){
			echo "<li><a href='$dir'>$dir</a>.</li>";
		}
	}
?>
</ul>