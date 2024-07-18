<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Webpage</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f0f0f0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem;
        }

        .container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        section {
            padding: 1rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #map iframe {
            width: 100%;
            height: 450px;
            border: none;
            border-radius: 8px;
        }

        #socials ul {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
        }

        #socials ul li {
            margin: 0 1rem;
        }

        #socials ul li a {
            text-decoration: none;
            color: #007BFF;
            font-size: 1.2rem;
            transition: color 0.3s;
        }

        #socials ul li a:hover {
            color: #0056b3;
        }

        #comments form, #feedback form {
            display: flex;
            flex-direction: column;
        }

        #comments form label, #feedback form label {
            margin-top: 1rem;
        }

        #comments form input, #comments form textarea,
        #feedback form input, #feedback form textarea {
            padding: 0.5rem;
            margin-top: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #feedback .stars {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
            margin-top: 1rem;
        }

        #feedback .stars input[type="radio"] {
            display: none;
        }

        #feedback .stars label {
            font-size: 2rem;
            color: #ccc;
            cursor: pointer;
            transition: color 0.2s;
        }

        #feedback .stars input[type="radio"]:checked ~ label,
        #feedback .stars label:hover,
        #feedback .stars label:hover ~ label {
            color: #ffca28;
        }

        input[type="submit"] {
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 0.875rem;
        }

        /* New theme color */
        header {
            background-color: #F7DA57;
        }

        input[type="submit"], #socials ul li a:hover {
            background-color: #F7DA57;
            color: #333;
        }

        #approvedFeedback {
            margin-top: 2rem;
        }

        #approvedFeedback h3 {
            margin-top: 0;
        }

        #approvedFeedback div {
            background-color: #fff;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
<header>
    <h1>CONTACT US</h1>
</header>

<div class="container">
    <section id="map">
        <h2>Our Location</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345083895!2d144.96305781531685!3d-37.81621897975171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf57773ef0bca5c0!2sFederation%20Square!5e0!3m2!1sen!2sau!4v1614074469050!5m2!1sen!2sau" allowfullscreen="" loading="lazy"></iframe>
    </section>

    <section id="socials">
        <h2>Follow Us</h2>
        <ul>
            <li><a href="https://facebook.com" target="_blank"><img src="FB.png" alt="Facebook"></a></li>
            <li><a href="https://twitter.com" target="_blank"><img src="X.png" alt="Twitter"></a></li>
            <li><a href="https://instagram.com" target="_blank"><img src="instagram.png" alt="Instagram"></a></li>
        </ul>
    </section>

    <section id="comments">
        <h2>Comments, Suggestions, and Inquiry</h2>
        <form id="commentsForm" action="submit_contact.php" method="POST" onsubmit="return validateEmail()">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <span class="error" id="emailError"></span>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <input type="submit" value="Submit">
        </form>
    </section>

    <section id="feedback">
        <h2>Review and Feedback</h2>
        <form id="feedbackForm" action="submit_feedback.php" method="POST">
            <label for="rating">Rate our site:</label>
            <div class="stars">
                <input type="radio" id="star5" name="rating" value="5"><label for="star5">&#9733;</label>
                <input type="radio" id="star4" name="rating" value="4"><label for="star4">&#9733;</label>              
                <input type="radio" id="star3" name="rating" value="3"><label for="star3">&#9733;</label>
                <input type="radio" id="star2" name="rating" value="2"><label for="star2">&#9733;</label>
                <input type="radio" id="star1" name="rating" value="1"><label for="star1">&#9733;</label>
            </div> 

            <label for="feedback">Feedback:</label>
            <textarea id="feedback" name="feedback" rows="4" required></textarea>

            <input type="submit" value="Submit">
        </form>


    <div id="approvedFeedback">
        <h3>Approved Feedback</h3>
        
        <?php
       
       $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "website_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT rating, feedback FROM reviews WHERE approved = 1 ORDER BY created_at DESC LIMIT 5";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div>
                        <p>Rating: " . $row['rating'] . " stars</p>
                        <p>Feedback: " . $row['feedback'] . "</p>
                      </div>";
            }
        } else {
            echo "<p>No approved feedback yet.</p>";
        }

        $conn->close();
        ?>
    </div>
</section>
</div>
</body>
</html>