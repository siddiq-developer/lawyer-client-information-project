
<?php include('includes/header.php') ?> 
<?php include('includes/connDB.php')?>
<a href="./form.php" class="btn btn-primary">Client / Add</a>
    <table class="table">
    <thead>
        <tr>
        <th>id</th>
        <th>picture</th>
        <th>name</th>
        <th>cnic</th>
        <th>phone</th>
        <th>email</th>
        <th>description</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM client";
    // error_reporting(0);

    $data =  mysqli_query($conn, $query);
    $total =  mysqli_num_rows( $data);
    // $result = mysqli_fetch_assoc($data);
    // echo $result; 

   $id = 0;
    if($total != 0){
    // echo "Table has records";
    ?>
<?php
    while( $result = mysqli_fetch_assoc($data)){
        $id = $id +  1;
      echo  "<tr>
            <th>".$id."</th>
            <td><img src= '".$result['picture']."' height='50px' width='100px'</td>
            <td>".$result['name']."</td>
            <td>".$result['cnic']."</td>
            <td>".$result['phone']."</td>
            <td>".$result['email']."</td>
            <td>".$result['description']."</td>
            <td><a href='update.php?id=$result[id]' value='Update' onclick = 'return checkdelete()' class='btn btn-success m-2'><i class='fa-solid fa-pen-to-square'></i></a><a href='delete.php?id=$result[id]' value='Delete' onclick = 'return checkdelete()' class='btn btn-danger'>
            <i class='fa-solid fa-trash'></i></a><td>
            </tr>";
    }}else{
    // echo "No records found";
    }
    ?>
    <tr>
        <td>First Name</td>
        <td>last Name</td>
        <td>Roll no</td>
        <td>picture</td>
        <td>description</td>
        <td>picture</td>
        <td>description</td>
    </tr>
    <tr>
        <td>First Name</td>
        <td>last Name</td>
        <td>Roll no</td>
        <td>picture</td>
        <td>description</td>
        <td>picture</td>
        <td>description</td>
    </tr>
    </tbody>
    </table>
    <?php include('includes/footer.php') ?>
