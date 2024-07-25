

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #333333;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>  -->
</head>
<body>


<?php 
include "connection.php";

if (isset($_GET['edit'])) {
                                    $edit_id = $_GET['edit'];
                                    $edit_query = "SELECT * FROM users_admin WHERE ID_admin=?";
                                    $stmt = $conn->prepare($edit_query);
                                    $stmt->bind_param("i", $edit_id);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $edit_row = $result->fetch_assoc();
                                    $stmt->close();}
                                ?>
                                <hr>
                                <h2>Edit Admin</h2>
                                <form action="" method="post" novalidate="novalidate">
                                    <input type="hidden" name="edit_ID_admin" value="<?php echo $edit_row['ID_admin']; ?>">
                                    <div class="form-group">
                                        <label for="edit_username" class="control-label mb-1">Username:</label>
                                        <input name="edit_admin_name" type="text" class="form-control" value="<?php echo $edit_row['admin_name']; ?>" required>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="edit_email" class="control-label mb-1">Email:</label>
                                        <input name="edit_email" type="email" class="form-control cc-name valid" value="<?php echo $edit_row['email']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_password" class="control-label mb-1">Password:</label>
                                        <input name="edit_password" type="password" class="form-control cc-number identified visa" value="<?php echo $edit_row['password']; ?>" required>
                                    </div>
                                    <input type="submit" name="update" value="Update">
                                </form>

                                <?php
                                 if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
                                    $edit_id = $_POST['edit_id_admin'];
                                    $edit_admin_name = $_POST['edit_admin_name'];
                                    $edit_email = $_POST['edit_email'];
                                    $edit_password = $_POST['edit_password'];
            
                                    $stmt = $conn->prepare("UPDATE `users_admin` SET `admin_name`=?, `email`=?, `password`=? WHERE `ID_admin`=?");
                                    $stmt->bind_param("sssi", $edit_admin_name, $edit_email, $edit_password, $edit_id);
            
                                    if ($stmt->execute()) {
                                       header("location: manage_admin.php");
                                    } else {
                                        echo "Error: " . $stmt->error;
                                    }
                                    $stmt->close();
                                }
                                ?>

</body>
</html>
