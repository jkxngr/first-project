<?php include "header.php";
if(isset($_POST['save'])){
   include "config.php";

   $c_name  = mysqli_real_escape_string($conn, $_POST['cat']);
  

     $sql = "Select category_name from category where category_name ='{$c_name}'";
    
    $result = mysqli_query($conn,$sql) or die ("Query failed.");

    if(mysqli_num_rows($result)>0){
        echo "<p style='color:red;text-align:center;margin:10px 0'>Category already exists.</p>";

    }
    else{
        $sql1="insert into category(category_name) values('{$c_name}')";
        if(mysqli_query($conn,$sql1)){
            header("location:{$hostname}/admin/category.php");
        }
    }
 }
                                      
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
