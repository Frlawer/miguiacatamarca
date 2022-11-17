<?php
require_once('./clases/ads.php');
$ads = new Ads();
$ads->select();
foreach ($ads->rows as $key => $value) {?>
	<a href="<?php echo $value['url'] ?>">
		<img src="images/u/<?php echo $value['img'] ?>.jpg" class="12u">
	</a>

<?php }
?>