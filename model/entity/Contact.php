<?php 
	class Contacts{
		var $name;
		var $phone;
		var $email;

		function __construct($name, $phone, $email){
			$this->name = $name;
			$this->phone = $phone;
			$this->email = $email;
		}
		
		static function getListFromDB() {
			// Connect to db 
			$conn = new mysqli("localhost", "admin", "987", "contacts");
			$conn->set_charset("utf8");
			if($conn->connection_error)
				die("Connect failed. Error: " . $conn->connection_error);

			// Query
			// $query = "SELECT * from contact where masv='$name'";
			$query = "SELECT * from contact";
			$result = $conn->query($query);
			$rs = array();
			if($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					array_push($rs, new Contacts(
						$row["name"],
						$row["phone"],
						$row["email"],
					));
				};
			}
			return $rs;
		}

		static function addContact($contact) {
			// Connect to db 
			$conn = new mysqli("localhost", "admin", "987", "contacts");
			$conn->set_charset("utf8");
			if($conn->connection_error)
				die("Connect failed. Error: " . $conn->connection_error);

			// Query
			// $query = "INSERT INTO `contact`(`name`, `phone`, `email`) values ($contact["name"],$contact["phone"],$contact["email"])";
			return $conn->query($query);
		}

		static function editContact($name, $contact) {
			// Connect to db
			$conn = new mysqli("localhost", "admin", "987", "contacts");
			$conn->set_charset("utf8");
			if($conn->connection_error)
				die("Connect failed. Error: " . $conn->connection_error);

			// Query
			$query = "UPDATE `contact` SET `name`=$contact[1],`phone`=$contact[2],`email`=$contact[3] WHERE name=$name";
			return $conn->query($query);
		}

		static function removeContact($name) {
			// Connect to db 
			$conn = new mysqli("localhost", "admin", "987", "contact");
			$conn->set_charset("utf8");
			if($conn->connection_error)
				die("Connect failed. Error: " . $conn->connection_error);

			// Query
			$query = "DELETE FROM `contact` WHERE name='$name'";
			return $conn->query($query);
		}
	}
?>