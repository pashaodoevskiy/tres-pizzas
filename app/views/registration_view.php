<div class="header-text-big">
	<span>Расскажите о себе</span>
</div>
<div class="align-center">
	<form id="reg-about" action="registration" method="post">
		<div><input class="textbox" type="text" name="f_name" placeholder="Имя"></div>
		<div><input class="textbox" type="text" name="l_name" placeholder="Фамилия"></div>
		<div><input id="phone" class="textbox" type="text" name="phone" placeholder="Телефон"></div>
		<?= $data['reg_a'] ?>
		<div><input class="btn" type="submit" value="Сохранить" name="save"></div>
	</form>
</div>