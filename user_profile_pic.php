<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile Photo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        #content {
            padding: 20px;
        }
        
        #profileImage {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        
        #profilePhoto {
            display: none;
        }
        
        .custom-file-label {
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-5" id="content">
                <h2 class="text-center">Edit Profile Photo</h2>
                <form>
                    <div class="form-group text-center">
                        <label for="profilePhoto" class="custom-file-label">Choose a new profile photo:</label>
                        <br>
                        <input type="file" class="custom-file-input" id="profilePhoto" accept="image/*">
                        <label class="custom-file-label" for="profilePhoto">Choose file</label>
                        <img src="img/img2.png" alt="Profile Image" id="profileImage" class="img-fluid">
                    </div>
                    <button type="button" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>