<?php
$db = mysqli_connect("localhost", "root", "", "e_commerce");
?>

<!-- view data in a table -->
 <div style=" overflow-x: auto; overflow-y: hidden; padding: 10px; border: 1px solid #ddd; border-radius: 10px;margin-top: 20px;">
    <legend style="text-align: center;"><h2>users data</h2></legend>
  <table border="1"  style="border-collapse: collapse; margin: 0 auto; ">
   <tr>
    <th>id</th>
    <th>username</th>
    <th>password</th>
</tr>

<?php
$result = $db->query("SELECT * FROM users") or die($db->error()) ;
while(list($id, $username, $password) = mysqli_fetch_row($result)){
    echo "<tr><td>$id</td><td>$username</td><td>$password</td></tr>";
}                     
?>
  </table>
</div>

