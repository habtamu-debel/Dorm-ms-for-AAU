
<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar, Proctor Info, and Footer Example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/studentHome.css') }}">
  
</head>

<body>
  <style>
    
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
  padding-top:20px;
  margin-bottom:10px;
  
}

.btnPrimary:hover {
  background-color: rgb(17, 92, 167);
  color:#fff;
}
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-menu {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-menu a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-menu a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-menu {
  display: block;
}
    </style>

  <!-- Navigation Bar -->
  <div class="navbar">
    <div class="logo">
        <img src="logo1.jpg" alt="Logo">
    </div>
    <div class="two">
    <div class="re"> <p class="add1">ADDIS ABABA UNIVERSTY <br><span class="addis">አዲስ አበባ ዩኒቨርሲቲ</span></p></div>
       
    </div>

    <ul class="navbar-list">
        <li><a href="home.php">Home</a></li>
        
  
 
     
 
        <li class="bi bi-megaphone" id="announcementLink"><a href="announcements.html">Announcements</a></li>
        <li><a href="help">Help</a></li>
        <li><a href="home.php">Logout</a></li>
    </ul>
</div>

  <!-- Main content of the page -->
  <div class="container">
    <div class="jumbotron">
      <div class="head1">
    
      <h1 id="myHeading">"Unlock Your Dormitory Experience: Seamlessly Manage Your Student Life"</h1>
      </div>
      <div class="head2">
      <p id="motivationText">Today is a nice day!! &#x1F60A;</p>
      </div>
    </div>
    <div class="student-info-container">
        <div class="button-list">
          <!-- Button List -->
          <a href="{{ route('viewDorm') }}" class="btnPrimary">View Dorm</a>
          <a href="{{ route('dormCheckIn') }}" class="btnPrimary">Dorm Check In</a>
         <a href="{{ route('manageRequest') }}" class="btnPrimary">Manage Request</a> 
         <a  href="{{ route('lostandfound.postStudent') }}" class="btnPrimary" >Show Lost And Found Posts</a>
          <a href="{{ route('announcement.index') }}" class="btnPrimary">View Announcment</a>
          <div class="dropdown">
          <a href="{{ route('appointment.all') }}" class="btnPrimary">Appointment </a>
          <div class="dropdown-menu">
 
    <a href="{{ route('appointment.my') }}" class="dropdown-item">My Appointments</a>
  </div>
</div>
          <a href="{{ route('feedback.show') }}" class="btnPrimary">Feedback/Comment</button> 
          <a class="btnPrimary">Logout</a>
</div>
          <div class="student-info">
          <form>
                <div class="student-form">
                    <div class="form-group">
                        
                    <div class="student-profile">
    <h3>Student Information</h3>
    
    <p class="pro" style="font-weight:bold" id="name">Name: {{ session('firstName') }} {{ session('lastName') }}</p>
    <p class="pro" style="font-weight:bold" id="campus">ID: {{ session('user')->student_id }}</p>
    <p class="pro" style="font-weight:bold" id="role">Department: {{ session('department')  }}</p>
    <p class="pro" style="font-weight:bold" id="email">Year: {{ session('year')  }}</p>

</div>
                    </div>
                </div>

            </form>

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
  heading.style.color = '#333';
});
   // Apply motion effect to navbar```javascript
        // Apply motion effect to navbar items
        var navbarItems = document.querySelectorAll('.navbar li a');
        navbarItems.forEach(function (item) {
            item.addEventListener('mouseover', function () {
                this.classList.add('motion-effect');
            });

            item.addEventListener('mouseout'  , function () {
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
    window.location.href = "viewdorm.php";
  });


</script>
  </body>
  </html>