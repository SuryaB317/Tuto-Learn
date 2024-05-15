<?php
// Start session
session_start();

// Access session variable
$uid = $_SESSION['uid'];

// Use the session variable as needed in your page
//echo "User ID: $uid";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

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

        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" style="height: 20%;">
                <div class="carousel-item carousel-image bg-img-1 active">
                    <img class="w-100" src="../img/bg1.jpg" class="d-block w-100" alt="Image 1">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-black text-uppercase mb-md-3">Learning Platform</h4>
                            <h1 class="display-3 text-black mb-md-4">Best Turors and 24/7 Helps</h1>
                            <!-- <a href="sign-in.php" class="btn btn-dark py-md-3 px-md-5 mt-2 rounded-pill">Register</a> -->
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../img/img8.jpg" class="d-block w-100" alt="Image 2">
                </div>
                <div class="carousel-item">
                    <img src="../img/img7.jpg" class="d-block w-100" alt="Image 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>

        <br>
        <br>
        <br>
        <hr>
        <div class="container">
            <div class="row ">
                <h1>Topics Recommand for you...</h1>
                <h1><?php echo"$uid"?></h1>
                <br>
                <div class="col">
                    <button type="button" class="btn btn-info">Java Core Program</button>
                    <button type="button" class="btn btn-info">CPP Core Program</button>

                    <button type="button" class="btn btn-info">Java SpringBoot</button>
                    <button type="button" class="btn btn-info">Maven SpringBoot</button>

                    <button type="button" class="btn btn-info">REST API</button>
                    <button type="button" class="btn btn-info">JS REST API</button>

                    <button type="button" class="btn btn-info">Spring MVC</button>
                    <button type="button" class="btn btn-info">C# MVC</button>
                </div>
            </div>
        </div>
        <br>
        <br>
        <hr>
        <div class="container mt-5">
            <div class="row">
                <!-- Left column for text content -->
                <div class="col-md-6">
                    <div class="content">
                        <h1>First Thing Before we Start!</h1>
                        <h2>Getting ready?</h2>

                        <p>E Learning platform is the web Application which, all are almost<br> helps the user to learn newer technology and needed skills to upgrade</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa eaque fuga tenetur atque provident recusandae soluta ut, dolorem voluptatum eligendi iste, architecto fugit voluptatem ab!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa eaque fuga tenetur atque provident recusandae soluta ut, dolorem voluptatum eligendi iste, architecto fugit voluptatem ab!</p>

                    </div>

                </div>

                <!-- Right column for the image with light color border -->
                <div class="col-md-6">
                    <div class="content text-center border rounded p-3">
                        <img src="../img/img4.jpg" class="img-fluid" alt="Image">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <hr>
        <div class="container mt-5">
            <div class="row">
                <!-- Right column for the image with light color border -->
                <div class="col-md-4">
                    <div class="content text-center border rounded p-3">
                        <img src="../img/img6.png" class="img-fluid h-20" alt="Image">
                    </div>
                </div>

                <!-- Left column for text content -->
                <div class="col-md-6">
                    <div class="content">
                        <h1>Second Thing Before we Start!</h1>
                        <h2>Getting ready?</h2>

                        <p>E Learning platform is the web Application which, all are almost<br> helps the user to learn newer technology and needed skills to upgrade</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa eaque fuga tenetur atque provident recusandae soluta ut, dolorem voluptatum eligendi iste, architecto fugit voluptatem ab!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa eaque fuga tenetur atque provident recusandae soluta ut, dolorem voluptatum eligendi iste, architecto fugit voluptatem ab!</p>

                    </div>
                </div>
            </div>
        </div>

        <br>
        <hr>
        <div class="container mt-5">
            <div class="row">
                <!-- Left column for text content -->
                <div class="col-md-6">
                    <div class="content">
                        <h1>Third Thing Before we Start!</h1>
                        <h2>Getting ready?</h2>

                        <p>E Learning platform is the web Application which, all are almost<br> helps the user to learn newer technology and needed skills to upgrade</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa eaque fuga tenetur atque provident recusandae soluta ut, dolorem voluptatum eligendi iste, architecto fugit voluptatem ab!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa eaque fuga tenetur atque provident recusandae soluta ut, dolorem voluptatum eligendi iste, architecto fugit voluptatem ab!</p>

                    </div>

                </div>

                <!-- Right column for the image with light color border -->
                <div class="col-md-6">
                    <div class="content text-center border rounded p-3">
                        <img src="../img/img5.jpg" class="img-fluid" alt="Image">
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Autoplay script -->
        <script>
            // Enable carousel autoplay
            document.getElementById('carouselExampleAutoplaying').carousel({
                interval: 2000 // Adjust the interval as needed (in milliseconds)
            });
        </script>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>