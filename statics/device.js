if (/(android)?(iphone)/gi.exec(navigator.platform)) {
	document.title = "Tidak tersedia";
	document.body.remove();
}