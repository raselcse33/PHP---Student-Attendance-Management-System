<?php include 'inc/header.php';?>
<?php include 'lib/student.php';?>
<?php
$stu = new Student();
$dt = $_GET['dt'];
if(isset($_POST['submit'])){
	$attend = $_POST['attend'];
	$result = $stu->update_attentence($dt,$attend);
}
?>

<?php
if(isset($result)){
	echo $result;
}

?>
<div class="panel panel-default">
	<div class="panel-heading" style="background-color:lightblue">
		<h2>
			<a class="btn btn-success btn-sm" href="add.php">Add Student </a>
			<a class="btn btn-info float-right btn-sm" href="index.php">Attentence</a>
		</h2>
	</div>

	<div class="panel-body">
		<div class="well" style="background-color:lightblue">
			<h3 class="text-center">
			<?php echo $dt ;?> 
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
			  	
			  	$result = $stu->get_single_date($dt);
			  	if($result){
			  		$i=0;
			  		while($value = $result->fetch_assoc()){
			  			$i++;

			  	?>
			    <tr>
			      <th scope="row"><?php echo $i;?></th>
			      <td><?php echo $value['studentName'];?></td>
			      <td><?php echo $value['roll'];?></td>
			      <td>
			      	<input type="radio" name="attend[<?php echo $value['roll'];?>]" value="present" <?php if($value['attend']=="present"){echo "checked";}?> >p
			      	
			      	
			      	 
			      	<input type="radio" name="attend[<?php echo $value['roll'];?>]" value="absent" <?php if($value['attend']=="absent"){echo "checked";}?> >A
			      </td>
			    </tr>
			    <?php } }?>
			    <tr>
			    	<td><input class="btn btn-success btn-sm" type="submit" name="submit" value="update"></td>
			    </tr>
			  </tbody>
			</table>
			
		</form>
	</div>


</div>

		
<?php include 'inc/footer.php';?>



		