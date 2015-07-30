<?php 
$dsn = "mysql:dbname=base1;host:localhost;";
$conn = new PDO($dsn , "root" , "");

$statement = $conn->query("SELECT * FROM matiere ORDER BY id_matiere ASC;");
$resultats = $statement->fetchAll();


?>

<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prenom</th>
            
    </tr>
  </thead>
    <tbody>
      <?php 
       
       $sql = "SELECT COUNT(*) AS nbr FROM eleve ;"; // COUNT : fonction sql quio permet de retourner le nbr d'enregistrement sur un SELECT , AS s'est pour déclarer un alias avec SQL , recupperation de nombre d'enregistrements
        $statement = $conn->query($sql);
       $result = $statement->fetchAll();

       $count = $result[0]["nbr"]; // valeur de count accessible via nbr


        $page = (isset($_GET["page"]))?$_GET["page"]:0; // recupération de page dans le $_GET 
        $offset = $page * 5; 

        echo $sql = "SELECT * FROM eleve LIMIT $offset , 5 "; // 
        $statement = $conn->query($sql);

        while($row = $statement->fetch()){
          echo "<tr>
          <td>".utf8_encode($row["nom"])."</td>
          <td>".utf8_encode($row["prenom"])."</td>";
          echo "</tr>";

        }

      ?>


    </tbody>

 
</table>
   <ul>
    <?php for($i = 0; $i < round($count/5) ; $i++ ):?>
    <li>
      <?php if ($i == $page): ?>
       <?php echo $i+1 ?>
     <?php  else:?>
      <a href="?page=<?php echo $i; ?>"><?php echo $i+1; ?></a>
     <?php endif; ?>

    </li>
    <?php endfor; ?>
  </ul>
  
  <!--bonjour-->
