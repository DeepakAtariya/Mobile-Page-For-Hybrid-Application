<?php 
require 'vendor/autoload.php';

?>

<html>
    <head>
  <!-- <title>Bootstrap Example</title> -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


        <script>
            var ajaxreq = new XMLHttpRequest();
            
            function ajaxcall() { 
                var file;
                ajaxreq.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status ==200 || this.status == 302){

                        console.log(ajaxreq.responseText);
                        // document.getElementById("space").innerHTML=this.responseText;
                        document.getElementById("modelBody").style.display = 'none';
                        document.getElementById("space").style.display = 'block';
                        
                        // modelfooter.appendChild(aTag);
                        var modelfooter = document.getElementById("modelfooter");
                        var aTag = document.createElement('a');
                        aTag.className = "btn btn-secondary";
                        aTag.setAttribute('href',"http://localhost/phpTask/");
                        aTag.innerHTML = "Another Response";
                        modelfooter.appendChild(aTag);
                    }else{
                        console.log("failure!"+ajaxreq.responseText);
                        document.getElementById("modelBody").style.display = 'none';
                        document.getElementById("space").style.display = 'block';
                        // document.getElementById("space").innerHTML = "Error!";
                        
                    }
                };
                
                var salut = document.getElementById("salut").value;
                var last_name = document.getElementById("last_name").value;
                var first_name = document.getElementById("first_name").value;
                var organisation = document.getElementById("organisation").value;
                var emailAddress = document.getElementById("emailAddress").value;
                var mobile = document.getElementById("mobile").value;
                var enquiry = document.getElementById("enquiry").value;
                var serviceProduct = document.getElementById("serviceProduct").value;
                console.log(serviceProduct);
                
                if(salut !== "0" && last_name !== "" && first_name !== "" && organisation !== "" && emailAddress !== "" && mobile !== "" && enquiry !== "" && !serviceProduct.includes("null")){
                        if(emailAddress.includes("@") && emailAddress.includes(".") && !isNaN(Number(mobile))){
                            ajaxreq.open("POST","MasterController.php?"+"salut="+salut+"&first_name="+first_name+"&last_name="+last_name+"&organisation="+organisation+"&emailAddress="+emailAddress+"&mobile="+mobile+"&enquiry="+enquiry+"&serviceProduct="+serviceProduct, true);
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
require 'preload.php';

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
                  <label for="">Service:</label>
                  <select class="form-control" name="serviceProduct" id="serviceProduct">
                            <option style="max-width:100%;overflow:hidden;text-overflow:ellipsis" value="null">Select item...</option>
                    <?php 
                        foreach ($msg as $row) {?>
                            <option style="max-width:100%;overflow:hidden;text-overflow:ellipsis" value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                        <?php
                        }
                        ?>
                    
                  </select>
                </div>
                <div class="form-group">
                    <label for=''>Salutation:</label>
                    <select name="salut" id="salut" class="form-control dropdown-select">
                        <option value="0">Select...</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Mr.">Mr.</option>
						<option value="Mrs.">Mrs.</option>
                        <option value="Dr.">Dr.</option>
					</select>
                </div>
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" required>
                </div>
                <div class="form-group">
                    <label for="name">Organisation:</label>
                    <input type="text" class="form-control" name="organisation" id="organisation" required>
                </div>
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" name="emailAddress" id="emailAddress" required>
                </div>
                <div class="form-group">
                    <label for="number">Mobile:</label>
                    <input type="text" maxlength=10 class="form-control" name="mobile" id="mobile" required>
                </div>
                <div class="form-group">
                    <label for="comment">Enquiry:</label>
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