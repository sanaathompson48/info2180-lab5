window.onload = function () {

	var lookupBtn = document.getElementById("lookup");
	var lookupCitiesBtn = document.getElementById("lookup-cities");
	var countryInput = document.getElementById("country");
	var resultDiv = document.getElementById("result");

	lookupBtn.addEventListener("click", function () {
		var country = countryInput.value.trim();
		var xhr = new XMLHttpRequest();
		var url = "world.php?country=" + encodeURIComponent(country);

		xhr.onreadystatechange = function () {
			if (xhr.readyState === 4 && xhr.status === 200) {
				resultDiv.innerHTML = xhr.responseText;
			}
		};

		xhr.open("GET", url, true);
		xhr.send();
	});

	lookupCitiesBtn.addEventListener("click", function () {
		var country = countryInput.value.trim();
		var xhr = new XMLHttpRequest();
		var url = "world.php?lookup=cities&country=" + encodeURIComponent(country);

		xhr.onreadystatechange = function () {
			if(xhr.readyState === 4 && xhr.status === 200) {
				resultDiv.innerHTML = xhr.responseText;
			}
		};

		xhr.open("GET", url, true);
		xhr.send();
	});
};	