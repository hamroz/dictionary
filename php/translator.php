<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Translate</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/translator.css' />
    <link rel='stylesheet' type='text/css' media='screen' href='../css/outTab.css' />
    <link rel="icon" href="../icons/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src='../js/val.js'></script>


</head>

<body class="index">
    <div class="app">

        <!-- Left Side -->
        <div class="sidebar">

            <div class="icons__above">
                <p><a href="../index.html">
                        <img src="../icons/logo.svg" alt="main page">
                    </a>
                </p>
            </div>

            <div class="sidebar__option">

                <div class="icons">
                    <img src="../icons/home.svg">
                    <a class="active" href="translator.php"> Translate </a>
                </div>

                <div class="icons">
                    <img src="../icons/alphabet.svg">
                    <a href="../html/alphabet.html"> Shughni Alphabet </a>
                </div>

                <div class="icons">
                    <img src="../icons/feedback.svg">
                    <a href="../php/feedback.php"> Feedback </a>
                </div>

                <div class="icons">
                    <img src="../icons/aboutus.svg">
                    <a href="../html/aboutus.html"> About Us </a>
                </div>

            </div>
        </div>

        <div class="feed">
            <div class="feed__header">
                <div class="tweetBox">
                    <form action="" method="post">
                        <div class="tweetBox__input">
                            <img src="https://avatars.dicebear.com/api/human/2.svg" />
                            <input name="input" value="" placeholder="What's the word?   (Eng -> Shgn)" type="text" id="word" name="word" onkeyup="validatesearch();" />
                            <span id="search"></span>
                        </div>
                        <button type="translate" name="Translate" class="tweetBox__tweetButton" id="search_button">
                            Translate
                        </button>
                    </form>
                </div>
            </div>
            <div class="dataOUTPUT">
                <?php
                if (isset($_POST['Translate'])) {
                    $con = mysqli_connect("localhost", "root", "", "dictDB");
                    $input = $_POST["input"];
                    mysqli_select_db($con, "dictDB");
                    $result = mysqli_query($con, "SELECT * FROM rec WHERE word=('$input')");
                ?>

                    <div class="outputTitle">
                        <p> <br> Search Results <br> <br> </p>
                    </div>
                    <table class="outputTable">
                        <tr>
                            <td class="colored">
                                <p>
                                    <center>Word</center>
                                </p>
                            </td>
                            <td class="colored">
                                <p>
                                    <center>Translation</center>
                                </p>
                            </td>
                            <td class="colored">
                                <p>
                                    <center>Example</center>
                                </p>
                            </td>
                        </tr>

                    <?php
                    for ($counter = 0; $row = mysqli_fetch_row($result); $counter++) {
                        print("<tr>");
                        foreach ($row as $key => $value)
                            print("<td> <center> $value </center> </td>");
                        print("</tr>");
                    };
                    mysqli_close($con);
                }
                    ?>
                    </table>


            </div>

        </div>


        <div class="widgets">
            <div class="widgets__form">
                <p>New Words To Add</p>
                <div class="container">
                    <form action="" method="post">
                        <span id="ineng"></span>
                        <label for="fname">Word</label>
                        <input type="text" name="word" placeholder="Word you want to add (English)" id="wordeng" name="wordeng" onkeyup="button_cl(), validateeng();">
                        <span id="inshug"></span>
                        <label for="lname">Definition</label>
                        <input type="text" name="def" placeholder="Give its definition in Shughni" id="wordshug" name="wordshug" onkeyup="button_cl(), validateshug();">

                        <label for="subject">Examples</label>
                        <textarea id="example" name="example" placeholder="Give 1-2 sentences including this word (max 100 words)" style="height:200px" onkeyup="button_cl(), validatedef();"></textarea>
                        <span id="def"></span>

                        <input type="submit" value="Submit" name="Submit" id="submit_button">
                    </form>
                    <?php
                    if (isset($_POST['Submit'])) {
                        $con = mysqli_connect("localhost", "root", "", "dictDB");

                        $word = $_POST["word"];
                        $def = $_POST["def"];
                        $example = $_POST["example"];

                        mysqli_select_db($con, "dictDB");
                        $sql = "INSERT INTO rec (Word, Def, Example) VALUES ('$word','$def','$example')";
                        mysqli_query($con, $sql);
                        mysqli_close($con);
                    }

                    ?>

                </div>
            </div>
        </div>

    </div>

</body>

</html>