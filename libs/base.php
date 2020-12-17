<?php 

	class Base {
		
		public function __construct($server) {
			$this->server = $server;
		}

		function getById($id) {
			$sql = "SELECT * FROM users WHERE id = '$id'";
			$sql_q = mysqli_query($this->server, $sql);

			if (mysqli_num_rows($sql_q) < 1) {
				return NULL;
			} else {
				return mysqli_fetch_assoc($sql_q);
			}
		}

		function getByUsername($username) {
			$sql = "SELECT * FROM users WHERE username = '$username'";
			$sql_q = mysqli_query($this->server, $sql);

			if (mysqli_num_rows($sql_q) < 1) {
				return NULL;
			} else {
				return mysqli_fetch_assoc($sql_q);
			}
		}

		function add($username, $password, $email) {
			$sql_check = "SELECT * FROM users WHERE username = '$username' && email = '$email'";
			$sql_q_check = mysqli_query($this->server, $sql_check);

			if (mysqli_num_rows($sql_q_check) > 0) {
				return "available";
			}  else {
				$random = random_int(10, 255);
				$sql = "INSERT INTO users (id, username, password, email, suspended) VALUES ('$random', '$username', '$password', '$email', '0')";
				$sql_q = mysqli_query($this->server, $sql);

				return mysqli_fetch_assoc($sql_q);
			}
		}

		function removeById($id) {
			if (!is_nan($id)) {
				return "that's not a number!";
			} else {
				$sql = mysqli_query(
					$this->server,
					"SELECT * FROM users WHERE id = '$id'"
				);

				if (mysqli_num_rows($sql) < 1) {
					return NULL;
				} else {
					$data = mysqli_fetch_assoc($sql);
					$result = mysqli_query(
						$this->server,
						"DELETE FROM users WHERE id = '$id'"
					);

					return $data;
				}
			}
		}


		function all() {
			$sql = mysqli_query($this->server, "SELECT * FROM users ORDER BY id DESC");
			$data = mysqli_fetch_array($sql);

			return $data;
		}

		function isSuspended($id) {
			if (!is_nan($id)) {
				return "that's not a number!";
			} else {
				$sql = mysqli_query(
					$this->server,
					"SELECT suspended FROM users WHERE id = '$id'"
				);

				$data = mysqli_fetch_assoc($sql);
				if (data["suspended"] == 0) {
					return FALSE;
				} else {
					return TRUE;
				}
			}
		}

	}
 ?>