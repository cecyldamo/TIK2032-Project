<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validasi data (misalnya, cek apakah email valid)
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Koneksi ke database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "phpcontact";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Cek koneksi
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert data ke tabel
        $sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

        if ($conn->query($sql) === TRUE) {
            $success_message = "Thanks for contacting us! Expect a response from us soon.";
        } else {
            $error_message = "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        $error_message = "Invalid email format";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="contact.css">
    <script src="script.js" defer></script>
</head>
<body>

    <header>
        <h1>Contact</h1>
        <nav>
            <div class="menu">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <section class="contact">
            <p>Thank you for your interest in reaching out! I'm excited to connect with you. Whether you have questions or feedback, there are several convenient ways to get in touch!</p>
            <div class="info">
                <p> 📧<span>Email</span> : <a href="mailto:cecyldamo2005@gmail.com">cecyldamo2005@gmail.com</a> 
                <br> 📞<span>Phone</span>  : 085XXXXXXXXX</p>
            </div>
            <div class="form-container">
                <?php
                if (isset($success_message)) {
                    echo "<p style='color: green;'>$success_message</p>";
                } elseif (isset($error_message)) {
                    echo "<p style='color: red;'>$error_message</p>";
                }
                ?>
                <form action="contact.php" method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required><br><br>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br><br>
                    <label for="message">Message:</label><br>
                    <textarea id="message" name="message" required></textarea><br><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Cecyl Damo's Personal Page.</p>
    </footer>

</body>
</html>
