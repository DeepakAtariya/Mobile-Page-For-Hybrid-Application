
<?php
include 'resources/bootstrap.php';
require 'resources/preload.php';

//get Service data

?>

<div class="container jumbotron" style="background-color:white">
    <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Ask! 
  </button>
    <p><?php  ?></p>
  

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Enquiry Form:</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form action="controller/MasterController.php" method="post">

                <div class="form-group">
                  <label for=""></label>
                  <!--  max-width: 100%;
    overflow: hidden;
    text-overflow: ellipsis; -->
                  <select class="form-control" name="serviceProduct" id="serviceProduct">
                    <?php 
                        foreach ($msg as $row) {?>
                            <option style="max-width:100%;overflow:hidden;text-overflow:ellipsis" value="<?php echo $row["name"] ?>"><?php echo $row["name"] ?></option>
                        <?php
                        }
                        ?>
                    
                  </select>
                </div>
                <div class="form-group">
                    <label for="name">Name :</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>
                <div class="form-group">
                    <label for="name">Organisation :</label>
                    <input type="text" class="form-control" name="organisation" id="organisation" required>
                </div>
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" name="emailAddress" id="emailAddress" required>
                </div>
                <div class="form-group">
                    <label for="number">Mobile :</label>
                    <input type="text" maxlength=10 class="form-control" name="mobile" id="mobile" required>
                </div>
                <div class="form-group">
                    <label for="comment">What is your enquiry :</label>
                    <textarea class="form-control" name="enquiry" id="enquiry" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
            </form>
           
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

</div>

<script>

    // $(document).ready(function(){
    //     $("#submit").click(function(){
    //         var username = $('#username');
    //         var username = $('#organisation');
    //         var username = $('#emailAddress');
    //         var username = $('#mobile');
    //     });
    // });
</script>
