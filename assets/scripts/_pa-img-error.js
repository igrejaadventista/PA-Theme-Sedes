function pa_img_error() {
	var images = document.querySelectorAll("img");
	images.forEach(function (images) {
		images.onerror = function () {
			images.src =
				"data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNjAwIiBoZWlnaHQ9IjkwMCIgdmlld0JveD0iMCAwIDE2MDAgOTAwIj4KICA8cmVjdCBpZD0iUmV0w6JuZ3Vsb18xIiBkYXRhLW5hbWU9IlJldMOibmd1bG8gMSIgd2lkdGg9IjE2MDAiIGhlaWdodD0iOTAwIiBmaWxsPSIjOTA5MDkwIi8+Cjwvc3ZnPg==";
			return true;
		};
	});

	return true;
}

function pa_truncate() {
	var itens = document.querySelectorAll(".pa-truncate");

	itens.forEach(function (item) {
		var css = window.getComputedStyle(item);

		var fontSize = css.getPropertyValue("font-size");
		var lineHeight = css.getPropertyValue("line-height");
		console.log(lineHeight);
	});
}
