<div class="header-text-big" style="margin-bottom:60px;">
	<span>Авторизация</span>
</div>
<div class="flex-container">
	<div class="flex-box-50 border-right">
		<div class="main-text-black-big align-center">
			<span>Войдите в личный кабинет</span>
		</div>
		<div class="align-center">
			<form id="auth-form" action="auth" method="post">
				<div><input class="textbox" type="text" name="lgn" placeholder="Логин"></div>
				<div><input class="textbox" type="password" name="psw" placeholder="Пароль"></div>
				<?= $data['auth'] ?>
				<div><input class="btn" type="submit" value="Войти в личный кабинет" name="auth"></div>
			</form>
		</div>
	</div>
	<div class="flex-box-50">
		<div class="main-text-black-big align-center">
			<span>или зарегистрируйтесь</span>
		</div>
		<div class="align-center">
			<form id="registration-form" action="auth" method="post">
				<div><input class="textbox" type="text" name="lgn_a" placeholder="Логин"></div>
				<div><input class="textbox" type="password" name="psw_a" placeholder="Пароль"></div>
				<div><input class="textbox" type="text" name="mail" placeholder="E-mail"></div>
				<?= $data['reg'] ?>
				<div><input class="btn" type="submit" value="Зарегистрироваться" name="reg"></div>
			</form>
		</div>
	</div>
</div>