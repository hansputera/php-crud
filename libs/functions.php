<?php 

	function redirect($url) {
		return "<script>window.location.replace('$url');</script>";
	}

	function redirectWithText($url, $text) {
		return "<script>alert('$text');window.location.replace('$url');</script>";
	}

 ?>