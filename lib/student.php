<?php  $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/database.php');?>
<?php
class Student
{
	private $db;

	function __construct()
	{
		$this->db = new Database();
	}

	public function getstudent()
	{
		$query = "SELECT * FROM db_student";
		$getdata = $this->db->select($query);
		return $getdata;
	}

	public function insertdata($studentName,$studentRoll)
	{
		$studentName = mysqli_real_escape_string($this->db->link,$studentName);
		$studentRoll = mysqli_real_escape_string($this->db->link,$studentRoll);
		if($studentName=="" || $studentRoll==""){
			$msg="<div class='alert alert-danger'><strong>Must give the value</strong></div>";
			return $msg;
		}else{
			$query_stu  = "INSERT INTO db_student(studentName,studentRoll)VALUES('$studentName','$studentRoll')";
			$insertdata = $this->db->insert($query_stu);

			$query_att  = "INSERT INTO db_attend(roll)VALUES('$studentRoll')";
			$insertdata = $this->db->insert($query_att);

			if($insertdata){
				$msg="<div class='alert alert-success'><strong>Insert Successfully</strong></div>";
				return $msg;
			}else{
				$msg="<div class='alert alert-danger'><strong>Insert not Successfully</strong></div>";
				return $msg;

			}  

		}
	}

	public function studentattendence($curent_date,$attend =array())
	{
		$query = "SELECT DISTINCT attend_time FROM db_attend";
		$select = $this->db->select($query);
		while($result = $select->fetch_assoc()){
			$date = $result['attend_time'];
			if($curent_date==$date){
				$msg="<div class='alert alert-danger'><strong>Attentence allready taken</strong></div>";
				return $msg;
			}
		}
        
        foreach ($attend as $attend_key => $value) {
        	if($value == "present"){
        		$query = "INSERT INTO db_attend(roll,attend,attend_time)VALUES('$attend_key','present',now())";
        		$insert = $this->db->insert($query);

        	}elseif($value =="absent"){
        		$query = "INSERT INTO db_attend(roll,attend,attend_time)VALUES('$attend_key','absent',now())";
        		$insert = $this->db->insert($query);
        	}
        }

        if($insert){
				$msg="<div class='alert alert-success'><strong>Insert Successfully</strong></div>";
				return $msg;
			}else{
				$msg="<div class='alert alert-danger'><strong>Insert not Successfully</strong></div>";
				return $msg;

			}  

	}

	public function getdate()
	{
		$query = "SELECT DISTINCT attend_time FROM db_attend";
		$select = $this->db->select($query);
		return $select;
	}

	public function get_single_date($dt)
	{
		$query="SELECT db_student.studentName,db_attend.*
		        FROM db_student
		        INNER JOIN db_attend
		        ON db_student.studentRoll = db_attend.roll
		        WHERE attend_time='$dt'";

		 $result = $this->db->select($query);
		 return $result;       


	}


	public function update_attentence($dt,$attend)
	{
		foreach ($attend as $attend_key => $value) {
        	if($value == "present"){
              $query="UPDATE db_attend
                      SET attend='present'
                      WHERE roll='".$attend_key."'AND attend_time='".$dt."'";
               $update = $this->db->update($query);
                          		
  
        	}elseif($value =="absent"){
        		$query="UPDATE db_attend
                      SET attend='absent'
                      WHERE roll='".$attend_key."'AND attend_time='".$dt."'";
               $update = $this->db->update($query);
               
               
        	}
        }

        if($update){
				$msg="<div class='alert alert-success'><strong>Update Successfully</strong></div>";
				return $msg;
			}else{
				$msg="<div class='alert alert-danger'><strong>Update not Successfully</strong></div>";
				return $msg;

			}  
	}
}


?>