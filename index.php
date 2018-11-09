<?php include 'inc/header.php';?>
<?php include 'lib/student.php';?>

<?php
$stu = new Student();
$curent_date = date("Y-m-d"); 

if(isset($_POST['submit']) && isset($_POST['attend'])){
			$attend = $_POST['attend'];
			$inserattendence = $stu->studentattendence($curent_date,$attend);
		}

?>
<?php
if(isset($inserattendence)){
	echo $inserattendence;
}

?>

<div class="panel panel-default">
	<div class="panel-heading" style="background-color:lightblue">
		<h2>
			<a class="btn btn-success btn-sm" href="add.php">Add Student </a>
			<a class="btn btn-info float-right btn-sm" href="date_view.php">view all</a>
		</h2>
	</div>

	<div class="panel-body">
		<div class="well" style="background-color:lightblue">
			<h3 class="text-center">
			<?php include "lib/date.php"; ?> 
			</h3>
		</div>
		<form action="" method="POST">
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">Serial</th>
			      <th scope="col">Student Name</th>
			      <th scope="col">Student Roll</th>
			      <th scope="col">Attentence</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	
			  	$result = $stu->getstudent();
			  	if($result){
			  		$i=0;
			  		while($value = $result->fetch_assoc()){
			  			$i++

			  	?>
			    <tr>
			      <th scope="row"><?php echo $i;?></th>
			      <td><?php echo $value['studentName'];?></td>
			      <td><?php echo $value['studentRoll'];?></td>
			      <td>
			      	<input type="radio" name="attend[<?php echo $value['studentRoll'];?>]" value="present">P
			      	<input type="radio" name="attend[<?php echo $value['studentRoll'];?>]" value="absent">A
			      </td>
			    </tr>
			    <?php } }?>
			    <tr>
			    	<td><input class="btn btn-success btn-sm" type="submit" name="submit" value="submit"></td>
			    </tr>
			  </tbody>
			</table>
			
		</form>
	</div>


</div>

		
<?php include 'inc/footer.php';?>



		