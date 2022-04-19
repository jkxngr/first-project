<?php include "header.php"; ?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Photo</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <?php
        include "config.php";
        $photo_id = $_GET['id'];
        $sql="select * from gallery where gallery.photo_id = {$photo_id}";

        $result = mysqli_query($conn,$sql) or die("Query failed");
                  if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                      
        ?>
        <!-- Form for show edit-->
        <form action="save-update-photo.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            
            <input type="hidden" name="photo_id"  class="form-control" value="<?php echo $photo_id;?>" placeholder="">
                        
            <?php
                include "config.php";
                $sql1 = "Select * from gallery";    
                $result1 = mysqli_query($conn,$sql1) or die ("Query failed.");
            ?>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-photo">
                    <img  src="gallery/<?php echo $row['photo']; ?>" height="150px">
                <input type="hidden" name="old_photo" value="<?php echo $row['photo']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
                <option disabled> Select Category</option>
                                
                                <?php
                                include "config.php";
                                $sql1 = "Select * from category";
    
                                $result1 = mysqli_query($conn,$sql1) or die ("Query failed.");

                                if(mysqli_num_rows($result1)>0){
                                    while($row1 = mysqli_fetch_assoc($result1)){
                                        if($row['category']==$row1['category_id']){
                                            $selected = "selected";

                                        }else{
                                            $selected = "";

                                        }
                                        echo "<option {$selected} value='{$row1['category_id']}'>{$row1['category_name']}</option>";

                                    }
                                   }                                                                                           
                                ?>
                </select>
            </div>

            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <?php
                    }
                }else{
                    echo "Result Not found";
                }
        
        ?>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>












