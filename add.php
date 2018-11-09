<?php include 'inc/header.php';?>
<?php
 include 'lib/student.php';
 $stu = new Student();
?>


<div class="panel panel-default">
	<div class="panel-heading" style="background-color:lightblue">
		<h2>
			<a class="btn btn-success btn-sm" href="add.php">Add Student </a>
			<a class="btn btn-info float-right btn-sm" href="index.php">back</a>
		</h2>
	</div>

	<div class="panel-body">
		<?php
		if(isset($_POST['submit'])){
			$studentName = $_POST['studentName'];
			$studentRoll =$_POST['studentRoll'];
			$insert = $stu->insertdata($studentName,$studentRoll);
		}

		?>

		<?php
		if(isset($insert)){
			echo $insert;
		}

		?>
		
		<form action="" method="POST">
		 
		  <div class="form-group">
		    <label for="name">Student Name</label>
		    <input type="text" class="form-control"  name="studentName" placeholder=" Student Name" >
		  </div>
		  <div class="form-group">
		    <label for="roll">Student Roll</label>
		    <input type="text" class="form-control"  name="studentRoll" placeholder="Student Roll">
		  </div>

		  <div class="form-group">
		  <button type="submit" class="btn btn-primary btn-sm" name="submit" value="submit">Submit</button>
		</div>

			
	 </form>
	</div>


</div>

		
<?php include 'inc/footer.php';?>



		