<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f8f8f8;
}

header {
  background-color: #333;
  color: #fff;
  padding: 40px;
  text-align: center;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

main {
  padding: 40px;
}

section {
  margin-bottom: 80px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  border-radius: 4px;
  background-color: #fff;
  padding: 40px;
}

h2 {
  color: #333;
  font-size: 28px;
  position: relative;
  margin-bottom: 40px;
}

h2::after {
  content: "";
  position: absolute;
  bottom: -10px;
  left: 50%;
  transform: translateX(-50%);
  width: 50px;
  height: 4px;
  background-color: #333;
}

form {
  max-width: 500px;
  margin: 0 auto;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-size: 18px;
  font-weight: bold;
}

input,
textarea {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border-radius: 4px;
  border: 1px solid #ccc;
}

button {
  background-color: #333;
  color: #fff;
  border: none;
  padding: 10px 20px;
  text-transform: uppercase;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #555;
}

footer {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
  box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
}
    </style>
<body>
  <header>
    <h1>Contact Us</h1>
  </header>

  <main>
    <section>
      <h2>Get in Touch</h2>
      <form id="contactForm" action="#" method="POST">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit">Send Message</button>
      </form>
    </section>
  </main>

  <footer>
    <p>&copy; 2024 Your Company. All rights reserved.</p>
  </footer>

  <script>// Submit form event listener
// // Submit form event listener
// document.getElementById('contactForm').addEventListener('submit', function (e) {
//   e.preventDefault();

//   // Get form values
//   var name = document.getElementById('name').value;
//   var email = document.getElementById('email').value;
//   var message = document.getElementById('message').value;

//   // Validate form
//   if (name === '' || email === '' || message === '') {
//     alert('Please fill in all fields.');
//     return;
//   }

//   // Create form data object
//   var formData = new FormData();
//   formData.append('name', name);
//   formData.append('email', email);
//   formData.append('message', message);

//   // Send form data to Laravel route using AJAX
//   fetch('/contact', {
//     method: 'POST',
//     body: formData
//   })
//   .then(response => response.json())
//   .then(data => {
//     // Handle response from the server
//     if (data.success) {
//       alert('Form submitted successfully!');
//       // Reset form fields
//       document.getElementById('name').value = '';
//       document.getElementById('email').value = '';
//       document.getElementById('message').value = '';
//     } else {
//       alert('An error occurred. Please try again.');
//     }
//   })
//   .catch(error => {
//     console.error('Error:', error);
//   });
// });


</script>
</body>

</html>