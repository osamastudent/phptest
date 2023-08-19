<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"/>
 <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>


</head>
<body>
<br><br>    

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

<table id="myTable" class="table">
        <thead>
    <tr>
      <th >index</th>
      <th>Phone No</th>
      <th>name</th>
      <th>Address</th>
      <th>Email</th>
      <th>Password</th>
      <th>Actions</th>
    </tr>
  </thead>
        
  <tbody>
<?php
        include'conn.php';

        $select=mysqli_query($conn,"select * from admin");
$key=0;
while($row=mysqli_fetch_array($select))
{
$key++;

?>

   <tr>
      <th scope="row"><?php echo  $key; ?></th>
      <td><?php  echo $row[1]; ?></td>
      <td><?php  echo $row[2]; ?></td>
      <td><?php  echo $row[3]; ?></td>
      <td><?php  echo $row[4]; ?></td>
      <td><?php  echo $row[5]; ?></td>
      <td><a href="index.php?update=<?php echo $row["a_id"];  ?>">Update</a> 
      <a href="index.php?delete=<?php echo $row["a_id"];  ?>">Delete</a> 
    </td>
    </tr>
       

<?php
}
?>
 
       
 </tbody>
    </table>
    <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

</body>
</html>