<?php
/**
 * Sniffing Dog Sports - Public Sidebar section
 * July 2016 by Harley H. Puthuff
 * Copyright 2016, Sniffing Dog Sports, Ltd.
 */
include_once("classes/SDS.php");
?>

<!--public sidebar content-->

<div class="plaque">
	<div class="headline">About this site ...</div>
	<div class="content">
	<p>Since Sniffing Dog Sports, LLC is a membership organization, this site serves
		as the members' portal for our handlers, dogs, trials, news &amp; features.</p>
	<p>Here a member can login and review their profile, review and add to their
		roster of dogs, and review/enter competition trials.</p>
	<p>Sufficient scores at	those trials result in the awarding of titles for the various
		levels</p>
	<div class="panel panel-default">
	<div class="panel-heading"> <span
		class="glyphicon glyphicon-list-alt"></span><b>News &amp; Events</b></div>
	<div class="panel-body">
		<div class="row"><div class="col-xs-12">
		<ul class="newsitems">
			<li class="news-item">
				<span class="glyphicon glyphicon-calendar"></span>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				Nullam in venenatis enim... <a href="#">Read more...</a>
			</li>
			<li class="news-item">
				<span class="glyphicon glyphicon-calendar"></span>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				Nullam in venenatis enim... <a href="#">Read more...</a>
			</li>
			<li class="news-item">
				<span class="glyphicon glyphicon-calendar"></span>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				Nullam in venenatis enim... <a href="#">Read more...</a>
			</li>
			<li class="news-item">
				<span class="glyphicon glyphicon-calendar"></span>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				Nullam in venenatis enim... <a href="#">Read more...</a>
			</li>
			<li class="news-item">
				<span class="glyphicon glyphicon-calendar"></span>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				Nullam in venenatis enim... <a href="#">Read more...</a>
			</li>
			<li class="news-item">
				<span class="glyphicon glyphicon-calendar"></span>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				Nullam in venenatis enim... <a href="#">Read more...</a>
			</li>
			<li class="news-item">
				<span class="glyphicon glyphicon-calendar"></span>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				Nullam in venenatis enim... <a href="#">Read more...</a>
			</li>
			<li class="news-item">
				<span class="glyphicon glyphicon-calendar"></span>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				Nullam in venenatis enim... <a href="#">Read more...</a>
			</li>
		</ul>
		</div></div>
	</div>
	<div class="panel-footer"> </div>
	</div>
	</div>
	<br>
	</div>

<script type="text/javascript">
$(".newsitems").bootstrapNews({
	newsPerPage: 5,
	autoplay: true,
	pauseOnHover:true,
	direction: 'up',
	newsTickerInterval: 4000,
	onToDo: function (){}
	});
</script>
