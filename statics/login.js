function checkMeU() {
	console.log("checked username");
	const element = document.querySelector("input[name=username]");

	if (/[0-9]/gi.test(element.value)) {
		element.style.color = "red";
	} else {
		element.style.color = "green";
	}

	return element;
}