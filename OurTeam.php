<?php
$host = "localhost";   
$user = "root";       
$pass = "";             
$db   = "praktyki";   

$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}
?>
<?php include 'Ourteamheader.php'; 
$sql = "SELECT * FROM employers";
$result = $conn->query($sql);
print_r($result);
?>
    
      <div class="ourteam">
        <div class="ourteam__title">
          <h1>Our Team</h1>
        </div>
        <div class="ourteam__members">
            <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
          <div class="member">
             <?php echo '<img src="imgFromDb.php?id=' . $row['id'] . '" alt="Zdjęcie pracownika" />'; ?>
                    <h2><?php echo htmlspecialchars($row['name'] . ' ' . $row['surname']); ?></h2>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                </div>
                <?php
            }
        } else {
            echo "<p>Brak wyników</p>";
        }
        ?>
          </div>
        </div>
      </div>
  </body>
  </php>
</html>
