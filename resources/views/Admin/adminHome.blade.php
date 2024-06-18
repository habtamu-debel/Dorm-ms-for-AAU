<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/adminHome.css') }}">
  
</head>
<style>
.proctor-profile {
  font-family: Arial, sans-serif;
  margin: 20px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f5f5f5;
  margin-right:170px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h3 {
  font-size: 18px;
  text-align: center;
  margin-bottom: 10px;
}

.pro {
  font-weight: bold;
  margin-bottom: 5px;
}

#name::before {
  content: "Name: ";
}

#campus::before {
  content: "Campus: ";
}

#role::before {
  content: "Role: ";
}

#email::before {
  content: "Email: ";
}

.proctor-profile p {
  margin: 0;
}

.proctor-profile p:last-child {
  margin-bottom: 0;
}

.proctor-profile p::first-letter {
  text-transform: uppercase;
}

.proctor-profile p#name {
  color: #333;
}

.proctor-profile p#campus {
  color: #666;
}

.proctor-profile p#role {
  color: #990000;
}

.proctor-profile p#email {
  color: #006699;
  word-break: break-all;
}


.error {
  color: red;
  font-size: 14px;
  margin-top: 5px;
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
      <button>Requests</button>
      <div class="dropdown-content">
          <a href="#">Descipline-case Report</a>
          <a href="#">Dorm Maintenace Request</a>
          <a href="#">Resource Exist Request</a>
          
      </div>
  </div>
        <li class="bi bi-megaphone" id="announcementLink"><a href="announcements.html">Announcements</a></li>
        <li><a href="help.html">Help</a></li>
        <li><a href="home.php">Logout</a></li>
    </ul>
</div>

  <!-- Main content of the page -->
  <div class="container">
    <div class="jumbotron">
      <div class="head1">
      <!-- <h1 id="myHeading" style="font-size:30px"> Welcome, <?php //echo $name; ?></h1>  -->
      <h1 id="myHeading">"Unlock Your Dormitory Experience: Seamlessly Manage Your Student Life"</h1>
      </div>
      <div class="head2">
      <p id="motivationText">Today is a nice day!! &#x1F60A;</p>
      </div>
    </div>
    <div class="student-info-container">
        <div class="button-list">
          <!-- Button List -->
          <!-- source.blade.php -->
<a href="{{ route('StaffRegister') }}"  class="btnPrimary">Add Staffs</a>
<a href="{{ route('admin.showStaffs') }}" class="btnPrimary">Show all Staffs</a>
        </div>
             
        <div class="proctor-profile">
    <h3>Admin Information</h3>
    <p class="pro" style="font-weight: bold" >Name:
        {{ session('user')->firstname }}
        {{ session('user')->lastname }}
    </p><br>
    <p class="pro" style="font-weight: bold" >Campus: {{ session('user')->campus }}</p><br>
    <p class="pro" style="font-weight: bold" >Role: {{ session('user')->role }}</p><br>
    <p class="pro" style="font-weight: bold" >Email: {{ session('user')->email }}</p>
</div>
                   
               

           

        </div>
        </div>
      </div>
    </div>
</body>
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

var createAccountButton = document.getElementById('myButton');

// Add a click event listener to the button
createAccountButton.addEventListener('click', function() {
  // Navigate to adminRegister.blade.php in the admin directory
  window.location.href = 'admin/adminRegister.blade.php';
});

</script>
</body>
</html>
