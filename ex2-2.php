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
            <?php 
               // construire la suite de l'entete du tableau html en veillant à afficher exactement les matieres qui  existent dans votre table matieres

            foreach ($resultats as $resultat) {
              echo "<th>".utf8_encode($resultat["sujet"])."</th>";
            }
            ?>
    </tr>
  </thead>
    <tbody>

      <?php 
        $sql = "SELECT COUNT(*) AS nbr FROM eleve "; // nbr alias d'attribut, permet de récuper l'index de la table eleve.
        $statement = $conn->query($sql);

        while($row = $statement->fetch()){
          echo "<tr>
          <td>".$row["nom"]."</td>
          <td>".$row["prenom"]."</td>";
           
          echo "</tr>";
  

        }

      ?>


    </tbody>



</table>

