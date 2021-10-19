<?php 
  if(isset($_POST['s_submit'])) {
    $name = $_POST['s_name'];
    $roll = $_POST['s_roll'];
    $img = $_FILES['s_upload']['name'];
    $tmp_name = $_FILES['s_upload']['tmp_name'];
    move_uploaded_file($tmp_name, 'upload/'.$img);
    $id = $_GET['id'];
    $conn = mysqli_connect("localhost", "root", "", "crud_app");

    $query = "UPDATE config SET name='$name', roll='$roll', img='$img' WHERE id=$id";
    
    if(mysqli_query($conn, $query)) {
       return "Successfully add on for mation";
    }
    
  }
?>
  <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
   
  <div class="container shadow p-4 my-4">
    <?php 
     $conn = mysqli_connect("localhost", "root", "", "crud_app");
     $id = $_GET['id'];
     echo $id;
     $sql = "SELECT * FROM config WHERE id = {$id}";
     $results = mysqli_query($conn, $sql) or die("Error");
     if(mysqli_num_rows($results) > 0) { 
       while($row = mysqli_fetch_assoc($results)) {
    ?>
   <form action="#" method="post" enctype="multipart/form-data">
   <h2><a style="text-decoration: none;" href="index.php">PHP CRUd APP </a></h2>
   <label class="form-label">Your name</label>
  <input class="form-control form-control" value="<?php echo $row['name']?>" type="text" name="s_name" placeholder="Enter your name" aria-label=".form-control-lg example">
  <label class="form-label">Your Roll</label>
  <input class="form-control form-control" value="<?php echo $row['roll']?>" type="text" name="s_roll" placeholder="Enter your roll" aria-label=".form-control-lg example">
  <label class="form-label">Upload your image</label>
  <input class="form-control form-control" type="file" name="s_upload" aria-label=".form-control-lg example">
  <input class="form-control bg-warning" type="submit" name="s_submit" value="Submit">
   </form>
   <?php 
    }
  }
   ?>
  </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
   
  </body>
</html>