<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Feedback</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='../css/feedback1.css'>
    <link rel="icon" href="../icons/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="../js/val2.js"></script>

</head>

<body>
    <div class="app">
        <div class="sidebar">
            <div class="icons__above">
                <p><a href="../index.html">
                        <img src="../icons/logo.svg" alt="main page"></a></p>
            </div>

            <div class="sidebar__option">

                <div class="icons">
                    <img src="../icons/home.svg">
                    <a href="../php/translator.php"> Translate </a>
                </div>

                <div class="icons">
                    <img src="../icons/alphabet.svg">
                    <a href="../html/alphabet.html"> Shughni Alphabet </a>
                </div>

                <div class="icons">
                    <img src="../icons/feedback.svg">
                    <a class="active" href="feedback.php"> Feedback </a>
                </div>

                <div class="icons">
                    <img src="../icons/aboutus.svg">
                    <a href="../html/aboutus.html"> About Us </a>
                </div>

            </div>

        </div>


        <section class="Feedback">
            <form action="" method="post">
                <div class="container">
                    <h3 class="section-head book-head">
                        <span class="heading"> <br>
                            <center>Contact Us</center> <br>
                        </span>
                    </h3>
                    <div class="input-group">
                        <select name="grammar" id="typeinquery" class="options">
                            <option value="placeholder">Select the inquery type:</option>
                            <option value="grammaticErrors">Gramatical, linguistic errors</option>
                            <option value="issues">Technical issues with the website</option>
                            <option value="business">Business inqueries</option>
                            <option value="cooperation">Cooperation inqueries</option>
                            <option value="other">Other</option>
                        </select>
                        <div id="errSelect"></div>
                        <br>
                        <input name="email" type="text" class="input" id="email" onkeyup="validate()" placeholder="Enter your email address">
                        <div id="errEmail"></div>
                        <br>
                        <input name="phone" type="text" class="input" id="tel" onkeyup="validate()" placeholder="Enter your phone number">
                        <div id="errTel"></div>
                        <br>
                        <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Your Feedback"></textarea>
                        <div id="errComment"></div>
                        <input class="butTon" type="Submit" value="Submit" name="Submit" id="submit" onclick="validate(); finalValidate(event);">
                        <div id="errFinal"></div>
                    </div>
            </form>

            <?php
            if (isset($_POST['Submit'])) {
                $con = mysqli_connect("localhost", "root", "", "dictDB");

                $grammar = $_POST["grammar"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $comment = $_POST["comment"];

                mysqli_select_db($con, "dictDB");
                $sql = "INSERT INTO newDB (grammar, email, phone, comment) VALUES ('$grammar','$email','$phone', '$comment')";
                mysqli_query($con, $sql);
                mysqli_close($con);
            }
            ?>
            <a class="something" href="../php/feedbackView.php"> Feedback Record </a>
        </section>

    </div>

</body>

</html>