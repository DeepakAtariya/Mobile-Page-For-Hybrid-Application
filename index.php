<html>
    <head>
        <script>
            var ajaxreq = new XMLHttpRequest();
            
            function ajaxcall() { 
                ajaxreq.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status ==200 || this.status == 302){
                        // document.getElementById("space").innerHTML=this.responseText;
                        document.getElementById("modelBody").style.display = 'none';
                        document.getElementById("space").style.display = 'block';
                        
                        // modelfooter.appendChild(aTag);
                    }else{
                        document.getElementById("modelBody").style.display = 'none';
                        document.getElementById("space").style.display = 'block';
                        // document.getElementById("space").innerHTML = "Error!";
                    }
                };
                var modelfooter = document.getElementById("modelfooter");
                var aTag = document.createElement('a');
                aTag.className = "btn btn-secondary";
                aTag.setAttribute('href',"http://localhost/phpTask/");
                aTag.innerHTML = "Another Response";
                modelfooter.appendChild(aTag);

                var username = document.getElementById("username").value;
                var organisation = document.getElementById("organisation").value;
                var emailAddress = document.getElementById("emailAddress").value;
                var mobile = document.getElementById("mobile").value;
                var enquiry = document.getElementById("enquiry").value;
                var serviceProduct = document.getElementById("serviceProduct").value;
                
                // if(!username === "" && !organisation.isEmpty() && ! (!emailAddress.isEmpty() && emailAddress.includes("@") && emailAddress.includes(".")) && (!mobile.isEmpty() && Number(mobile)!=="NaN") && !enquiry.isEmpty() && !serviceProduct.includes("null")){
                if(username !== "" && organisation !== "" && emailAddress !== "" && mobile !== "" && enquiry !== "" && !serviceProduct.includes("null")){
                        if(emailAddress.includes("@") && emailAddress.includes(".") && !isNaN(Number(mobile))){
                            ajaxreq.open("POST","controller/MasterController.php?username="+username+"&organisation="+organisation+"&emailAddress="+emailAddress+"&mobile="+mobile+"&enquiry="+enquiry+"&serviceProduct="+serviceProduct, true);
                            ajaxreq.send();
                        }else{
                            alert("Invalid Input!");
                        }
                }else{
                    alert("Enter Values!");
                }
                
            }
        </script>

    </head>
    <body>
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
        
        <!-- Service message -->
        <h2 class="text-center" id="space" style="display:none">Thank you!</h2>

        <!-- Modal body -->
        <div class="modal-body" id="modelBody">
            <form>

                <div class="form-group">
                  <label for=""></label>
                  <select class="form-control" name="serviceProduct" id="serviceProduct">
                            <option style="max-width:100%;overflow:hidden;text-overflow:ellipsis" value="null">Select item...</option>
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
                <button type="button" class="btn btn-primary" id="submit" onclick="ajaxcall()">Submit</button>
            </form>
           
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer" id="modelfooter">
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

</body></html>