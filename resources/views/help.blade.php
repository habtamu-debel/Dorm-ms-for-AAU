<!DOCTYPE html>
<html>
<head>
    <title>Help Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<style>
     body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
}

h1 {
    margin: 0;
}

main {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
}

section {
    margin-bottom: 40px;
}

h2 {
    margin-top: 0;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    margin-bottom: 20px;
}

h3 {
    margin-top: 0;
}

form label {
    display: block;
    margin-bottom: 5px;
}

form input,
form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

form button {
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

h3 {
    cursor: pointer;
    padding: 10px;
    background-color: lightgray;
    transition: background-color 0.3s ease;
}

h3:hover {
    background-color: gray;
}

h3.clicked {
    background-color: blue;
}
    </style>

<body>
    <header>
        <h1>Help Page</h1>
    </header>

    <main>
        <section>
            <h2>Frequently Asked Questions</h2>
            <ul>
                <li>
                    <h3>Question 1?</h3>
                    <p class="answer">Answer to question 1.</p>
                </li>
                <li>
                    <h3>Question 2?</h3>
                    <p class="answer">Answer to question 2.</p>
                </li>
                <li>
                    <h3>Question 3?</h3>
                    <p class="answer">Answer to question 3.</p>
                </li>
                <!-- Add more FAQ items as needed -->
            </ul>
        </section>

        <section>
            <h2>Contact Us</h2>
            <form id="contactForm">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>

                <button type="submit">Submit</button>
            </form>
        </section>
    </main>

    <script>

var questions = document.querySelectorAll("h3");

questions.forEach(function(question) {
    question.addEventListener("click", function() {
        var answer = this.nextElementSibling;

        // Toggle the visibility of the answer
        if (answer.style.display === "block") {
            answer.style.display = "none";
            this.classList.remove("clicked");
        } else {
            answer.style.display = "block";
            this.classList.add("clicked");
        }
    });
});

document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    // Get form values
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;

    // Perform form validation here if needed

    // Send form data to the server
    // You can use AJAX or any other method to send the data

    // Example AJAX code using jQuery
    // Make sure to include the jQuery library in your HTML file
    /*
    $.ajax({
        type: "POST",
        url: "/your-server-endpoint",
        data: {
            name: name,
            email: email,
            message: message
        },
        success: function(response) {
            // Handle success response
            console.log(response);
            alert("Message sent successfully!");
        },
        error: function(error) {
            // Handle error response
            console.log(error);
            alert("An error occurred. Please try again.");
        }
    });
    */

    // Clear form fields
    document.getElementById("name").value = "";
    document.getElementById("email").value = "";
    document.getElementById("message").value = "";
});
    </script>
</body>
</html>