<?php
	$Mysql = mysqli_connect("", "", "", "");
	class user {
		public $cookie_name;
		public $id;
		public $email;
		private $Mysql;
		function __construct($session_id) {
			$this->Mysql = mysqli_connect("localhost", "id1228268_michel", "Toppoint", "id1228268_php");
			$this->cookie_name = $session_id;
			$query = mysqli_query($this->Mysql, "SELECT `Original-ID` FROM session WHERE Inhalt='" . $session_id . "'");
			$fetch = mysqli_fetch_all($query);
			$this->id = $fetch[0][0];
			$query = mysqli_query($this->Mysql, "SELECT Email FROM benutzer WHERE ID=" . $this->id);
			$fetch = mysqli_fetch_all($query);
			$this->email = $fetch[0][0];
		}
		function __destruct() {
			mysqli_close($this->Mysql);
		}
	}
	if(isset($_COOKIE["session"])) {
		$user = new user($_COOKIE["session"]);
	}
	function weiterleiten($url) {
		header("Location: " . $url);
	}
// Funktion zum Schreiben
	function output($add) {
		global $string;
		$string = $string . $add;
	}
?>
