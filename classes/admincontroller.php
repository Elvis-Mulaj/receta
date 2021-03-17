<?php
	class admincontroller extends controller{
		public function __construct() {
	        parent::__construct();
	    }

	    public function template(){
	    	require(__dir__ . '/../views/global/admin-header.php');

	    	if(!empty($this->template)){
	    		if (file_exists(__dir__ . '/../views/admin/' . $this->template . '.php'))
					include_once(__dir__ . '/../views/admin/' . $this->template . '.php');
	    	}else{
	    		include_once(__dir__ . '/../views/admin/admin-home.php');
	    	}

	    	require(__dir__ . '/../views/global/footer.php');

			// echo $this->template;
	    }

		

	    public function aproveReceten($id){
	    	$stmt = $this->db->prepare("SELECT * FROM recetat WHERE id = :id");
			$stmt->execute(['id' => $id]); 

			$receta = $stmt->fetch();

			if(!empty($receta)){
				$vlera = $receta['aprovuar'] == 1 ? 0 : 1;

				$stmt = $this->db->prepare("UPDATE recetat set aprovuar = :aprovuar WHERE id = :id");
				$stmt->execute(['aprovuar' => $vlera,'id' => $id]);
			}
	    }

	    public function ShtoBalline($id){
	    	$stmt = $this->db->prepare("SELECT * FROM recetat WHERE id = :id");
			$stmt->execute(['id' => $id]); 

			$receta = $stmt->fetch();

			if(!empty($receta)){
				$vlera = $receta['balline'] == 1 ? 0 : 1;

				$stmt = $this->db->prepare("UPDATE recetat set balline = :balline WHERE id = :id");
				$stmt->execute(['balline' => $vlera,'id' => $id]);
			}
	    }

	    public function delete($table, $id){
	    	$stmt = $this->db->prepare("DELETE FROM {$table} WHERE id = :id");
			$stmt->execute(['id' => $id]); 
	    }

	    public function shtoEditKategori(){
	    	$emri = isset($_POST['emri']) ? filter_var($_POST['emri'],FILTER_SANITIZE_STRING) : NULL;
			$pershkrimi = isset($_POST['pershkrimi']) ? $_POST['pershkrimi']: NULL;

			if(isset($_GET['edit'])){
				$id = $_GET['edit'];
				$stmt = $this->db->prepare("UPDATE kategoria set emri = :emri, pershkrimi = :pershkrimi WHERE id = :id");
				$stmt->execute(['emri' => $emri, 'pershkrimi' => $pershkrimi, 'id' => $id]);
			}else{
				$sql = "INSERT INTO kategoria (emri, pershkrimi) VALUES (:emri, :pershkrimi)";
				$stmt= $this->db->prepare($sql);
				$stmt->execute(['emri' => $emri, 'pershkrimi' => $pershkrimi]);
			}
	    }

	    public function getKategorine($id){
	    	$stmt = $this->db->prepare("SELECT * FROM kategoria WHERE id = :id");
			$stmt->execute(['id' => $id]); 

			return $stmt->fetch();
	    }

	    public function shtoEditShtetin(){
	    	$emri = isset($_POST['emri']) ? filter_var($_POST['emri'],FILTER_SANITIZE_STRING) : NULL;
			$fotografia = $_POST['fotografia'];

			if(!empty($_FILES['fotografia']["name"])){
				$fotografia = $this->uploadImage($_FILES['fotografia'], 'shtetet');
			}

			if(isset($_GET['edit'])){
				$id = $_GET['edit'];
				$stmt = $this->db->prepare("UPDATE shtetet set emri = :emri, fotografia = :fotografia WHERE id = :id");
				$stmt->execute(['emri' => $emri, 'fotografia' => $fotografia, 'id' => $id]);
			}else{
				$sql = "INSERT INTO shtetet (emri, fotografia) VALUES (:emri, :fotografia)";
				$stmt= $this->db->prepare($sql);
				$stmt->execute(['emri' => $emri, 'fotografia' => $fotografia]);
			}
	    }

	    public function getShtetin($id){
	    	$stmt = $this->db->prepare("SELECT * FROM shtetet WHERE id = :id");
			$stmt->execute(['id' => $id]); 

			return $stmt->fetch();
	    }

	    public function getMesazhet(){
	    	$stmt = $this->db->prepare("SELECT * FROM kontakt");
			$stmt->execute(); 

			return $stmt->fetchAll();
	    }
	}
?>