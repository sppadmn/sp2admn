<?php
	require "users.json";
	class checkuser{
		public function dataArray() {
			return json_decode(file_get_contents("users.json"), true);
		}
	}
?>