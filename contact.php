<?php
session_start();
if(isset($_POST['submit'])){
    //extraction des variables
    extract($_POST);
    //verification si les variables existent et ne sont pas vides
    if(isset($name) && $name != "" && 
    isset($email) && $email != "" && 
    isset($message) && $message != ""
    ){
        // envoyer l'email
        // Le destinateire (votre mail)
$to = "kvnlblc@outlook.fr";
// objet du mail
$subject = "Vous avez reçu un message de :" . $mail;

$message = "
<p>Vous avez recu un message de :<strong>" .$email."</strong></p>
<p><strong>Nom :</strong>".$name."</p>
<p><strong>Message :</strong>".$message."</p>";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <'.$email.'>' . "\r\n";

// envoi du mail
$submit = mail($to,$subject,$message,$headers);
//verification de l'envoi
if($submit){
   $_SESSION['submit_message'] = "message envoyé";
    $color ="green";
}else{
    $info = "message non envoyé";
    $color ="red";
}


    }else{
        // si elle sont vides
        $info = "Veuillez remplir tous les champs";
        $color ="red";
}

}


?>


<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>Me contacter</title>
</head>


<body>

<header>
<nav>
        <a href="index.php">Accueil</a>        
        <h2 class="nom" >Kevin Liblanc</h2>
            <a href="cv.pdf" target="_blank">Mon CV</a>
            <a href="contact.php">Me contacter</a>
        </nav>
</header>
<?php 
//afficher le message d'erreur

if (isset($info)){?>

<p class="reques_message" style="color:<?php echo $color; ?>"><?= $info ?></p>
<?php }?>

    <form action="" method="POST">
        <h2>Me contacter</h2>
        <input type="text" name="name" placeholder="Votre nom" >
        <input type="email" name="email" placeholder="Votre email">
        <textarea name="message" placeholder="Votre message" ></textarea>
        <button name="submit">Envoyer</button>
    </form>
    

    <footer>LIBLANC Kevin 2023</footer>

</body>
</html>