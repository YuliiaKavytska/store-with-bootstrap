var siteUrl = "http://store-master.zzz.com.ua/admin/";
document.querySelectorAll(".status-change").forEach(function(select){
	select.oninput = function(){
		var ajax = new XMLHttpRequest();
			 ajax.open("POST", siteUrl + "options/orders/change-status.php", false);
			 ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			 ajax.send("id=" + select.dataset.id + "&value=" + select.value);
	}
});