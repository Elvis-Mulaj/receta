<?php
	class login extends controller {

		public function __construct() {
	        parent::__construct();
	    }

		public function loginCheck(){
			return isset($_SESSION['user_id']) ? true : false;
		}

		public function login(){
			try {
				$email = isset($_POST['email']) ? filter_var($_POST['email'],FILTER_SANITIZE_EMAIL) : NULL;
				$password = isset($_POST['password']) ? $_POST['password'] : NULL;
				
				if(empty($email))
					throw new Exception("Nuk e keni plotesuar email-in", 1);
				if(empty($password))
					throw new Exception("Nuk e keni plotesuar fjalekalimin", 1);

				$stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
				$stmt->execute(['email' => $email]); 

				$user = $stmt->fetch();

				if(empty($user))
					throw new Exception("Ky user nuk ekziston!", 1);

				if (password_verify($password, $user['password']) != true)
					throw new Exception("Email ose Password gabim!", 1);

				$_SESSION['user_id'] = $user['id'];
				$_SESSION['fullname'] = $user['emri'] . ' ' . $user['mbiemri'];
				$_SESSION['level'] = $user['level']; 

				header("Location: http://localhost/receta");
				exit();

					
				
			} catch (Exception $e) {
				echo '<div class="error-message">' . $e->getMessage() . '</div>';
			}
		}

		public function register(){
			try {

				$emri = isset($_POST['emri']) ? filter_var($_POST['emri'],FILTER_SANITIZE_STRING) : NULL;
				$mbiemri = isset($_POST['mbiemri']) ? filter_var($_POST['mbiemri'],FILTER_SANITIZE_STRING) : NULL;
				$biografia = isset($_POST['biografia']) ? $_POST['biografia'] : NULL;
				$email = isset($_POST['email']) ? filter_var($_POST['email'],FILTER_SANITIZE_EMAIL) : NULL;
				$password = isset($_POST['password']) ? filter_var($_POST['password'],FILTER_SANITIZE_EMAIL) : NULL;

				if(empty($emri))
					throw new Exception("Nuk e keni plotesuar emrin", 1);
				if(empty($mbiemri))
					throw new Exception("Nuk e keni plotesuar mbiemrin", 1);
				if(empty($email))
					throw new Exception("Nuk e keni plotesuar email-in", 1);
				if(empty($password))
					throw new Exception("Nuk e keni plotesuar fjalekalimin", 1);

				$stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
				$stmt->execute(['email' => $email]); 

				$user = $stmt->fetch();

				if(!empty($user))
					throw new Exception("Ky user ekziston!", 1);

				$data = [
				    'emri' => $emri,
				    'mbiemri' => $mbiemri,
				    'email' => $email,
				    'password' => password_hash($password, PASSWORD_DEFAULT),
				    'biografia' => $biografia,
				    'level' => 2
				];

				$sql = "INSERT INTO users (emri, mbiemri, email, password, biografia, level) VALUES (:emri, :mbiemri, :email, :password, :biografia, :level)";
				$stmt= $this->db->prepare($sql);

				if(!$stmt->execute($data))
					throw new Exception("Provoni perseri!", 1);

				header("Location: http://localhost/receta/login.php?new_user=1");
				exit();	



				
			} catch (Exception $e) {
				echo '<div class="error-message">' . $e->getMessage() . '</div>';
			}
		}
	}
?>