<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>About Us - Dormitory Management System</title>
</head>
<body>
    <style>
 body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f8f8f8;
}

header {
  background-color: rgb(17, 92, 167);
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

ul {
  margin: 0;
  padding: 0;
  margin-left: 20px;
  list-style: none;
}

ul li {
  position: relative;
  padding-left: 20px;
  margin-bottom: 10px;
  font-family: 'Arial', sans-serif;
  font-size: 18px;
  color: #333;
}

ul li::before {
  content: "";
  position: absolute;
  top: 6px;
  left: 0;
  width: 8px;
  height: 8px;
  background-color: #333;
  border-radius: 50%;
}

.team {
  display: flex;
  flex-wrap: wrap;
}

.team-member {
  flex: 0 0 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 80px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  border-radius: 4px;
  overflow: hidden;
}

.team-member img {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.team-member:hover img {
  transform: scale(1.1);
}

.team-member .details {
  display: none;
  text-align: center;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.team-member .toggle-button {
  background-color: #333;
  color: #fff;
  border: none;
  padding: 10px 20px;
  text-transform: uppercase;
  font-weight: bold;
  margin-top: 20px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.team-member .toggle-button:hover {
  background-color: #555;
}

footer {
  background-color: rgb(17, 92, 167);
  color: #fff;
  padding: 20px;
  text-align: center;
  box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
}

.footer-content {
  display: flex;
  justify-content: center;
  align-items: center;
}

.footer-section {
  flex: 1;
  padding: 10px;
}

.footer-section h3 {
  font-size: 20px;
  margin-bottom: 10px;
}

.footer-section p {
  font-size: 16px;
  margin: 0;
}

.footer-bottom {
  margin-top: 20px;
}
        </style>
  <header>
    <h1>About Us</h1>
  </header>

  <main>
    <section id="mission">
      <h2>Our Mission</h2>
      <p>We aim to provide a comfortable and secure living environment for students, ensuring their well-being and fostering a conducive atmosphere for academic and personal growth.</p>
    </section>

    <section id="values">
      <h2>Our Values</h2>
      <ul>
        <li>Student-focused approach</li>
        <li>Safety and security</li>
        <li>Clean and well-maintained facilities</li>
        <li>Community and inclusivity</li>
        <li>Respect for diversity</li>
        <li>Professionalism and integrity</li>
      </ul>
    </section>

    <section id="services">
      <h2>Our Services</h2>
      <ul>
        <li>Comfortable and furnished dormitory rooms</li>
        <li>24/7 security and surveillance</li>
        <li>Common areas for socializing and studying</li>
        <li>High-speed internet access</li>
        <li>Laundry facilities</li>
        <li>On-site cafeteria or meal options</li>
        <li>Recreational facilities (e.g., gym, sports areas)</li>
        <li>Regular cleaning and maintenance</li>
        <li>Support staff for assistance</li>
      </ul>
    </section>

    <section id="team">
      <h2>Our Team</h2>
      <div class="team-member">
        <img src="team-member1.jpg" alt="Team Member 1">
        <h3>John Doe</h3>
        <p>Co-founder</p>
      </div>
      <div class="team-member">
        <img src="team-member2.jpg" alt="Team Member 2">
        <h3>Jane Smith</h3>
        <p>Operations Manager</p>
      </div>
    </section>
  </main>


   
    <footer>
  <div class="footer-content">
    <div class="footer-section">
      <h3>Location</h3>
      <p>123 Main Street, City, Country</p>
    </div>
    <div class="footer-section">
      <h3>Email</h3>
      <p>info@example.com</p>
    </div>
    <div class="footer-section">
      <h3>Website</h3>
      <p>www.example.com</p>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; 2024 Your Company. All rights reserved.</p>
  </div>
</footer>
  </footer>
  <script>
   // Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();

    document.querySelector(this.getAttribute('href')).scrollIntoView({
      behavior: 'smooth'
    });
  });
});

// Toggle team member details
document.querySelectorAll('.team-member').forEach(member => {
  const details = member.querySelector('.details');
  const toggleButton = member.querySelector('.toggle-button');

  toggleButton.addEventListener('click', () => {
    details.classList.toggle('show');
    toggleButton.textContent = details.classList.contains('show') ? 'Hide Details' : 'Show Details';
  });
});
    </script>

</body>
</html>