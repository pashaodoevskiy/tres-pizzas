<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>tres_pizzas. Para hombres con grandes maracas!!</title>
	<link rel="stylesheet" href="../../js/glidejs-master/dist/css/glide.core.css"><!--слайдер-->
	<link rel="stylesheet" href="../../js/glidejs-master/dist/css/glide.theme.css"><!--слайдер-->
	<link rel="stylesheet" href="../../css/grid.css"><!--grid-->
	<link rel="stylesheet" href="../../css/style.css"><!--css-->
	<link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet"><!--основной шрифт-->

	<script src="../../js/jquery-3.3.1.min.js"></script><!--jQUERY-->
	<script src="../../js/JQueryValidation/dist/jquery.validate.min.js"></script><!--валидатор форм-->
	<script src="../../js/jquery.inputmask.js"></script><!--валидатор телефона-->
	<script src="../../js/glidejs-master/dist/glide.js"></script><!--слайдер-->	
	<script src="../../js/main-scripts.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script><!--иконки-->
</head>
<body>
	<wrapper>
		<div class="flex-box-100 nav-bar-top">
			<div class="flex-box-25">
				<div class="logo-up">
					<a href="/">
						<img src="../../img/logo.gif" width="110px" alt="" title="tres_pizzas"><br>
						<img src="../../img/logo_text.png" width="210px" alt="" title="tres_pizzas">
					</a>					
				</div>
				<?php
					if ($_SESSION['auth'] == 1) {
						echo 
							'<div class="btn-setting">
								<a href="/setting"><i class="fas fa-cogs fa-2x"></i></a>
							</div>';
						}
				?>
			</div>
			<div class="flex-box-50 btn-location">
				<a href="map" >Карта доставки</a>
			</div>
			<div class="flex-box-25 icon-outer">
				<?php 
					
					if($_SESSION['auth'] != 0) {
						echo 
							'<div style="padding:5px; text-align:right;">
								<form action="auth" method="post">
									<input class="btn main-text" type="submit" value="Выход" name="exit">
								</form>
							</div>';
					} else {
						echo '<div style="padding:5px;text-align:right;"><a class="btn main-text" href="auth">Вход/регистрация</a></div>';
					}
				?>
				<div style="padding:5px; text-align:right;">
					<form action="/basket" method="post">
						<input class="btn main-text" type="submit" name="btn-basket" value="Корзина">
					</form>
				</div>
				<div style="padding:5px; text-align:right;">
					<a class="btn main-text" href="/">На главную</a>
				</div>
			</div>
		</div>
		<div class="flex-box-100" id="nav">
			<ul>
				<li><a href="/pizza">Пицца</a></li>
				<li><a href="/promo">Наборы</a></li>
				<li><a href="/drink">Напитки</a></li>
			</ul>
		</div>
		<script>
				
		jQuery(function($) {
	        $(window).scroll(function(){
	            if($(this).scrollTop()>150){
	                $('#nav').addClass('fixed');
	            }
	            else if ($(this).scrollTop()<150){
	                $('#nav').removeClass('fixed');
	            }
	        });
	    });
				
		</script>
	</wrapper>

	<?php include 'app/views/'.$content_view; ?>
		
	<footer>
		<div class="flex-box-100 red-stripe"></div>
			<div class="flex-box-100 nav-bar-footer">
				<div class="flex-box-25 logo-footer">
					<a class="" href="/">
						<img src="../../img/logo.gif" width="120px" alt="" title="tres_pizzas"><br>
					</a>
				</div>
				<div class="flex-box-25 footer-menu">
					<div class="col1">
						<a href="pizza">Пицца</a><br>
						<a href="promo">Наборы</a><br>
						<a href="drink">Напитки</a>
					</div>
				</div>
				<div class="flex-box-25 footer-menu">
					<div class="col2">
						<a href="terms_delivery">Как сделать заказ</a><br>
						<a href="map">Карта доставки</a><br>
						<a href="payment">Как оплатить заказ</a><br>
						<a href="feedback">Обратная связь</a>
					</div>
				</div>
				<div class="flex-box-25 footer-menu">
					<div class="footer-logo">
						<a href="#"><i class="fab fa-vk fa-2x"></i></a><br>
						<a href="#"><i class="fab fa-facebook-square fa-2x"></i></a><br>
						<a href="#"><i class="fab fa-instagram fa-2x"></i></a>
					</div> 	
				</div>
			</div>
	</footer>
</body>
</html>