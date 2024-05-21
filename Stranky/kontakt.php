<!DOCTYPE html>
<html lang="cs">
<head>
        <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PF67DG8MGW"></script>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="podstranky.css">
    <link rel="stylesheet" href="../responzivita.css">

    <link rel="shortcut icon" href="../Obrazky/logo.png" type="image/x-icon">
    <title>Kontakt</title>
</head>
<body>
    <script src="ga.js"></script>

    <header id="header4">
        <nav class="float">

            <a href="../index.html" class="home"><img src="../Obrazky/logo.png" alt="" class="home-icon"></a>
            
            <ul class="list-js">
                <li class="js-li"><a href="jidelni-listek.html">Jidelní lístek</a></li>
                <li class="js-li"><a href="napojovy-listek.html">Nápojový Lístek</a></li>
                <li class="js-li"><a href="denni-menu.html">Denní Menu</a></li>
                <li class="js-li"><a href="recenze.html">Recenze</a></li>
                <li class="js-li"><a href="kontakt.php">Kontakt</a></li>
            </ul>

            <img src="../Obrazky/hamburger.png" alt="" class="hamburger">
        </nav>

        <div class="header-text1 header-text4">
            <h1>Johnnyho Restaurace</h1>
            <h2>Kontaktuje nás</h2>
        </div>

    </header>

    
    <!-- PHP FORMULÁŘ -->

    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require '../vendor/PHPMailer-master/src/Exception.php';
    require '../vendor/PHPMailer-master/src/PHPMailer.php';
    require '../vendor/PHPMailer-master/src/SMTP.php';

    ini_set('max_execution_time', 120);
    
        $name = "";
        $email = "";
        $subject = "";
        $message = "";
        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            $name = $_POST["jmeno"];
            $email = $_POST["email"];
            $subject = $_POST["predmet"];
            $message = $_POST["text"];

            $errors = [];

            if($name === ""){
                 $errors[] = "Prosím vložte do formuláře vaše jméno";
            }

            if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
                $errors[] = "Prosím vložte do formuláře váš email";
           }

           if($subject === ""){
            $errors[] = "Prosím vložte do formuláře předmět";
           }

           if($message === ""){
            $errors[] = "Prosím vložte do formuláře zprávu";
           }    

           if(empty($errors)){
                $mail = new PHPMailer(true);

                try {
                    $mail->isSMTP();
                    $mail->SMTPAuth = true;

                    $mail->Host = "smtp.seznam.cz.";
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    $mail->Username = "{$email}";
                    $mail->Password = "heslo";
                
                
                    $mail->setFrom("palakamak@seznam.cz");
                    $mail->addAddress("bsnq2@seznam.cz");

                    $mail->Subject = "vyplněn kontaktní formulář";
                    $mail->Body = "Jméno: {$name} \nEmail: {$email} \nZpráva: {$message}";
                
                
                    $mail->send();
                
                    echo "Zprava odeslána";
                } catch (Exception $e) {
                    echo "Zpráva byla odeslána";
                }
           }
        } 
    ?>


    <main id="main4">
        <section class="errors">
            <?php if(!empty($errors)): ?>
                <ul>
                    <?php foreach($errors as $one_error): ?>
                        <li><?= $one_error; ?></li>
                    <?php endforeach; ?>
                </ul>

            <?php endif; ?>
        </section>

        <div class="container4">
            <form action="kontakt.php" method="POST">
                <input type="text" name="jmeno" placeholder="Jméno" value="<?= $name; ?>" class="normal-input inputo" required> <br>
                <input type="email" name="email" placeholder="E-mail" value="<?= $email; ?>" class="normal-input inputo" required> <br>
                <input type="text" name="predmet" placeholder="Předmět" value="<?= $subject; ?>" class="normal-input inputo" required> <br>
                <input type="textarea" name="text" placeholder="Zpráva" value="<?= $message; ?>" class="email-input inputo" required> <br>
                <input type="submit" placeholder="Odeslat" class="submit-input inputo"> <br>
            </form>

            <div class="right-kontakt">
                <div class="con">
                    <h2>Brno</h2>

                    <h3>Adresa:</h3>
                    <p>Česká, 602 00 Brno</p>

                    <br>

                    <h3>E-mail:</h3>
                    <p>info@johnnyres.cz</p>

                    <br>

                    <h3>Telefon:</h3>
                    <p>+420 259 471 621</p>

                    <br>

                    <h3>Otevirací doba</h3>
                    <div class="time time1">
                        <p>Po-St: 11:00 - 22:00</p>
                        <p>Čt: 11:00 - 00:00</p>
                        <p>Pá-So: 11:00 - 02:00</p>
                        <p>Ne: 11:00 - 00:00</p>
                    </div>  
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="footer-container">
            <div id="left-side-footer">
                <div class="footer-left-container sidefooter">
                    <h3>Adresa a kontakty</h3>
                    <p>Česká, 602 00 Brno</p>
                    <p>tel.: +420 259 471 621</p>
                    <p>info@johnnyres.cz</p>
                </div>
            </div>
    
            <div id="right-side-footer">
                <div class="footer-right-container sidefooter">
                    <h3>Otevirací doba</h3>
                    <div class="time">
                        <p>Po-St: 11:00 - 22:00</p>
                        <p>Čt: 11:00 - 00:00</p>
                        <p>Pá-So: 11:00 - 02:00</p>
                        <p>Ne: 11:00 - 00:00</p>
                    </div>            
                </div>
            </div>
        </div>

        <span class="copy-foot"><p>&copy Johnnyho restaurace Brno</p><a href="ochrana-udaju.html">Ochrana osobních údajů</a></span>
    </footer>
    
    <script src="../nav.js"></script>

</body>
</html>
