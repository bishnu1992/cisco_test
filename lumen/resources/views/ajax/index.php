<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script><script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
</head>
</head>
<body>

	<ul id='list' class="list-group">
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
	</ul>
	<script>
		$(document).ready(function(){

			$('.view').on('click', function(){
				var id = $(this).data("id")
				$.ajax({
					type:"POST",
					url:"http://localhost/cisco_test/lumen/public/routes",
					data:{"where":{"id":id}},
					dataType:"json",
					success: function(response){
						console.log(response)
					}
				})
			});

		});

	</script>
</body>
</html>