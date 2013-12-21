<?php
/*
Template Name: Bitcoin Page
*/
?>
<?php get_header('bitcoin'); ?>

<style>
	body{
		font-family: "Open Sans", "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Calibri, sans-serif;
		font-size: 15px;
		overflow-x: hidden;
	}

	#masthead{
		padding: 0;
	}

	.wrap{
		overflow: hidden;
	}

	#page{
		padding: 0;
	}

	#bitcoin{
		padding-bottom: 200px;
	}

	b{
		font-family: "Open Sans", "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Calibri, sans-serif;
	}

	.red-text{
		color: #DA5527;
	}	

	.light-grey-text{
		color: #888;
	}

	#bitcoin-logo{
		position: absolute;
		top: 140px;
		right: 0;
		width: 500px;
		height: 500px;
		opacity: 0.7;
	}

	#donate-form{
		color: #fff;
		background: rgba(0,0,0,0.9);
		float: left;
		width: 30%;
		margin-right: 25px;
		padding: 0 15px;
	}

	#donate-form section{
		margin: 15px 0;
	}

	#donate-today,
	#pay-with-bitcoin{
		font-size: 25px;
		font-weight: bold;
	}

/*	#donate-form input[type="text"]{
		background: white;
		color: #000;
		margin: 5px 0;
		border: none;
	}*/

	#donate-form #disclaimer{
		font-size: 10px;
	}

	
	#donate-form #coinbase-btn{
		float: right;
		margin-bottom: 50px;
	}

	#coinbase-privacy-policy{
		font-size: 10px;
		position: relative;
		top: -10px;
		float: right;
	}

	#description{
		float: left;
		width: calc( 70% - 55px );
		font-size: 25px;
	}

	#description header{
		font-weight: bold;
		font-size: 40px;
	}

	@media only screen and (min-width: 320px) and (max-width: 991px) {
		#donate-form{
			clear: both;
			width: calc( 100% - 30px );
			margin-right: 0;
		}

		#description{
			clear: both;
			width: calc( 100% - 30px );
			font-size: 15px;
			margin-top: 15px;
		}

		#description header{
			font-size: 25px;
		}
	}

</style>

<div id="bitcoin">
	<div class="wrap">	
		<div id="donate-form">
			<section>
				<header id="donate-today">Donate today</header>
				We are a non-profit and rely on donations.  If you like the work that Mozilla does to protect the web, you can support us with Bitcoin donations!
			</section>
			<section>
				<header id="pay-with-bitcoin">Pay with Bitcoin</header>
				Your donations are tax deductible in USD equivalent. You'll get a receipt.
			</section>
			<section>
				<div id="disclaimer"><b>Disclaimer:</b> we are not responsible for evil stuff that may happen.  By using Coinbase, you agree to their terms of conditions. </div>
			</section>
			<section id="coinbase-btn">
				<a class="coinbase-button" data-code="4d4b84bbad4508b64b61d372ea394dad" href="https://coinbase.com/checkouts/4d4b84bbad4508b64b61d372ea394dad">Pay With Bitcoin</a>
				<script src="https://coinbase.com/assets/button.js" type="text/javascript"></script>
				<br/><a href="" id="coinbase-privacy-policy">Coinbase privacy policy</a>
			</section>
		</div>
		<div id="description">
			<header>Donate Bitcoin to Mozilla</header>
			<p>In response to community demand, we're happy to announce that Mozilla will be accepting Bitcoin donations through our website.</p>
			<p>While we are accepting Bitcoin donations, we're not endorsing Bitcoin or any other cryptocurrency. When you donate Bitcoin to Mozilla, they'll be converted to cash immediately on receipt.</p>
			<div id="old-fashion">
				If you prefer, you can also <a href="//sendto.mozilla.org/page/contribute/EOYFR2013-newdefault?source=bitcoin_payment">donate the old fashion way</a>.
			</div>
		</div>
	</div>	
</div>

<?php get_footer('bitcoin'); ?>
