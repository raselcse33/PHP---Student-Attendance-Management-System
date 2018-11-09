<?php include 'inc/header.php';?>
<?php include 'lib/student.php';?>
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
			      <th scope="col">Date</th>
			      <th scope="col">Action</th>
			     
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	$stu = new Student();
			  	$result = $stu->getdate();
			  	if($result){
			  		$i=0;
			  		while($value = $result->fetch_assoc()){
			  			$i++

			  	?>
			    <tr>
			      <th scope="row"><?php echo $i;?></th>
			      <td><?php echo $value['attend_time'];?></td>
			      <td><a href="viewdetails.php?dt=<?php echo $value['attend_time'];?>">View</a></td>
			    </tr>
			    <?php } }?>
			  </tbody>
			</table>
			
		</form>
	</div>


</div>

		
<?php include 'inc/footer.php';?>



		