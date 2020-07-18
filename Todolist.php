<?php
  $errors ="";
  
  
  $db = mysqli_connect('localhost', 'root' , '', 'todo');

  
    if (isset($_GET['submit'])) {
       $task = $_GET['task'];
	   if (empty($task)){
		   $errors = "You must fill in the task";
	   }else{
	       mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
	       header('location: Todolist.php');
	   }
	}
	if (isset($_GET['del_task'])) {
		$id = $_GET['del_task'];
		$task = $_GET['task'];
		mysqli_query($db,"DELETE FROM tasks WHERE id=$id");
		header('location: Todolist.php');
	}
	 
	 if (isset($_GET['edit_task'])) {
		 $id = $_GET['edit_task'];
		
		 $result =mysqli_query($db,"SELECT * FROM tasks WHERE id=$id");
	 }
		while($row = mysqli_fetch_array($result)){
				echo $row['task'];
			
		 }			
		
	 
	 
   $tasks = mysqli_query($db, "SELECT * FROM tasks");

?>

<html>
<head>
	<title>ToDo List Application </title>
</head>
<body>
	<div class="heading">
		<h2>Update Your Daily Activity</h2>
	</div>
	<form method="get" action="Todolist.php">
	 <?php if (isset($errors)) { ?>
		 <p><?php echo $errors; ?></p>
		 <?php } ?>
	
	
		<input type="text" name="task" class="task_input" value ="" placeholder = "Enter the task";>
		
			 
		<button type="submit"class="add_btn" name="submit" id="add_btn" >Add Task</button>
		     
	</form>
	
	<table border="5">
	<thead>
		<tr>
			<th>No</th>
			<th>Task</th>
			<th>Action</th>
		</tr>
	</thead>
	
	<tbody>
	    <?php $i =1; while ($row = mysqli_fetch_array($tasks)) { ?>
		    <tr>
				<td><?php echo $i;?></td>
				<td class="task"><?php echo $row['task']; ?></td>
			
				<td class="delete"> 
			    <a href="Todolist.php?del_task=<?php echo $row['id']; ?>">DELETE</a>
				
					<td class="edit"> 
					     <a href="Todolist.php?edit_task=<?php echo $row['id']; ?>">EDIT</a>
								
				</td>
			</tr>
		<?php $i++; } ?>
	   
	</tbody>
	
</body>
</html>