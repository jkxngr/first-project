<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All photos</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-photo.php">add photo</a>
              </div>
              <div class="col-md-12">

              <?php
                   include "config.php";
                   $limit = 5;
                   
                   if(isset($_GET['page'])){
                       $page = $_GET['page'];
                   }
                   else{
                       $page = 1;
                   }


                   $offset = ($page - 1)* $limit;

                  
                   
                    $sql = "select * from gallery as g inner join category as c on g.category=c.category_id  order by g.photo desc limit {$offset},{$limit}";
                    



                    

                   $result = mysqli_query($conn,$sql) or die('Query failed');
                   if(mysqli_num_rows($result)>0){
                          
                   
                  
                  
                  ?>

                  <table class='content-table'>
                      <thead>
                          <th>S.No.</th>
                          <th>Date</th>
                          <th>Photo name</th>
                          <th>Category</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                      <?php while($row = mysqli_fetch_assoc($result)){ ?>
                          <tr>
                              <td class='id'><?php echo $row['photo_id']; ?></td>
                              <td><?php echo $row['photo_date']; ?></td>
                              <td><?php echo $row['photo']; ?></td>
                              <td><?php echo $row['category_name']; ?></td>
                              <td class='edit'><a href='update-photo.php?id=<?php echo $row['photo_id']; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-photo.php?id=<?php echo $row['photo_id']; ?> '><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                          <?php } ?>
                      </tbody>
                  </table>
                   <?php 
                     }   else{
                         echo '<h3>No result found.</h3>';
                     }

                     $sql1 = "Select * from gallery" ;
                     $result1 = mysqli_query($conn,$sql1) or die ("Query failed.");
                     if(mysqli_num_rows($result1)> 0 ){
                         $total_records = mysqli_num_rows($result1);
                        
                         $total_page = ceil($total_records / $limit);

                         echo '<ul class="pagination admin_pagination">';
                         if($page > 1){
                            echo '<li><a href="photos.php?page='.($page-1).'">Prev</a></li>';
                         }

                        
                         for($i = 1;$i <= $total_page;$i++){
                          if($i==$page){
                              $active="active";
                          }          
                          else{
                              $active = "";
                          }




                             echo '<li class=" '.$active.' "><a href="photos.php?page='.$i.'">'.$i.'</a></li>';
                             }
                            
                             if($total_page > $page){
                                echo '<li><a href="photos.php?page='.($i-1).'">Next</a></li>';
                             }
                             echo '</ul>';

                     }
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
