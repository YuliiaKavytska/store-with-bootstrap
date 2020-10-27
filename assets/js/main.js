var btnShowMore = document.querySelector('#show-more');
var siteUrl = "http://store.local/";
var numberPageInput = document.querySelector('#number-page');

btnShowMore.onclick = function(){
	var numPagI = Number(document.querySelector('#number-page').value);
	var quantity = document.querySelector('[name="quanitiy"]').value;
	
	// сморим сколько товаров нужно выводить. пердусмар=триваем число которое не делится на 6
	var num = 0;
	if(quantity - (numPagI + 1) * 6 >= 0){
		num = 6;
	}else{
		num = quantity % 6;
	}

	var ajax = new XMLHttpRequest();
		 ajax.open("GET", siteUrl + "modules/products/get-next-6.php?page=" + numPagI + "&number=" + num, false);
		 ajax.send();
	var bloks = document.querySelector('#products-block');
		 bloks.innerHTML = bloks.innerHTML + ajax.response;

	numberPageInput.value = Number(numberPageInput.value) + 1;
	
	// если все отображено скрывем кнопку
	if(quantity - numberPageInput.value * 6 <= 0){
		btnShowMore.style.display = "none";
	}
	// скролл для товаров
	document.documentElement.scrollTop = document.documentElement.offsetHeight - 950;	
	clickAddToBasket();
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

function clickAddToBasket(){
	document.querySelectorAll(".add-basket").forEach(function(link){
		link.onclick =  function(event){
			// сделать запрос на добавление в корзну
			// получить данніе об успешном добавлении
			// обновить информацию о корзине
			console.dir(link);
			var ajaxBasket = new XMLHttpRequest();
			ajaxBasket.open("POST", siteUrl + "modules/basket/add-basket.php?", false);
			ajaxBasket.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			ajaxBasket.send("id=" + link.dataset.id);
			var countBasket = document.querySelector("#count-basket");
			countBasket.innerText = Number(countBasket.innerText) + 1;
			console.log(ajaxBasket);
		}
	});
}
clickAddToBasket();

