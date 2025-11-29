window.onload = function () {
	var lookupBtn = document.getElementById("lookup");
	var countryInput = document.getElementById("country");
	var resultDiv = document.getElementById("result");

	lookupBtn.addEventListener("click", function () {
		var country = countryInput.value.trim();

		var xhr = new XMLHttpRequest();

		var url = "world.php";
		if (country !== "") {
			url += "?country=" + encodeURIComponent(country);
		}

		xhr.onreadystatechange = function () {
			if (xhr.readyState === 4 && xhr.status === 200) {
				resultDiv.innerHTML = xhr.responseText;
			}
		};

		xhr.open("GET", url, true);
		xhr.send();
	});
};	