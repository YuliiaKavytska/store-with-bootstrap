var btnShowMore = document.querySelector('#show-more');
var siteUrl = "http://store.local/";
var numberPageInput = document.querySelector('#number-page');
if(btnShowMore){
	btnShowMore.onclick = function(){
		var numPagI = Number(document.querySelector('#number-page').value);
		var quantity = document.querySelector('[name="quanitiy"]').value;
		
		// сморим сколько товаров нужно выводить. пердусматриваем число которое не делится на 6
		var num = 0;
		if(quantity - (numPagI + 1) * 6 >= 0){
			num = 6;
		}else{
			num = quantity % 6;
		}
	
		// делаем запрос и передаем данные
		var ajax = new XMLHttpRequest();
			 ajax.open("GET", siteUrl + "modules/products/get-next-6.php?page=" + numPagI + "&number=" + num, false);
			 ajax.send();
		// дозаписываем полученные карточки
		var bloks = document.querySelector('#products-block');
			 bloks.innerHTML = bloks.innerHTML + ajax.response;
		// изменяем значение скрытого инпута (текущей страницы)
		numberPageInput.value = Number(numberPageInput.value) + 1;
		
		// если все отображено скрывем кнопку
		if(quantity - numberPageInput.value * 6 <= 0){
			btnShowMore.style.display = "none";
		}
		// скролл для товаров
		document.documentElement.scrollTop = document.documentElement.offsetHeight - 950;	
		// если создали карточки вызываем обработчик событий на клик
		clickAddToBasket();
	}
}


// при клике на кнопку страницы делать гет запрос на изменение товаров
var paginPage = document.querySelector("#pagin-pages");
document.querySelectorAll('[name=pagin-pages]').forEach(function(button){
	button.addEventListener('click', function(){

		var query = new XMLHttpRequest();
		 query.open("GET", siteUrl + button.dataset.link, false);
		 query.send();

		// предусматриваем клик на показать еще. переписываем велью страницы.
		numberPageInput.value = Number(button.innerText);
		// переписываем
		var bloks = document.querySelector('#products-block');
		bloks.innerHTML = query.response;
		// анимация вверх
		up();
	});
});

//Скролл вверх. плавный
function up() {
	var top = Math.max(document.body.scrollTop,document.documentElement.scrollTop);
	var t;
	if(top > 0) {
		window.scrollBy(0, -10);
		t = setTimeout('up()', 20);
	} else clearTimeout(t);
	return false;
}

// функция обработчик по клику на добавление в корзину
function clickAddToBasket(){
	document.querySelectorAll(".add-basket").forEach(function(link){
		link.onclick =  function(event){
			// сделать запрос на добавление в корзну
			// получить данніе об успешном добавлении
			// обновить информацию о корзине
			
			// делаем запрос и передаем айди карточки
			var ajaxBasket = new XMLHttpRequest();
				 ajaxBasket.open("POST", siteUrl + "modules/basket/add-basket.php", false);
				 ajaxBasket.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				 ajaxBasket.send("id=" + link.dataset.id);

			// перезаписываем количество товаров на корзине
			var countBasket = document.querySelector("#count-basket");
				 countBasket.innerText = Number(countBasket.innerText) + 1;
		}
	});
}
clickAddToBasket();

// Delete stuffs from the basket

function deleteProductBasket(obj, id, quant){
	var ajax = new XMLHttpRequest();
		 ajax.open("POST", siteUrl + "modules/basket/delete.php", false);
		 ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		 ajax.send("id=" + id );

	obj.parentNode.parentNode.remove();
	// перезаписываем количество товаров на корзине
	var countBasket = document.querySelector("#count-basket");
		 countBasket.innerText = Number(countBasket.innerText) - quant;
}