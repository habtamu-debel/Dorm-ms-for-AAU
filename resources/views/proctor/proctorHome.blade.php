

<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar, Proctor Info, and Footer Example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/proctorHome.css') }}">
</head>
<body>
<style>
  .proctor-profile {
    margin-left:100px;
    margin-right:100px;
    border: 1px solid #ccc;
    padding: 20px;
    margin-bottom: 20px;
    max-width:400px;
    box-shadow: 0 2px 4px rgba(116, 81, 230, 0.7);
  }

  .pro {
    font-weight: bold;
  }

  .dropdown {
  position: relative;
  display: block;
}

.dropdown .dropdown-toggle {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 200px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  background-color: #fff;
  cursor: pointer;
}

.dropdown .dropdown-toggle .arrow {
  margin-left: 10px;
}

.dropdown .dropdown-content {
  display: none;
  position: absolute;
  background-color: #fff;
  min-width: 100px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
  color: black;
}

.dropdown .dropdown-content a {
  display: block;
  padding: 10px;
  text-decoration: none;
  color: black;
}

.dropdown .dropdown-content a:hover {
  background-color: #f9f9f9;
}

.dropdown:hover .dropdown-content {
  display: block;
}
 

.btnPrimary {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  text-decoration: none;
  border-radius: 4px;
  border: none;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s ease;
  width:200px;
  text-align: center;
  
}

.btnPrimary:hover {
  background-color: rgb(17, 92, 167);
  color:#fff;
}
</style>

<div class="navbar">
        <div class="logo">
            <img src="{{ asset('images/logo1.png') }}" alt="Logo">
        </div>
        <div class="re">
            <div class="re">
                <p class="add1">ADDIS ABABA UNIVERSITY<br><span class="addis">አዲስ አበባ ዩኒቨርሲቲ</span></p>
            </div>
        </div>
        <ul class="navbar-list">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('announcements') }}">Announcements</a></li>
            <li><a href="{{ route('contactUs') }}">Contact Us</a></li>
            <li><a href="{{ route('help') }}">Help</a></li>
            <li>  <a href="{{ route('login') }}">Logout</a> </li>
            <div class="dropdown">
            <li>  <a href="{{ route('profile.create') }}" class="profile1">Complete profile</a> 
  <div class="dropdown-content">
  <a href="{{ route('profile.show') }}"  class="profile1">My Profile</a> </li>

    <!-- Add more menu items if needed -->
  </div>
</div>


        </ul>
    </div>


  <!-- Main content of the page -->
  <div class="container">
    <div class="jumbotron">
      <h1 id="myHeading">Welcome Our Proctor!</h1>
      <p id="motivationText">Today is a nice day!! &#x1F60A;</p>
    </div>
    <div class="proctor-info-container">
        <div class="button-list">
          <!-- Button List -->
         
          <div class="dropdown">
  <a href="{{ route('blockRegister') }}" class="btnPrimary">Register Block</a>
  <div class="dropdown-content">
    <a href="{{ route('blocks.index')}}" >All Blocks</a>
    <!-- Add more menu items if needed -->
  </div>
</div>

<div class="dropdown">
  <a href="{{ route('roomRegister') }}" class="btnPrimary">Register Room</a>
  <div class="dropdown-content">
    <a href="{{ route('rooms.index')}}">All Rooms</a>
    <!-- Add more menu items if needed -->
  </div>
</div> 
          <a href="{{ route('allocate') }}" class="btnPrimary">Dorm Allocation</a>   
          <a href="{{ route('announcementPM.index') }}" class="btn btn-primary">View Announcment</a>         
          <div class="dropdown">
  <a href="{{ route('postAnnouncment') }}" class="btnPrimary">Post Announcment</a>
  <div class="dropdown-content">
    <a href="{{ route('proctorAnnouncement.indexx')}}">All Announcments</a>
    <!-- Add more menu items if needed -->
  </div>
</div> 
          <a href="{{ route('studentsInfo') }}" class="btnPrimary">Studnet Info</a> 
          <a href="{{ route('buildingMaintenance') }}" class="btnPrimary">building Maintenance</a> 
          <a href="{{ route('proctor.responseRequest') }}" class="btnPrimary">Manage Request</a> 
          <a href="{{ route('generateReport') }}" class="btnPrimary">Generate Report</a> 
          <a href="{{ route('feedback.home') }}" class="btnPrimary">Show Feedbacks</a> 
          <a href="{{ route('pmfeedback.show') }}" class="btnPrimary">Give Feedbacks</a> 
          <a href="{{ route('showStudentsList') }}" class="btnPrimary">Students List</a> 
          
        </div>

          
            <div class="proctor-profile">
    <h3>Proctor Information</h3>
    
    <p class="pro" style="font-weight:bold" id="name">Name: {{ session('user')->firstname }} {{ session('user')->lastname }}</p><br>
    <p class="pro" style="font-weight:bold" id="staffid">staffId: {{ session('user')->staffid }}</p><br>
    <p class="pro" style="font-weight:bold" id="campus">Campus: {{ session('user')->campus }}</p><br>
    <p class="pro" style="font-weight:bold" id="role">Role: {{ session('user')->role }}</p><br>
    <p class="pro" style="font-weight:bold" id="email">Email: {{ session('user')->email }}</p>

    
</div>
        </div>
        </div>
      </div>
    </div>

  
    <!-- Footer -->
    <footer>
      &copy; 2024 Addis Ababa University. All rights reserved.
    </footer>
<script>
    // Apply motion effect to login button
    var buttons = document.querySelectorAll('.button-list button');
buttons.forEach(function(button) {
  button.addEventListener('mouseover', function() {
    this.classList.add('motion-effect');
  });

  button.addEventListener('mouseout', function() {
    this.classList.remove('motion-effect');
  });
});

    const heading = document.getElementById('myHeading');

heading.addEventListener('mouseenter', function() {
  heading.style.color = '#1134A6';
});

heading.addEventListener('mouseleave', function() {
  heading.style.color = '#1134A6';
});
   // Apply motion effect to navbar```javascript
        // Apply motion effect to navbar items
        var navbarItems = document.querySelectorAll('.navbar li a');
        navbarItems.forEach(function (item) {
            item.addEventListener('mouseover', function () {
                this.classList.add('motion-effect');
            });

            item.addEventListener('mouseout', function () {
                this.classList.remove('motion-effect');
            });
        });
        const announcementLink= document.getElementById('announcementLink');

let isVisible = true;
setInterval(function() {
  isVisible = !isVisible;
  announcementLink.style.visibility = isVisible ? 'visible' : 'hidden';
}, 1000);

var button = document.getElementById("myButton");

  // Add a click event listener to the button
  button.addEventListener("click", function() {
    // Navigate to the viewDorm.html page
    window.location.href = "allocate.php";
  });




  // Get the proctor information from the session
  var proctor = {
    name: "{{ session('user')->firstname }} {{ session('user')->lastname }}",
    campus: "{{ session('user')->campus }}",
    role: "{{ session('user')->role }}",
    email: "{{ session('user')->email }}"
  };

  // Update the HTML elements with proctor information
  document.getElementById('name').textContent += proctor.name;
  document.getElementById('campus').textContent += proctor.campus;
  document.getElementById('role').textContent += proctor.role;
  document.getElementById('email').textContent += proctor.email;


</script>
  </body>
  </html>