<html>

<body>
    <?php $recupNom = $_POST['Nom'];
          $recupEmail = $_POST['Email'];
          $recupTel = $_POST["tel"];
          $recupGender = $_POST["gender"];

    ?>
    <?php if(isset($_POST["Nom"]) && (isset($_POST["Email"]) && (isset($_POST["tel"])) && (isset($_POST["gender"])) /*&& (isset($_POST["Textarea"]))*/))?>
    <p>Bonjour
        <?php if($recupNom !="")
        echo $_POST["Nom"];
        else
        print "CHAMP NOM INVALIDE";
        ?>
    </p>
    <p>Votre Email est :
        <?php 
        if($recupEmail !="")
        echo $_POST["Email"];
        else
        print "CHAMP EMAIL INVALIDE" ?>
    </p>
    <p> Votre numéro est le :
        <?php 
        if($recupTel !="")
        echo $_POST["tel"];
        else 
        print "CHAMP TELEPHONE INVALIDE"; ?>
    </p>
    <p> Vous êtes un/une :
        <?php if($recupTel !="")
        echo $_POST["gender"];
        else 
        print "GENRE NON DEFINI"; ?>
    </p>
 <!--   <p> Votre message est :
        <?php echo $_POST["Textarea"]; ?>
    </p> -->
    <?php if(isset($_POST['Nom'])) ?>
</body>

</html>