function getXMLHttpRequest()
{
    if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
    }

    return new ActiveXObject('Microsoft.XMLHTTP');
}
//корзина
request = getXMLHttpRequest();

request.onreadystatechange = function() {
	if (request.readyState == 4) {
		alert(request.responseText);
	}
};

function updateFile(obj)
{
	params = obj.name + '=' + obj.value;

	request.open('POST', '/basket', true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send(params);
}

//меню
jQuery(function($) {
	$(window).scroll(function(){
		if($(this).scrollTop()>140){
			$('#navigation').addClass('fixed');
		}
		else if ($(this).scrollTop()<140){
			$('#navigation').removeClass('fixed');
		}
	});
});

//валидация формы обратной связи
$(document).ready(function(){
$("#feedback-form").validate({
// правила для полей 
   rules:{ 
		name:{
			required: true, // поле для имени обязательное для заполнения
		},
		phone:{
			required: true,
		},
	   message:{
		   required: true,
	   },
   },
  // сообщение если что-то было не по правилам
       messages:{
            name:{
                required: "<div class='alert-message'>Это поле обязательно для заполнения</div>", // сообщение, если поле не заполнено
            },
            phone:{
                required: "<div class='alert-message'>Это поле обязательно для заполнения</div>",
            },
		   message:{
			   required: "<div class='alert-message'>Это поле обязательно для заполнения</div>",
		 	}
       }
    });
});

//валидация формы аутентификации
$(document).ready(function(){
$("#auth-form").validate({
// правила для полей 
   rules:{ 
		lgn:{
			required: true, // поле для имени обязательное для заполнения
		},
		psw:{
			required: true,
		},
   },
  // сообщение если что-то было не по правилам
       messages:{
       		lgn:{
                required: "<div class='alert-message'>Это поле обязательно для заполнения</div>", // сообщение, если поле не заполнено
            },
            psw:{
                required: "<div class='alert-message'>Это поле обязательно для заполнения</div>",
            },
	   }
    });
});

//валидация формы регистрации
$(document).ready(function(){
$("#registration-form").validate({
// правила для полей 
   rules:{ 
		lgn_a:{
			required: true, // поле для имени обязательное для заполнения
			minlength: 3,
		},
		psw_a:{
			required: true,
			minlength: 6,
		},
	   mail: {
		   required: true,
		   email: true,
	   },
   },
  // сообщение если что-то было не по правилам
       messages:{
       		lgn_a:{
                required: "<div class='alert-message'>Это поле обязательно для заполнения</div>", // сообщение, если поле не заполнено
				minlength: "<div class='alert-message'>Слишком короткое имя</div>",
            },
            psw_a:{
                required: "<div class='alert-message'>Это поле обязательно для заполнения</div>",
				minlength: "<div class='alert-message'>Слишком короткий пароль</div>",
            },
		   mail: {
			   required: "<div class='alert-message'>Это поле обязательно для заполнения</div>",
			   email: "<div class='alert-message'>Введите корректный e-mail</div>",
			   
		   },
	   }
    });
});

//валидация формы регистрации о себе
$(document).ready(function(){
$("#reg-about").validate({
// правила для полей 
   rules:{ 
		f_name:{
			required: true, // поле для имени обязательное для заполнения
			minlength: 2,
		},
	   phone: {
		   required: true,
	   },
   },
  // сообщение если что-то было не по правилам
       messages:{
       		f_name:{
                required: "<div class='alert-message'>Это поле обязательно для заполнения</div>", // сообщение, если поле не заполнено
				minlength: "<div class='alert-message'>Слишком короткое имя</div>",
            },
            phone:{
                required: "<div class='alert-message'>Это поле обязательно для заполнения</div>",
            },
	   }
    });
});

//валидация данных в корзине
$(document).ready(function(){
$("#basket-form").validate({
// правила для полей 
   rules:{ 
		name:{
			required: true, // поле для имени обязательное для заполнения
		},
	   phone: {
		   required: true,
	   },
   },
  // сообщение если что-то было не по правилам
       messages:{
       		name:{
				required: "<div class='alert-message'>Это поле обязательно для заполнения</div>",
			},
		   phone: {
			   required: "<div class='alert-message'>Это поле обязательно для заполнения</div>",
		   },
	   }
    });
});
//мобильный телефон
$(document).ready(function() {
	$("#phone").inputmask("+7(999)999-99-99")
});