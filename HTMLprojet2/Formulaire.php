<?php 
require_once 'connect.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title> Formulaire</title>
    <meta name="exemple" content="contient un head type">
    <link rel="stylesheet" href="main.css">
    <!--   <script>
        
        function validateForm() {
            
            var name = document.getElementById('name').value;
            var mail = document.getElementById('mail').value;
            var tel = document.getElementById('tel').value;
            var radio = document.forms["Form"]["gender"].value;
            var textarea = document.getElementById('message').value;
            
            var total = "";
            
                if (name == "") 
                {total="\n Nom et prénom";}

                if (mail == "") 
                {total=total + "\n E-mail";}
            
                if (tel == "")
                {total=total + "\n Numéro de téléphone";}
            
                if (radio == "")
                {total=total + "\n Genre";}
            
               /* if (textarea == "")
                    {total=total + "\n Votre message";}*/
            
                if (total != "")
                {alert("Veuillez remplir les champs suivant : "+total);
                return false;}
        }
    </script> -->

    <title>Formulaire de contact</title>
</head>

<body>
    <?php 
    $nomError = $emailError = $telError = $genderError = $textError ="";
    $nom = $email = $tel = $gender = $textarea = "";
    $to = "thomas.m@codeur.online";
    
    function Test($DATA){
        $DATA = trim($DATA);
        $DATA = stripslashes($DATA);
        $DATA = htmlspecialchars($DATA);
        return $DATA;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["Nom"])) {
          $nomError = "Nom et Prénom requis";
        } else {
          $nom = ($_POST["Nom"]); 
          }
        }
        
        if (empty($_POST["Email"])) {
            $emailError = "Email requis";
          } else {
            $email = Test($_POST["Email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Format non valide"; 
            }
          }
        if (empty($_POST["Tel"])) {
            $telError = "N° de Téléphone requis";
          } else {
            $tel = ($_POST["Tel"]);
          }

        if (empty($_POST["gender"])) {
          $genderError = "Genre requis (parmis les DEUX genres)";
        } else {
          $gender = ($_POST["gender"]);
        }
        if (empty($_POST["textarea"])) {
            $textError = "Message Requis";
          } else {
            $textarea = ($_POST["textarea"]);
          }
?>

    <div class="formulaire1">
        <h2> Formulaire de contact </h2> <br>

        <form method="post" name="Form" onsubmit="return
            validateForm()"><br>
            <label for="name">Nom et Prénom :</label><br>
            <input type="text" id="name" name="Nom" value="<?php echo $nom;?>" class="border"><br><br>
            <span class="color1">*
                <?php echo $nomError;?></span> <br><br>

            <label for="mail">E-mail :</label><br>
            <input type="text" id="mail" name="Email" value="<?php echo $email;?>" class="border"> <br><br>
            <span class="color1">*
                <?php echo $emailError;?></span> <br><br>

            <label for="tel">Numéro de téléphone :</label><br>
            <input type="tel" id="tel" name="Tel" value="<?php echo $tel;?>" class="border" pattern="[0-9]{10}"
                maxlength="10"> <br><br>
            <span class="color1">*
                <?php echo $telError;?></span> <br><br>
            <label for="gender">Homme</label>
            <input id="gender" type="radio" name="gender" value="Homme">
            <label for="gender">Femme</label>
            <input id="gender" type="radio" name="gender" value="Femme"><br><br>

            <textarea placeholder="Tapez votre message ici..." name="textarea" id="message" value="<?php echo $textarea;?>"></textarea><br>
            <span class="color1">* <?php echo $textError;?></span> <br><br>
            <button type="submit" value="Submit" id="Envoi">Envoyer le message</button>
            <button type="reset" value="Reset" id="Reset">Effacer les champs</button>
            <a href="tableaudonnees.php"><button type = button value="Donnees">DONNEES</button></a>
        </form>
    </div>

    <?php
    $user = 'tmarechal';
    $pass = 'c28a64d484f088';
    //for($i=0;$i <= 20; $i++)
    //{
        $msg = "Nom et prenom : " .$nom. " E-mail : ".$email." Telephone : ".$tel." Message : ".$textarea."";
       mail($to,"Formulaire",$msg);
    //}
        $stmt = $db->prepare('INSERT INTO utilisateurs (
                                    name,
                                    mail,
                                    tel,
                                    textarea) VALUES (
                                    :name,
                                    :mail,
                                    :tel,
                                    :textarea)'
        );

        $stmt->bindValue(':name', $nom, PDO::PARAM_STR);
        $stmt->bindValue(':mail', $email, PDO::PARAM_STR);
        $stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
        $stmt->bindValue(':textarea', $textarea, PDO::PARAM_STR);
        $stmt->execute(); ?>
</body>

</html>
    </form>
      