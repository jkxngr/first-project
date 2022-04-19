
<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Photo</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="save-photo.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label>Photo</label>
                          <input type="file" name="photoss" class="form-control" placeholder="photo" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control">
                              <option disabled> Select Category</option>
                                
                                <?php
                                include "config.php";
                                $sql = "Select * from category";
    
                                $result = mysqli_query($conn,$sql) or die ("Query failed.");

                                if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";

                                    }
                                   }                                                                                           
                                ?>

                          </select>
                      </div>
                        <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
