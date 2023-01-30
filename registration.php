<!DOCTYPE html>
<html>
    <head>

         <!-- LOGO ----->
   <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">

        <title>पंजीकरण फॉर्म </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Jaldi&family=Karma:wght@700&family=Poppins:ital,wght@1,300&family=Rozha+One&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <!--Get your code at fontawesome.com-->

        <!--Main StyleSheet 
        <link rel="stylesheet" type="text/css" href="assets/css/registration.css">
        -->
        <link rel="stylesheet" type="text/css" href="assets/css/registration.css">

    </head>
    

    <body >
    <center>
        <div class="container">
        <h1> राजभाषा प्रकोष्ठ </h1>
        
        <fieldset>
         <form class="needs-validation" novalidate method="post">

         <h3> पंजीकरण फॉर्म </h3>
         <hr width="80%">
            <!-- CREATING FORM -->

            <div class="form-group">
                <label for="fname">नाम:</label>
                <input type="text" id="fname" name="fname" class="form-control" placeholder="Name" required>
                <div class="invalid-feedback">कृपया  इस स्थान को भरें</div>
            </div>
            
            <div class="form-group">    
                <label for="adnmb">अनुक्रमांक संख्या:</label>
                <input type="text" id="adnmb" name="adnmb" class="form-control" placeholder="Admission number" required>
                <div class="invalid-feedback">कृपया  इस स्थान को भरें</div>
            </div>
            
            <div class="form-group">
                <label for="phone">मोबाइल नंबर:</label>
                <input type="tel" id="phone" name="phone" class="form-control" pattern="[0-9]{10}" placeholder="Mobile number" required>
                <div class="invalid-feedback">कृपया अपना मोबाइल न. सही भरें</div>
            </div>    
            
            <div class="form-group">
                <label for="email">ईमेल:</label>
                <input type="text" id="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  placeholder="Email" required>
            <div class="invalid-feedback">कृपया  इस स्थान को भरें</div>
            </div>
            
            <div class="form-group">
            <label for="eventn">प्रतिस्पर्धा:</label>
            <select id="eventn" name="eventn" class="form-control" required>
                  <!-- <option value="Shruti-lekhan" selected>श्रुतिलेख प्रतियोगिता - 02/09/2021</option>
                  <option value="Vad-vivad" >वाद विवाद प्रतयोगिता - 04/09/2021</option>
                  <option value="Kahani-lekhan">कहानी लेखन प्रतियगिता - 05/09/2021</option>
                  <option value="Khula-manch">खुला मंच प्रतियोगिता - 08/09/2021</option>
                  <option value="Kavya-path">काव्य पाठ प्रतियोगिता - 11/09/2021</option> -->
                  <option value="देशभक्ति रचनाये">देशभक्ति रचनाये प्रतियोगिता - 07/01/22</option>
                  <option value="श्रुति सुधार">श्रुति सुधार प्रतियोगिता - 08/01/22</option>
                  <option value="बस एक मिनट">बस एक मिनट प्रतियोगिता - 09/01/22</option>
                  <option value="वर्ग-पहेली">वर्ग-पहेली प्रतियोगिता - 09/01/22</option>
                  <option value="वाक्यांश धारणा">वाक्यांश धारणा प्रतियोगिता - 09/01/22</option>
                </select>
                <div class="invalid-feedback">कृपया  इस स्थान को भरें</div>
            </div>
            
                 <center><input id="submit" type=submit value="जमा करें"></center>

                 <br><br>
            
         </form>
        </fieldset>

        </div>
        </center>

    <script>
        //BOOTSTRAP CODE
        // Disable form submissions if there are invalid fields,
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
        </script>

        <?php
        
        //CREATING DATABASE
        
        //name of database is hindicell, username is 'me', pwd is '1234'
        $pdo = new PDO('mysql:host=sql308.epizy.com;port=3306;dbname=epiz_26614913_hindicell', 'epiz_26614913','A3VXD6TEuHZcrP'); 
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //TO PREVENT HTML INJECTION
            
            if(isset($_POST['fname'])&&isset($_POST['adnmb'])&&isset($_POST['phone'])&&isset($_POST['email'])&&isset($_POST['eventn']))
              {

                //TO CHECK IF PREVIOUS RECORD EXISTS AND PREVENT FROM RE-SUBMITTING
                
                $stmtt = $pdo->prepare('SELECT COUNT(*) AS num FROM eventreg WHERE adnmb = :adnmb OR phone = :phone OR email = :email'); 
                $stmtt->execute(array(
                    ':adnmb' => $_POST['adnmb'],
                    ':phone' => $_POST['phone'],
                    ':email' => $_POST['email']
                    
                  ));
                $stmtt->execute();
                $row = $stmtt->fetch(PDO::FETCH_ASSOC);
                if($row['num'] > 0){
                    echo "<script> alert('आप पहले ही पंजीकरण कर चुके है ! ') </script>";
              } 
            
            else
             { 
               
              //TO INSERT A NEW RECORD
              
              $stmt = $pdo->prepare('INSERT IGNORE INTO eventreg(fname, adnmb, phone, email, eventn) VALUES ( :fname, :adnmb, :phone, :email, :eventn)');
               $stmt->execute(array(
                ':fname' => $_POST['fname'],
                ':adnmb' => $_POST['adnmb'],
                ':phone' => $_POST['phone'],
                ':email' => $_POST['email'],
                ':eventn' => $_POST['eventn']
              ));
              echo "<script> alert('पंजीकरण सफल हुआ !') </script>";
             }
            }
        ?>

    </body>
</html>
