<div class="title">
	<div class="container-fluid">
		<div class="row">
			<div class=" proba col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4">
				<a href="prijava.php"><img class="img-responsive prijavaSlika" src="./img/prijaviSe.png"></a>
				<p class="prijavaTekst">Prijave se zatvaraju 23.02.</p>
				<p class="prijavaTekst2">Prijave traju još</p>
				<div class="timerDiv">
					<?php include 'php/timer.php'; ?>
					<label class="timerBroj"><?php echo '0' . $dniInt ?><br><label class="timerTekst">DANA</label></label>
					<label class="timerDvotacka">:</label>
					<label class="timerBroj"><?php if($satiInt < 10) echo '0'; echo $satiInt ?><br><label class="timerTekst">SATI</label></label>
					<label class="timerDvotacka">:</label>
					<label class="timerBroj"><?php if($minuteInt < 10) echo '0'; echo $minuteInt ?><br><label class="timerTekst">MINUTA</label></label>

				</div>
			</div>
	        <div class="title-text ">
	        <div class="title-text-one">
	            <p>Besplatna trodnevna radionica ličnih i profesionalnih vještina</p>
	        </div>
	        <div class="title-text-two">
	            <p>Soft skills academy Sarajevo</p>
	        </div>
	        <div class="title-text-three">
	            <p>10-12. mart 2017. godine</p>
	        </div>
	        </div>

	        
		</div>
	</div>
</div>
