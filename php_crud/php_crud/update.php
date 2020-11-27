<?php include "connection.php";
if(isset($_POST['update'])){
  $name       = $_POST['student_name'];
  $kelas      = $_POST['kelas'];
  $absen      = $_POST['absen'];
  $result     = $_POST['result'];
  $id         = $_POST['edit_id'];
  $query      = mysqli_query($con, "UPDATE students SET name = '$name' ,kelas = '$kelas', absen = '$kelas', result = '$result' WHERE id = '$id'");
  if ($query) {
    header("location:index.php");
  }else{
    echo "<script>alert('Sorry update query not work')</script>";
  }
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP Crud Using Mysqli</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top: 70px;">
	<div class="row justify-content-center">
		<div class="col-md-10 text-center">
			<?php

  if(isset($_GET['update_id'])): ?>
  <?php $id = $_GET['update_id']; ?>
  <?php $query = mysqli_query($con, "SELECT * FROM students WHERE id = '$id' ");
  $r = mysqli_fetch_array($query);
  $name = $r['name'];
  $kelas = $r['kelas'];
  $absen  = $r['absen'];
  $result = $r['result'];
   ?>
    <form method="POST" action="update.php">
        <div class="form-group">
          <input type="text" name="student_name" class="form-control" placeholder="Masukan Nama..." required="" value="<?php echo $name; ?>">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="text" name="kelas" class="form-control" placeholder="Masukan Kelas..." required="" value="<?php echo $kelas; ?>">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="text" name="absen" class="form-control" placeholder="Masukan Absen..." required="" value="<?php echo $absen; ?>">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="text" name="result" class="form-control" placeholder="Enter result..." required="" value="<?php echo $result; ?>">
        </div><!-- form-group -->
        <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
        <div class="form-group">
          <input type="submit" name="update" class="btn btn-info" value="Edit Student">
        </div><!-- form-group -->
       </form><!-- form -->
<?php endif; ?>



		</div><!-- col -->
	</div><!-- row -->
</div><!-- container -->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>

</html>