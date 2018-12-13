<?php require_once 'connect.php' ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau données</title>
</head>

<body>
    <h1>Tableau données</h1>
    <style>
        table, th, td {
    border: 2px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 10px;
}
</style>


    <table>
        <caption></caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mail</th>
                <th>Tel</th>
                <th>Gender</th>
                <th>Textarea</th>
            </tr>
        </thead>

        <?php
if (isset ($_GET['id'])){
$delete = $db->prepare("DELETE FROM utilisateurs WHERE id = :id");
$delete->execute( array( ':id' => $_GET['id']));
}

$req1 = "SELECT * FROM utilisateurs";
$datas = $db->query($req1)->fetchAll(PDO::FETCH_ASSOC);

    foreach ( $datas as $data ) 
    {
?>

        <tr>
            <td>
                <?php echo $data['id']; ?>
            </td>
            <td>
                <?php echo $data['name']; ?>
            </td>
            <td>
                <?php echo $data['mail']; ?>
            </td>
            <td>
                <?php echo $data['tel']; ?>
            </td>
            <td>
                <?php echo $data['gender']; ?>
            </td>
            <td>
                <?php echo $data['textarea']; ?>
            </td>
            <td><a href="tableaudonnees.php?id=<?php echo $data['id'];?>">Supprimer</a></td>
        </tr>
        </td>
        </tr>

        <?php
    } 
?>
</table>
        <a href="Formulaire.php"><button type="button">Retour Formulaire</button></a>
</body>

</html>