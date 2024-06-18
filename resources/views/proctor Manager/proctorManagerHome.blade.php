

<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar, Proctor Info, and Footer Example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/proctorManagerHome.css') }}">
</head>

<style>
  
  .dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
  background-color: #f1f1f1;
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
<body>
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
        
    <div class="dropdown">
      <button>Reports</button>
      <div class="dropdown-content">
      <a href="#">Daily Report</a>
          <a href="#">Descipline-case Report</a>
         
          <a href="#">Maintenance Report</a>
          <a href="#"></a>
      </div>
  </div>
  <div class="dropdown">
      <button>Requests</button>
      <div class="dropdown-content">
      <a href="#">Daily Report</a>
          <a href="#">Dorm Change Requests</a>
         
          <a href="#">Maintenance Requests</a>
          <a href="#">Clearance Requests</a>
          <a href="#"></a>
      </div>
  </div>
  
        <li class="bi bi-megaphone" id="announcementLink"><a href="announcements.html">Announcements</a></li>
        <li><a href="help.html">Help</a></li>
        
        <li><a href="logout.html">Logout</a></li>
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
          <a class="btnPrimary">Approve Student List</a>
          <a class="btnPrimary">Send Student List</a>
          <ul>
            <li class="dropdown">
          <a href="{{ route('announcementPM.create')}}" class="btnPrimary">Post Announcment</a>
          <div class="dropdown-content">
      <a href="{{ route('announcementPM.indexx')}}"class="btnPrimary" >All Posts</a>
      <!-- Add more menu items if needed -->
    </div>
</li>
</ul>

<a href="{{ route('pmreports.create')}}" class="btnPrimary">Generate Report</a>
<a href="{{ route('reports.indexx')}}" class="btnPrimary">View Reports</a>
<a href="{{ route('deanAnnouncementtt.views')}}" class="btnPrimary">View Announcements</a>
          
          <a href="{{ route('feedback.proctor')}}" class="btnPrimary">View Feedback</a>
          <a href="{{ route('PMshowStudents')}}" class="btnPrimary">Send Student List</a>
          <a href="{{ route('studentsInfo') }}" class="btnPrimary">Studnet Info</a> 
          <a>Manage Request</a>
         
          <a class="btnPrimary">Logout</a>
        </div>
  
      
          
          <div class="proctor-info">
            <img src="proctor.jpeg" alt="Proctor's Photo">
          
            <form>
                <div class="proctor-form">
                    <div class="form-group">
                            
                    
            <div class="proctor-profile">
    <h3>Proctor Manager Information</h3>
    <p class="pro" style="font-weight:bold" id="name">Name: {{ session('user')->firstname }} {{ session('user')->lastname }}</p><br>
    <p class="pro" style="font-weight:bold" id="campus">Campus: {{ session('user')->campus }}</p><br>
    <p class="pro" style="font-weight:bold" id="role">Role: {{ session('user')->role }}</p><br>
    <p class="pro" style="font-weight:bold" id="email">Email: {{ session('user')->email }}</p>

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
</script>
  </body>
  </html>