<?php
	define('WEB_PATH', '/receta/');
	class controller{
		public $category;
		public $id;
		public $db;
		function __construct(){
			$this->template = isset($_GET['template']) ? $_GET['template'] : NULL;
			$this->category = isset($_GET['category']) ? $_GET['category'] : NULL;
			$this->id = isset($_GET['id']) ? $_GET['id'] : NULL;
			$this->db = new PDO('mysql:host=localhost;dbname=receta','root','');
		}

		public function template(){
			require(__dir__ . '/../views/global/header.php'); //e bojme iclude header-in
			//readmore file
			if(!empty($this->template) && !empty($this->id)){
				if (file_exists(__dir__ . '/../views/readmore/' . $this->template . '-readmore.php'))
					include_once(__dir__ . '/../views/readmore/' . $this->template . '-readmore.php');
			}
			//category template
			elseif(!empty($this->template) && empty($this->id)){
				if (file_exists(__dir__ . '/../views/templates/' . $this->template . '.php'))
					include_once(__dir__ . '/../views/templates/' . $this->template . '.php');

				else
					include_once(__dir__ . '/../views/404.php');
			}
			//home
			else{
				include_once(__dir__ . '/../views/home.php');
			}

			require(__dir__ . '/../views/global/footer.php'); //e bojme iclude footerin-in
		}

		// ======== RECETAT START HERE ========

		public function shtoRecete(){
			try {
				$titulli = isset($_POST['titulli']) ? filter_var($_POST['titulli'],FILTER_SANITIZE_STRING) : NULL;
				$kategoria_id = isset($_POST['kategoria_id']) ? filter_var($_POST['kategoria_id'],FILTER_SANITIZE_NUMBER_INT) : NULL;
				$shteti_id = isset($_POST['shteti_id']) ? filter_var($_POST['shteti_id'],FILTER_SANITIZE_NUMBER_INT) : NULL;
				$pershkrimi = isset($_POST['pershkrimi']) ? $_POST['pershkrimi']: NULL;
				$perberesit = isset($_POST['perberesit']) ? $_POST['perberesit']: NULL;
				$pergaditja = isset($_POST['pergaditja']) ? $_POST['pergaditja']: NULL;

				if(empty($titulli))
					throw new Exception("Nuk e keni plotesuar emrin!", 1);
				if(empty($kategoria_id))
					throw new Exception("Nuk e keni plotesuar kategorine!", 1);
				if(empty($shteti_id))
					throw new Exception("Nuk e keni plotesuar shtetin!", 1);
				if(empty($pershkrimi))
					throw new Exception("Nuk e keni plotesuar shtetin!", 1);

				$data = [
					'titulli' => $titulli,
					'user_id' => (int) $_SESSION['user_id'],
					'kategoria_id' => (int) $kategoria_id,
					'shteti_id' => (int) $shteti_id,
					'pershkrimi' => nl2br($pershkrimi),
					'perberesit' => nl2br($perberesit),
					'pergaditja' => nl2br($pergaditja),
					'aprovuar' => 0,
					'klikuar' => 0,
					'fotografia' => ''
				];

				if(!empty($_FILES['fotografia']["name"])){
					$data['fotografia'] = $this->uploadImage($_FILES['fotografia'],'recetat');
				}

				$sql = "INSERT INTO recetat (titulli, user_id, kategoria_id, shteti_id, pershkrimi, perberesit, pergaditja, aprovuar, klikuar, fotografia) VALUES (:titulli, :user_id, :kategoria_id, :shteti_id, :pershkrimi, :perberesit, :pergaditja, :aprovuar, :klikuar, :fotografia)";
				$stmt= $this->db->prepare($sql);

				if(!$stmt->execute($data))
					throw new Exception("Provoni perseri!", 1);

				echo '<div class="message">Receta eshte uploaduar me sukses duhet te pritni aprovimin nga admini!</div>';

			} catch (Exception $e) {
				echo '<div class="error-message">' . $e->getMessage() . '</div>';
			}
		}

		public function getBallineRecetat(){
			$stmt = $this->db->prepare("SELECT * FROM recetat WHERE balline = 1 AND aprovuar = 1 ORDER BY data_postimit DESC LIMIT 8");
			$stmt->execute(); 
			$recetat = $stmt->fetchAll();
			return $this->arrayRecetat($recetat);
		}

		public function getRecetat($limit = 8, $order = 'data_postimit DESC', $kategoria = NULL){
			if(!empty($kategoria)){
				$stmt = $this->db->prepare("SELECT * FROM recetat WHERE kategoria_id = {$kategoria} AND aprovuar = 1 ORDER BY {$order} LIMIT {$limit}");
			}else{
				if(isset($_SESSION['level']) && $_SESSION['level'] == 1){
					$stmt = $this->db->prepare("SELECT * FROM recetat ORDER BY aprovuar ASC LIMIT {$limit}");
				}else{
					$stmt = $this->db->prepare("SELECT * FROM recetat WHERE aprovuar = 1 ORDER BY {$order} LIMIT {$limit}");
				}
			}
			
			$stmt->execute(); 

			$recetat = $stmt->fetchAll();

			return $this->arrayRecetat($recetat);

		}

		public function receat_search($search){
			$stmt = $this->db->prepare("SELECT * FROM recetat WHERE titulli LIKE '%{$search}%' OR pershkrimi LIKE '%{$search}%' ORDER BY data_postimit DESC LIMIT 8");
			$stmt->execute(); 

			$recetat = $stmt->fetchAll();

			return $this->arrayRecetat($recetat);
		}

		public function recetat_tjera($kategoria_id){
			$stmt = $this->db->prepare("SELECT * FROM recetat WHERE kategoria_id = :kategoria_id AND id != :id AND aprovuar = 1 ORDER BY data_postimit DESC LIMIT 8");
			$stmt->execute(['kategoria_id' => $kategoria_id, 'id' => $this->id]); 

			$recetat = $stmt->fetchAll();

			return $this->arrayRecetat($recetat);
		}

		public function getRecetaReadmore(){
			$stmt = $this->db->prepare("SELECT * FROM recetat WHERE id = :id");
			$stmt->execute(['id' => $this->id]); 

			$receta = $stmt->fetch();

			$arr = [];

			if(!empty($receta)){
				$arr['id'] = $receta['id'];
				$arr['titulli'] = $receta['titulli'];
				$arr['user_id'] = $receta['user_id'];
				$arr['user_emri'] = $this->getUserName($receta['user_id']);
				$arr['kategoria_id'] = $receta['kategoria_id'];
				$arr['kategoria_emri'] = $this->getCategoryName($receta['kategoria_id']);
				$arr['shteti_id'] = $receta['shteti_id'];
				$arr['shteti_emri'] = $this->getShtetiName($receta['shteti_id']);
				$arr['pershkrimi'] = $receta['pershkrimi'];
				$arr['perberesit'] = $receta['perberesit'];
				$arr['pergaditja'] = $receta['pergaditja'];
				$arr['url'] = WEB_PATH . '?template=recetat&id=' . $receta['id'];
				$arr['data_postimit'] = $this->albaniandate($receta['data_postimit']);
				$arr['aprovuar'] = $receta['aprovuar'];
				$arr['fotografia'] = WEB_PATH . 'uploads/' . $receta['fotografia'];
				$arr['balline'] = $receta['balline'];
				$arr['klikuar'] = $receta['klikuar'];
				$arr['short_text'] = $this->short_text($receta['pershkrimi'], 150);
			}

			return $arr;
		}

		public function arrayRecetat($recetatfromdb = NULL){
			$i = 0;
			$arr = [];
			if(!empty($recetatfromdb)){
				foreach($recetatfromdb as $receta){
					$arr[$i]['id'] = $receta['id'];
					$arr[$i]['titulli'] = $receta['titulli'];
					$arr[$i]['user_id'] = $receta['user_id'];
					$arr[$i]['user_emri'] = $this->getUserName($receta['user_id']);
					$arr[$i]['kategoria_id'] = $receta['kategoria_id'];
					$arr[$i]['kategoria_emri'] = $this->getCategoryName($receta['kategoria_id']);
					$arr[$i]['shteti_id'] = $receta['shteti_id'];
					$arr[$i]['shteti_emri'] = $this->getShtetiName($receta['shteti_id']);
					$arr[$i]['pershkrimi'] = $receta['pershkrimi'];
					$arr[$i]['perberesit'] = $receta['perberesit'];
					$arr[$i]['pergaditja'] = $receta['pergaditja'];
					$arr[$i]['url'] = WEB_PATH . '?template=recetat&id=' . $receta['id'];
					$arr[$i]['data_postimit'] = $receta['data_postimit'];
					$arr[$i]['aprovuar'] = $receta['aprovuar'];
					$arr[$i]['fotografia'] = WEB_PATH . 'uploads/' . $receta['fotografia'];
					$arr[$i]['balline'] = $receta['balline'];
					$arr[$i]['klikuar'] = $receta['klikuar'];
					$arr[$i]['short_text'] = $this->short_text($receta['pershkrimi'], 150);
					$i++;	
				}
			}

			return $arr;
		}

		public function getKategorite(){
			$stmt = $this->db->prepare("SELECT * FROM kategoria ORDER BY id DESC LIMIT 100");
			$stmt->execute(); 

			$kategorite = $stmt->fetchAll();
			return $kategorite;
		}

		public function getShtetet(){
			$stmt = $this->db->prepare("SELECT * FROM shtetet ORDER BY id DESC LIMIT 100");
			$stmt->execute(); 

			$shtetet = $stmt->fetchAll();
			return $shtetet;
		}

		protected function getUserName($user_id){
			$stmt = $this->db->prepare("SELECT emri, mbiemri FROM users WHERE id = :user_id");
			$stmt->execute(['user_id' => $user_id]); 

			$user = $stmt->fetch();

			return !empty($user) ? $user['emri'] . ' ' . $user['mbiemri'] : NULL;
		}

		protected function getCategoryName($kategoria_id){
			$stmt = $this->db->prepare("SELECT emri FROM kategoria WHERE id = :kategoria_id");
			$stmt->execute(['kategoria_id' => $kategoria_id]); 

			$kategoria = $stmt->fetch();

			return !empty($kategoria) ? $kategoria['emri'] : NULL;
		}

		protected function getShtetiName($shteti_id){
			$stmt = $this->db->prepare("SELECT emri FROM shtetet WHERE id = :shteti_id");
			$stmt->execute(['shteti_id' => $shteti_id]); 

			$shteti = $stmt->fetch();

			return !empty($shteti) ? $shteti['emri'] : NULL;
		}

		// ======== BLOG FUNCTION START HERE ========

		public function shtoBlog(){
			$titulli = isset($_POST['titulli']) ? filter_var($_POST['titulli'],FILTER_SANITIZE_STRING) : NULL;
			$pershkrimi = isset($_POST['pershkrimi']) ? $_POST['pershkrimi']: NULL;

			try {

				if(empty($titulli))
					throw new Exception("Nuk e keni plotesuar emrin!", 1);

				$data = [
					'titulli' => $titulli,
					'user_id' => (int) $_SESSION['user_id'],
					'pershkrimi' => $pershkrimi,
					'fotografia' => ''
				];

				if(!empty($_FILES['fotografia']["name"])){
					$data['fotografia'] = $this->uploadImage($_FILES['fotografia'],'blog');
				}

				$sql = "INSERT INTO blog (titulli, user_id, pershkrimi, fotografia) VALUES (:titulli, :user_id, :pershkrimi, :fotografia)";
				$stmt= $this->db->prepare($sql);

				if(!$stmt->execute($data))
					throw new Exception("Provoni perseri!", 1);

				echo '<div class="message">Blogu u postua me sukses!</div>';

			} catch (Exception $e) {
				echo '<div class="error-message">' . $e->getMessage() . '</div>';
			}
		}

		public function getBlog($limit = 6, $order = 'data_postimit DESC'){
			$stmt = $this->db->prepare("SELECT * FROM blog ORDER BY {$order} LIMIT {$limit}");
			$stmt->execute(); 

			$blog_db = $stmt->fetchAll();

			$i = 0;
			$arr = [];
			if(!empty($blog_db)){
				foreach($blog_db as $blog){
				$arr[$i]['titulli'] = $blog['titulli'];
				$arr[$i]['short_text'] = $this->short_text($blog['pershkrimi'], 150);
				$arr[$i]['fotografia'] = WEB_PATH . 'uploads/' . $blog['fotografia'];
				$arr[$i]['url'] = WEB_PATH . '?template=blog&id=' . $blog['id'];
				$i++;	
				}
			}

			return $arr;
		}

		public function getBlogReadmore(){
			$stmt = $this->db->prepare("SELECT * FROM blog WHERE id = :id");
			$stmt->execute(['id' => $this->id]); 

			$blog = $stmt->fetch();

			$arr = [];

			if(!empty($blog)){
				$arr['id'] = $blog['id'];
				$arr['titulli'] = $blog['titulli'];
				$arr['user_emri'] = $this->getUserName($blog['user_id']);
				$arr['pershkrimi'] = $blog['pershkrimi'];
				$arr['data_postimit'] = $this->albaniandate($blog['data_postimit']);
				$arr['fotografia'] = WEB_PATH . 'uploads/' . $blog['fotografia'];
			}

			return $arr;
		}

		public function blog_search($search){
			$stmt = $this->db->prepare("SELECT * FROM blog WHERE titulli LIKE '%{$search}%' OR pershkrimi LIKE '%{$search}%' ORDER BY data_postimit DESC LIMIT 6");
			$stmt->execute(); 

			$blog_db = $stmt->fetchAll();

			$i = 0;
			$arr = [];
			if(!empty($blog_db)){
				foreach($blog_db as $blog){
				$arr[$i]['titulli'] = $blog['titulli'];
				$arr[$i]['short_text'] = $this->short_text($blog['pershkrimi'], 150);
				$arr[$i]['fotografia'] = WEB_PATH . 'uploads/' . $blog['fotografia'];
				$arr[$i]['url'] = WEB_PATH . '?template=blog&id=' . $blog['id'];
				$i++;	
				}
			}

			return $arr;
		}

		// ======== OTHHER FUNCTION START HERE ========

		public function uploadImage($file, $folder){


			$target_dir = __dir__ . "/../uploads/" . $folder . '/';
            $target_file = $target_dir . basename($file["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($file["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                }else {
                    echo "Nuk keni uploaduar fotografi.";
                    $uploadOk = 0;
                }
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
                echo "Lejohen vetem formate JPG, JPEG, PNG & GIF.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Ka ndodhur nje problem gjat uploadimit te fotografise!";
                die();
            // if everything is ok, try to upload file
            } else {
                $path_parts = pathinfo($file["name"]);
                $image_path = $target_dir . $path_parts['filename'].'_'.time(). '.' .$path_parts['extension'];
                if (move_uploaded_file($file["tmp_name"], $image_path)) {
                    return $folder . '/' . $path_parts['filename'].'_'.time(). '.' .$path_parts['extension'];
                } else {
                    echo "Ka ndodhur nje problem gjat uploadimit te fotografise!";
                	die();
                }
            }
		}

		public function short_text($text, $max_length = 150){

			if (strlen($text) > $max_length)
			{
			    $offset = ($max_length - 3) - strlen($text);
			    $text = substr($text, 0, strrpos($text, ' ', $offset)) . '...';
			}

			return $text;
		}

		public function increment_klikuar($table){
			$stmt = $this->db->prepare("UPDATE {$table} set klikuar = klikuar + 1 WHERE id = :id");
			$stmt->execute(['id' => $this->id]);
		}

		public function albaniandate($date){
	        $albanian = ['Janar', 'Shkurt', 'Mars', 'Prill', 'Maj', 'Qershor', 'Korrik', 'Gusht', 'Shtator', 'Tetor', 'Nëntor', 'Dhjetor'];

	        $new_date = strtotime($date);

	        return date('d', $new_date) . ' ' . $albanian[date('n', $new_date) - 1] . ' ' . date('Y', $new_date);
	    }

	    public function ruajKontakt($data){

	    		$sql = "INSERT INTO kontakt (emri_mbiemri, email, nr_tel, mesazhi) VALUES (:emri_mbiemri, :email, :nr_tel, :mesazhi)";
				$stmt= $this->db->prepare($sql);
				$stmt->execute($data);

	    }

	    public function getRrethNesh(){
	    	$stmt = $this->db->prepare("SELECT * FROM rreth_nesh");
			$stmt->execute(); 

			return $stmt->fetch();
	    }
	}
?>