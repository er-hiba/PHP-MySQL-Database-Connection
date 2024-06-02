
<?php
$host = 'localhost';
$dbname = 'your_database';
$username = 'your_username';
$password = 'your_password';

try{
    $conn = new PDO("mysql:host=$host; dbname=$dbname" , $username, $password);
    echo "Connected to $dbname on $host <br><br>";
} catch (PDOException $e){
    die("Unable to connect to database $dbname: " . $e->getMessage());
}

try {
    $stmt = $conn->query("SELECT * FROM etudiant"); // Query to select all fields from the 'etudiant' table in my database
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($data);
} catch (PDOException $e) {
    die("Error fetching data: " . $e->getMessage());
}
?>

<html>
    <body>
    <table border="1" cellspacing="0" cellpadding="5" style="margin-top: 20px">
    <tr>    
        <td>CIN</td>   
        <td>NomETU </td>     
        <td>CodeGRP </td> 
        <!-- Add more <td> elements for additional fields in your database table -->
    </tr>
    <?php foreach ($data as $record): ?>
        <tr>
            <td style="width: 180px"><?php echo $record['CIN']; ?></td>
            <td style="width: 240px"><?php echo $record['NomETU']; ?></td>
            <td style="width: 240px"><?php echo $record['CodeGRP']; ?></td>
            <!-- Add more <td> elements for additional fields in your database table -->
        </tr>
    <?php endforeach; ?>
    </table>
    </body>
</html>  
