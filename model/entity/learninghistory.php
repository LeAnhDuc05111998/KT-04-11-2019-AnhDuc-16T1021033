<?php 
	class LearningHistory{
		var $id;
		var $yearFrom;
		var $yearTo;
		var $schoolName;
		var $schoolAddress;
		var $idStudent;

		function __construct($id,$yearFrom,$yearTo,$schoolName,$schoolAddress,$idStudent){
			$this->id = $id;
			$this->yearFrom = $yearFrom;
			$this->yearTo = $yearTo;
			$this->schoolName = $schoolName;
			$this->schoolAddress = $schoolAddress;
			$this->idStudent = $idStudent;
		}
		static function getList($idStudent){
			$rs = array();
			// $rs->array_push(new LearningHistory(1,2001,2002,"Cao Thắng","Huế",$idStudent));-->OOP
			array_push($rs, new LearningHistory(1,2001,2002,"Cao Thắng","Huế",$idStudent));
			array_push($rs, new LearningHistory(2,2002,2003,"Cao Thắng","Huế",$idStudent));
			array_push($rs, new LearningHistory(3,2003,2004,"Cao Thắng","Huế",$idStudent));
			return $rs;
		}
		static function getListFromFile($idStudent){
			$dataFromFile = file('../resource/data.txt',FILE_IGNORE_NEW_LINES);
			$rs = array();
			foreach ($dataFromFile as $key => $value) {
				$temp = explode("$",$value);
				if ($temp[5] == $idStudent) {
					array_push($rs, new LearningHistory(
						$temp[0],
						$temp[1],
						$temp[2],
						$temp[3],
						$temp[4],
						$temp[5]
					));
				}				
			}
			return $rs;
		}
	}
?>