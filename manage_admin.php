<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <a href="manage_admin.php"></a>
</body>

</html>



<?php include('includes/admin_header.php') ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Admin</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Admin</h3>
                            </div>
                            <hr>
                            <form action="" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="username" class="control-label mb-1">username :</label>
                                    <input name="admin_name" type="text" class="form-control" required>
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Email :</label>
                                    <input name="email" type="email" class="form-control cc-name valid" required>
                                </div>
                                <div class="form-group">
                                    <label for="cc-number" class="control-label mb-1">Password :</label>
                                    <input name="password" type="password" class="form-control cc-number identified visa" required>
                                </div>
                                <input type="submit" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-t-30">
                <div class="col-md-12">
                    <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3">
                            <thead>
                                <tr>
                                    <th>ID_admin</th>
                                    <th>admin_name</th>
                                    <th>email</th>
                                    <th>password</th>

                                </tr>
                            </thead>
                            <?php
                       include "connection.php";
                       if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $admin_name = $_POST['admin_name'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                    
                        $stmt = $conn->prepare("INSERT INTO `users_admin`( `admin_name`, `email`, `password`) VALUES ( ? , ? , ?)");
                        $stmt->bind_param("sss", $admin_name, $email, $password);
                    
                        if ($stmt->execute()) {
                            // echo "New record created successfully";
                        } else {
                            echo "Error: " . $stmt->error;
                        }
                        $stmt->close();
                    }

                       $query = "SELECT * FROM users_admin";
                       $result = $conn->query($query);
                       
                       if ($result->num_rows > 0) {
                           while ($row = $result->fetch_assoc()) {
                               echo "<tr>";
                               echo "<td>{$row['ID_admin']}</td>";
                               echo "<td>{$row['admin_name']}</td>";
                               echo "<td>{$row['email']}</td>";
                               echo "<td>{$row['password']}</td>";
                               echo "</tr>";
                           }
                       }
    
                     
                       
                       $conn->close(); ?>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>
        </div>

    </div>

</div>
<?php include('includes/admin_footer.php') ?>