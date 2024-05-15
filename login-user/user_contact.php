<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <!-- links -->
    <link rel="stylesheet" href="home_page.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
<?php 
include 'user_navbar.php';
?>
    <!-- Content -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe class="col-md-12" height="800" id="gmap_canvas" src="https://maps.google.com/maps?q=Trichy&z=13&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                    <style>
                        /* .mapouter {
              position: relative;
              text-align: right;
              height: 500px;
              width: 600px;
            }
            .gmap_canvas {
              overflow: hidden;
              background: none !important;
              height: 500px;                                                                                                    
              width: 600px;
            } */
                    </style>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <i class="fa fa-envelope mr-2"></i> Contact us anytime!
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <!-- 
                  name [text]
                  number [number]
                  email [email]
                  message [textarea]
                  source [select]
               -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" placeholder="Enter your name" />
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <div class="ml-2 form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Male" id="gender" />
                                    <label class="form-check-label" for="gender">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female" />
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="others" value="Others" />
                                    <label class="form-check-label" for="others">Others</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile no.</label>
                                <input type="text" class="form-control" placeholder="+91 9876543212" />
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="abc@gmail.com" aria-describedby="emailHelp" />
                                <small id="emailHelp" class="form-text text-muted">
                  We'll never share your email with anyone else.
                </small>
                            </div>
                            <div class="form-group">
                                <label for="source">Came from</label>
                                <select name="source" id="source" class="form-control">
                  <option value="">--Select Option--</option>
                  <option value="Media">Media</option>
                  <option value="YouTube">Youtube</option>
                  <option value="By Mouth">By Mouth</option>
                </select>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" rows="5" class="form-control" placeholder="Enter message briefly"></textarea>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                <label class="form-check-label" for="exampleCheck1">
                  I agree to terms and conditions.
                </label>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>