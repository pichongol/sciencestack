
<? 
//print_r($developer); exit; 
$gender = ($developer->gender == "M") ? 'He' : 'She';

?>

<h1 class="developer-title-main"><?=$developer->first_name?> <?=$developer->last_name?></h1>
<div class="developer-flag"><?=$countries[$developer->born_country]?>&nbsp;<img src="/img/flags/<?=strtolower($developer->born_country)?>.png" /></div>

<div class="container">
	<div class="row">
		<div class="col-md-8 developer-main">
			<h2>Biography</h2>
			<p><?=$developer->biography?></p>

			<hr />
			<h2 class="developer-projects-title">Projects <span>(sorted by relevance)</span></h2>
			<ul>
				<? 
				foreach($developer->projects as $t){ 

					$periodWorked = '';
					$finished_year = $t['_joinData']->finished_year;
					$start_date = $t['_joinData']->start_date;
					$end_date = $t['_joinData']->end_date;

					if($finished_year){
						$periodWorked = " on ".$finished_year;
					}
					else if($start_date && $end_date){
						$periodWorked = " from ".$start_date." until ".$end_date;
					}					
				?>
				<li>
					<span class="developer-project-name"><a href="/projects/view/<?=$t->id?>"><?=$t->name?></a></span>.<br />
					<?=$gender?> participated as <?=$roles[$t['_joinData']->rol_id]?> <?=$periodWorked?>.<br />
					<div class="developer-other-people">Other people involved on this project:</div>
					<ul>
					<? foreach($t['developers'] as $d) { ?>
					<li><a href="/developers/view/<?=$d['developer']->id?>"><?=$d['developer']->first_name.' '.$d['developer']->last_name?></a></li>
					<? } ?>
					</ul>
				</li>
				<? } ?>
			</ul>
		</div>
		<div class="col-md-4 developer-profile-sidebar">
			<div class="developer-img">
				<?=$developer->first_name?> <?=$developer->last_name?><br />
				<span class="developer-life-dates"><?=$this->Time->format($developer->born_date, "Y")?> - <?=$this->Time->format($developer->died_date, "Y")?></span>
			</div>
			<p><img src="/img/developers/<?=$developer->id?>.jpg" /></p>
		</div>
	</div>
</div>

<hr />
<footer>
<p>&copy; ScienceStack 2015</p>
</footer>