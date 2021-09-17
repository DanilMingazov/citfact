<<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <a href="./2citfact.php">Link text here</a>
  <?php
      $conn = new mysqli("localhost", "root", "", "citfact");
    if($conn->connect_error){
      die("Ошибка: " . $conn->connect_error);
    }
    echo "Подключение успешно установлено";
    $sql = "SELECT * FROM users";
    if($result = $conn->query($sql)){
    $rowCount = $result ->num_rows;
    echo "<table><tr><th>ID</th><th>Name</th><th>Surname</th><th>number</th><th>address</th><tr>";
      foreach($result as $row){
        echo "<tr>";
          echo "<td>" . $row["id"] . "</td>";
          echo "<td>" . $row["name"] . "</td>";
          echo "<td>" . $row["surname"] . "</td>";
          echo "<td>" . $row["number"] . "</td>";
          echo "<td>" . $row["address"] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
      $result->free();
      } else{
        echo "ОШибка: " . $conn->error;
    }
    $conn->close();
  ?>
  
  <h3>Добавление нового пользователя</h3>
  <form action="" method="get">
      <p>ID</p> 
      <input type="text" name="id">
      <p>NAME</p>
      <input type="text" name="name">
      <p>SURNAME</p>
      <input type="text" name="surname">
      <p>NUMBER</p>
      <input type="text" name="numbers">
      <p>ADDRESS</p>
      <input type="text" name="address"> <br> <br>
      <input type="submit" name="add" value="Submit"/>
    </form> 
    <?php 
     
      if(isset($_GET['add'])) {
        $idForm = $_GET['id'];
        $nameform = $_GET['name'];
        $surnameForm = $_GET['surname'];
        $numberForm = $_GET['numbers'];
        $addressForm = $_GET['address'];
         $conn = new mysqli("localhost", "root", "", "citfact");
      if($conn->connect_error){
        echo "ERRORS";
      }
      else{
        echo "UDACHO";
     }
        $id = '"'.$conn->real_escape_string($idForm).'"'  ;
        $name = '"'.$conn->real_escape_string($nameform).'"' ;
        $surname ='"'.$conn->real_escape_string($surnameForm).'"';
        $number = '"'.$conn->real_escape_string($numberForm).'"';
        $address = '"'.$conn->real_escape_string($addressForm).'"';
        $query = "INSERT INTO users (id,name,surname,number,address) VALUES ($id,$name,$surname,$number,$address)";
        $result=$conn->query($query);
        if($result){
          echo "Success!";
        }
        else{
          die('Error:('.$mysqli->errno.')'.$conn->error);
        }
      }
        
    ?>
  
</body>
</html>
