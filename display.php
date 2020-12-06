
    <!DOCTYPE html>
<html lang="en">
<head>
  <title>Testimonial Sample</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  .table{
    border: 1px solid black;
  }
  </style>
</head>
<body>

<div class="container">
  <h2>Testimonial</h2>
              
  <table class="table">
    <thead>
      <tr>
        
        <th>Name</th>
        
        <th>Testimonial</th>
      </tr>
    </thead>
    <tbody>
    
    <?php

    $servername="localhost";
    $username="root";
    $password="";
    $database="testimonial";

    $conn=mysqli_connect($servername,$username,$password,$database);

    $sql = "select * from register ORDER BY id desc";

    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result))
    {
      echo '<tr>';
      
      echo '<td>'.$row['username'].'</td>';
     
      echo '<td>'.$row['testimonial'].'</td>';
      echo '</tr>';
    }
    ?>
    </tbody>
    </table>
    </div>

    </body>
    </html>