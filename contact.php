<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $title = isset($_POST["title"]) ? $_POST["title"] : "";
    $message = isset($_POST["message"]) ? $_POST["message"] : "";
    $date = date("Y-m-d h:i:s a", time());

    $new_data = [
        "name" => $name,
        "email" => $email,
        "title" => $title,
        "message" => $message,
        "date" => $date,
    ];

    $file_name = "contact.json";
    $file = fopen($file_name, "r") or die("Could not open file");
    $file_content = fread($file, filesize($file_name));
    $json_content = json_decode($file_content);
    fclose($file);

    $file = fopen($file_name, "w") or die("Could not open file");
    array_push($json_content, $new_data);
    fwrite($file, json_encode($json_content));
    fclose($file);

    $res = "Message received. Will get back to you as soon as I can";
    // header("location: http://weybansky.github.io");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Abdulwahab Nasir(@weybansky) - CV</title>

    <meta name="author" content="Abdulwahab Nasir">
    <meta name="description"
    content="My name is Abdulwahab Nasir Opeyemi and here is my CV. You can contact at weybansky@gmail.com">
    <meta name="keywords" content="Resume, CV, weybansky">

    <meta name="og:title" property="og:title" content="Abdulwahab Nasir(@weybansky) - CV" />
    <meta name="og:type" property="og:type" content="website" />
    <meta name="og:url" property="og:url" content="https://me.weybanskytech.com.ng" />
    <meta name="og:image" property="og:image"
        content="https://res.cloudinary.com/weybansky/image/upload/c_scale,w_150/v1566691253/a_o_nasir_nurwsz.jpg" />

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <section>
        <?php if (isset($res)): ?>
        <h1><?=$res;?></h1>
        <small><a href="http://weybansky.github.io">Click to back</a></small>
        <?php endif?>

        <section id="contact-form">
            <form id="form" action="contact.php" method="POST" onsubmit="event.preventDefault();submit_form();">
                <div>
                    <h2>Contact Form</h2>
                </div>
                <div>
                    <input type="text" name="name" id="name" required minlength="4" placeholder="Your full name">
                </div>
                <div>
                    <input type="email" name="email" id="email" required minlength="4"
                        placeholder="example@example.com">
                </div>
                <div>
                    <input type="text" name="title" id="title" required minlength="4" placeholder="Title">
                </div>
                <div>
                    <textarea name="message" required placeholder="Your message goes here" id="message" rows="10"
                        minlength="20"></textarea>
                </div>
                <div>
                    <button type="submit" onclick="">Submit</button>
                </div>
            </form>
        </section>
    </section>


    <script type="text/javascript">
        function submit_form() {
            alert("form submitted");
            // validations
            document.getElementById('form').submit();
        }
    </script>

</body>

</html>