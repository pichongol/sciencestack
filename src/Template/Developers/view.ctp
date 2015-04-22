
<? //print_r($developer) ?>

<h1><?=$developer->first_name?> <?=$developer->last_name?></h1>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h2>Biography</h2>
			<p><?=$developer->biography?></p>
		</div>
		<div class="col-md-4">
			<h2>Heading</h2>
			<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
			<p><a role="button" href="#" class="btn btn-default">View details »</a></p>
		</div>
	</div>
</div>

<hr />
<footer>
<p>&copy; ScienceStack 2015</p>
</footer>