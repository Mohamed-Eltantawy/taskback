<?php
require_once './includes/connection.php';
$id = $_GET['id'];

if(isset($_POST['edit_employee'])) { 
    $name = $_POST['name'];
    $salary = $_POST['salary'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    $sql = "UPDATE employees SET name='$name' , salary='$salary' , 
    address='$address' , gender='$gender' WHERE id=$id";

    $updateRes = mysqli_query($conn , $sql);

    if($updateRes) { 
        header('location: index.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once './head.php'; ?>
</head>
<body>
    <h2 class="my-5 text-center container 
        p-3 w-50 bg-success opacity-75 text-light border shadow">
       Edit Employee
    </h2>

    <?php
        $selectSql = "SELECT * FROM employees WHERE id=$id";
        $selectedData = mysqli_query($conn , $selectSql);
        $row = mysqli_fetch_assoc($selectedData);
    ?>
    <div class="container bg-light p-5 mx-auto w-50 border shadow">
        <form action="" method="post">
            <div class="form-group my-1">
                <label for="name">Employee Name</label>
                <input type="text" class="form-control" name="name"
                placeholder="Employee Name"
                value="<?php echo $row['name'] ?>"
                ></div>
            <div class="form-group my-1">
                <label for="salary">Emloyee Salary</label>
                <input type="number" name="salary"
                placeholder="Employee Salary"
                 class="form-control"
                 value="<?php echo $row['salary'] ?>" 
                ></div>
            <div class="form-group my-1">
                <label for="address">Employee Address</label>
                <input type="text" class="form-control" name="address"
                placeholder="Employee Address"
                value="<?php echo $row['address'] ?>"
                >
            </div>
            <div class="form-group mt-2 mb-1">
                <label for="male" class="mx-1">Male</label>
                <input type="radio" name="gender" value="male"
                <?php echo $row['gender'] == 'male' ? "checked" : "" ?>
                >
                <label for="female" class="mx-1">Female</label>
                <input type="radio" name="gender" value="female"
                <?php echo $row['gender'] == 'female' ? "checked" : "" ?>
                >
            </div>
            <input type="submit" value="Edit Employee" 
            class="mt-3 mx-1 btn btn-success" name="edit_employee">
            <a href="/index.php" class="mx-1 mt-3 btn btn-info">Return to index</a>
        </form>
    </div>
</body>
</html>