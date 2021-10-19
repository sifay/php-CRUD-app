<?php 
  
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "crud_app";
  $conn = mysqli_connect($server, $username, $password,$database);
  if(!$conn) {
      die("Error");
  } else{
      echo "success";
  }
 
  if(isset($_POST['submit'])) {
      $name = $_POST['name'];
      $roll = $_POST['roll'];
      
      $img_name = $_FILES['upload']['name'];
      $tmp_name = $_FILES['upload']['tmp_name'];
      move_uploaded_file($tmp_name, "upload/".$img_name);
      $sql = "INSERT INTO `config`(`name`, `roll`, `img`) VALUES ('$name','$roll','$img_name')";
      
      $result = mysqli_query($conn, $sql);
    
    if($result) {
      echo "true";
    } else{
      echo mysqli_error($conn);
    }
  }

   if(isset($_GET['status'])) {
     if($_GET['status']= 'delete') {
       $deleid = $_GET['id'];
       $query = "DELETE FROM config WHERE id=$deleid";
       if(mysqli_query($conn, $query)) {
         
       }
     }
   }

?>

<?php 
$sql = "SELECT * FROM `config`";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
//  <td>". $row['img'] ."</td>
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
   <form action="index.php" method="post" enctype="multipart/form-data">
   <h2><a style="text-decoration: none;" href="index.php">PHP CRUd APP </a></h2>
   <label class="form-label">Your name</label>
  <input class="form-control form-control" type="text" name="name" placeholder="Enter your name" aria-label=".form-control-lg example">
  <label class="form-label">Your Roll</label>
  <input class="form-control form-control" type="text" name="roll" placeholder="Enter your roll" aria-label=".form-control-lg example">
  <label class="form-label">Upload your image</label>
  <input class="form-control form-control" type="file" name="upload" aria-label=".form-control-lg example">
  <input class="form-control bg-warning" type="submit" name="submit" value="Submit">
   </form>
  </div>

  <div class="container my-4 p-4 shadow">
     <table class="table table-responsive">
        <thead>
            <tr>
                
                <th scope="col">Name</th>
                <th scope="col">Role</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
          <!--
            <tr>
                
                <td>Sifat</td>
                <td>1</td>
                <td>Image</td>
                <td>
                    <a class="btn btn-success" href="#">Edit</a>
                    <a class="btn btn-warning" href="#">Delete</a>

                </td>
            </tr>
--> 
  
  
  
   <?php  while($row = mysqli_fetch_assoc($result)) { ?>
    
    <tr>
      <th><?php echo $row['name'];?></th>
      <td><?php echo $row['roll'];?></td>
      <td> <img style="height: 100px; weight: 100px;" src="upload/<?php echo $row['img'];?>"> </td>
      <td>  <a class='btn btn-success' href='edit.php?status=edit&&id=<?php echo $row['id'];?>'>Edit</a>
      <a class='btn btn-warning' href='?status=delete&&id=<?php echo $row['id']?>'>Delete</a> </td>
    </tr>
    <?php } ?>
    


  

  
 
     
          
        </tbody>
     </table>
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