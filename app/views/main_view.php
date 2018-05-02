<slider>
	<div id="Glide" class="glide">
	<!--стрелки
		<div class="glide__arrows">
			<button class="glide__arrow prev" data-glide-dir="<">prev</button>
			<button class="glide__arrow next" data-glide-dir=">">next</button>
		</div>
	 -->
		<div class="glide__wrapper">
			<ul class="glide__track">
				<li class="glide__slide"><img style="width:100%" src="../../img/slider/1.jpg" alt=""></li>
				<li class="glide__slide"><img style="width:100%" src="../../img/slider/2.jpg" alt=""></li>
				<li class="glide__slide"><img style="width:100%" src="../../img/slider/3.jpg" alt=""></li>
			</ul>
		</div>

		<div class="glide__bullets"></div>

	</div>

	<script>
		$("#Glide").glide({
			type: "carousel",
			autoplay: 3000,
			//hoverpause: true,
		});
	</script>
</slider>

<div class="header-text-big">
	<span>Наше меню</span>
</div>
		
<?php

	foreach ($data as $key => $value) {
		echo '<div class="'.$key.'">'.$value.'</div>';
	}

?>
					

<div class="row flex-container promo-text">
	<span>Dos pizzas por 390 rublos!</span>
</div>	
<div class="row flex-container">
	<div class="flex-box-33 main-text-black column">
		<span>Неважно – тяжелый рабочий день или, наоборот, хорошее настроение -  ты имеешь полное право сделать свой день лучше. Лучше ровно на две пиццы за 390 рублей!</span>
	</div>	
	<div class="flex-box-33">
		<a href="promo"><img src="../../img/stock.png" width="500px" alt="( ·_· )"></a>
	</div>	
	<div class="flex-box-33 main-text-black-big">
		<span>Хочешь пиццу? А если Две? &macr\( ·_· )/&macr</span>
		<div class="promo-price"><span>390 rublos!</span></div>
		<div class="promo-price-white"><span>390 rublos!</span></div>
		<div class="promo-price"><span>390 rublos!</span></div>
		<div class="promo-price-white"><span>390 rublos!</span></div>
		<div class="promo-price"><span>390 rublos!</span></div>
		<div class="promo-price-white"><span>390 rublos!</span></div>
	</div>
</div>
