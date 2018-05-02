<script src="../../js/JQueryValidation/dist/jquery.validate.min.js"></script>

<div class="header-text-big"> 
	<span>Обратная связь</span> 
</div> 
<div class="main-text-black-big align-center"> 
	<span>У вас возникли вопросы или пожелания по качеству обслуживания?</span> 
</div> 
<form id="feedback-form" action="/feedback" method="post" class="align-center"> 
	<div><input class="textbox required" type="text" name="name" placeholder="Имя"></div> 
	<div><input class="textbox required" type="text" id="phone" name="phone" placeholder="Телефон"> </div> 
	<div><textarea class="textbox required" type="text" cols="50" rows="10" name="message" placeholder=""></textarea></div> 
	<div><input class="btn" type="submit" name="send" value="Отправить"></div> 
</form> 
<?= $data ?>