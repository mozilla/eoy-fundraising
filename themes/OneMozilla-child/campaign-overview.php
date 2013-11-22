<?php
/*
Template Name: Campaign Overview Page
*/
?>
<?php get_header('pages'); ?>

<style>
	body{
		font-family: "Open Sans Light", "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Calibri, sans-serif;
		font-size: 15px;
		overflow-x: hidden;
		line-height: 125%;
	}

	.wrap{
		overflow: hidden;
	}

	#page{
		padding: 0;
	}

	header{
		line-height: 200%;
	}

	b{
		font-family: "Open Sans", "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Calibri, sans-serif;
	}

	section{
		float: right;
		width: 50%;
	}

	.red-text{
		color: #DA5527;
	}	

	.light-grey-text{
		color: #888;
	}

	#brochure{
		overflow: hidden;
		/*background: #222;*/
		padding: 100px 0;
	}

	#brochure .title{
		font-size: 25px;
		margin-bottom: 25px;
		line-height: 150%;
		overflow: hidden;
	}

	#brochure .title > *{
		float: right;
	}

	#chart{
		position: relative;
		top: 120px;
	}

	#explanation{
		padding-left: 50px;
	}

	#list-table tbody td:nth-child(1){
		width: 30px;
	}

	#list-table tbody td:nth-child(2){
		padding-left: 10px;
		padding-bottom: 10px;
	}

	#letter{
		overflow: hidden;
		background: #4e9dd5;
		color: #fff;
		padding: 100px 0;
	}

	#letter header{
		font-size: 35px;
		margin-bottom: 15px;
	}

	#letter-content,
	#letter-cover{
		overflow: hidden;
		margin-bottom: 100px;
	}


	#letter-content .col{
		width: 48%;
		float: left;
	}

	#letter-content .col:first-of-type{
		margin-right: 2%;
	}

	#letter-content .col:last-of-type{
		margin-left: 2%;
	}

	#letter-author{
		position: relative;
		top: 40px;
	}

	#letter-cover .title{
		font-size: 60px;
		line-height: 125%;
		padding: 150px 55px;
	}

	#mozilla-wordmark{
		position: absolute;
		right: 0;
		bottom: 0;
	}

	.all-cap{
		text-transform: uppercase;
	}

	.clear{
		clear: both;
	}


	@media only screen and (max-width: 767px) {
		section{
			width: 100%;
		}

		#chart{
			position: static;
			top: 0;
			margin-top: 100px;
		}

		#explanation{
			padding: 0;
		}

		#letter-cover .title{
			padding-left: 0;
			padding-right: 0;
		}

		#mozilla-wordmark {
		    position: relative;
		    bottom: 220px;
		    float: right;
		}

	}

	/*  @Tablet @Layout: 768px */
	@media only screen and (min-width: 768px) and (max-width: 991px) {
		#letter-cover .title{
			font-size: 40px;
		}
	}

	/*  @Narrow @Mobile @Layout: 480px */
	@media only screen and (min-width: 320px) and (max-width: 479px) {
		#brochure .title,
		#letter-cover .title{
			font-size: 40px;
		}
	}

</style>

<div id="brochure">
	<div class="wrap">
		<section>
			<div id="explanation">
				<div class="title">
					<div class="red-text" style="font-size:20px; position:relative; top:10px"><b>Mozilla</b></div>
					<b>End of Year Fundraising Campaign</b><br/>
					<div class="red-text" style="font-size:32px"><b>2013</b></div>
				</div>
				<div class="clear"></div>
				<p>
					2013 will see Mozilla launch its first large-scale, end of year fundraising campaign. Our design builds from the community conversations - in person, on the phone, and through surveys - we've held over the past year.
				</p>
				<table id="list-table">
					<tbody>
						<tr>
							<td><img src="/wp-content/uploads/2013/11/num1.png" /></td>
							<td>Each month will focus on one of the themes behind our mission: flight, make, and empower.</td>
						</tr>
						<tr>
							<td><img src="/wp-content/uploads/2013/11/num2.png" /></td>
							<td>A blog post by a senior executive will set the tone and provide language for the proceeding outreach across our channels.</td>
						</tr>
						<tr>
							<td><img src="/wp-content/uploads/2013/11/num3.png" /></td>
							<td>The frequency of communication will ramp up as we near the end of December, culminating on the 30th, the biggest day of the year for campaign fundraising.</td>
						</tr>
					</tbody>
				</table>
				<div class="clear"></div>
				<p>
					We're fortunate to have new leadership behind this year's efforts, including a senior executive joining us from Change.or.  We have also engaged M+R Strategic Services, who advise Wikimedia's fundraising.
				</p>
				<p>
					We're committed to making the 2013 campaign a success and hope that you'll join us in making it the biggest and best yet.
				</p>
				<div style="margin-top: 60px; font-size: 13px">
					<span class="light-grey-text">For detailed information visit:</span> <a href="http://mzl.la/eoy2013" target="_blank">mzl.la/eoy2013</a><br/>
					<span class="light-grey-text">To ask questions or get involved, e-mail</span> <a href="mailto:devteam@mozillafoundation.org?Subject=2013%20End%20of%20Year%20Fundraising%20Campaign" target="_top">devteam@mozillafoundation.org</a>
				</div>
			</div>
		</section>
		<section>
			<div id="chart">
				<img src="/wp-content/uploads/2013/11/Mozilla-EOY-Campaign-Final-big.png" />
			</div>
		</section>
	</div>
</div>


<div id="letter">
	<div class="wrap">
		<section>
			<div id="letter-cover">
				<div class="title" class="all-cap">
					<b>2013</b> <br/>
					END OF YEAR <br/>
					FUNDRAISING <br/>
					CAMPAIGN <br/>
				</div>
			</div>
			<img src="/wp-content/uploads/2013/11/mozilla.png" id="mozilla-wordmark" />
		</section>
		<section>
			<div id="letter-content">
				<header class="all-cap">Why this matters</header>
				<div class="col">
					<p>
						<b>I love Mozilla.</b> I've made the web my life's work and I came here because I saw my values reflected in the Manifesto.
					</p>
					<p>
						That's why we're all here: to keep the web open. To take on new challenges and grow Mozilla's legacy.
					</p>
					<p>
						We're in a fight to decide who gets to build the future of the web. And we're up against people with orders of magnitude more time, money, and resources than we have.
					</p>
					<p>
						The beauty of our project has always been that we can do more with less.  When we win, it's because of the people who contribute to the mission.
					</p>
					<p>
						But as the importance of our mission grows - as the web faces new threats - we need to seize every advantage we have, build our resource base, and create new ways to contribute.
					</p>
				</div>
				<div class="col">
					<p>
						We're going to need millions more people who not only care about the web, but contribute to keep it open - educators, coders, webmakers, and activists.
					</p>
					<p>
						We also need more people to contribute money. Donations increase our chance of success, fund programs that teach and advocate for the web, and show that we're different.  They show we're proudly non-profit.
					</p>
					<p>
						A community of Mozillians is already working to make this year's end of year campaign the best yet. The inside of this brochure provides an overview of our plans.  We'll need your support to make it successful. Let's keep making the web open and awesome for everyone.
					</p>
					<p id="letter-author">
						<b>Mark Surman</b><br/>
						Executive Director<br/>
						Mozilla
					</p>
				</div>
			</div>
			<img src="/wp-content/uploads/2013/11/letter-chart.png" />
		</section>
	</div>
</div>

<?php get_footer('pages'); ?>
