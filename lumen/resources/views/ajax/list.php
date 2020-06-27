<?php
foreach ($data as $list) {
	?>
	<li class="list-group-item">
		<ul>
			<?php
			foreach ($list as $key => $value) {
				?>
				<li><?=$key?> : <?=$value?></li>
				<?php
			}
			?>
		</ul>
		<button class="view" data-id="<?=$list['id']?>" id="view<?=$list['id']?>">View</button>
	</li>
	<?php
}
?>