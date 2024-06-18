<!DOCTYPE html>
<html>
<head>
    <title>Navigation Bar, Proctor Info, and Footer Example</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    
    <style><
    body {
            
            background-size: cover;
            background-repeat: no-repeat;
        }
    .navbar {
            display: flex;
            align-items: center;
            background-color: rgb(17, 92, 167);
            height: 60px;
        }

        .logo {
            margin-right: 20px;
        }
        .re{
          color:  white;
          font-size: 10px;
          font-family: Arial, Helvetica, sans-serif;
          margin-left: 2px;
         
        }
        .two
        {
            display:grid;
            margin-top: 25px;
        }
        .add{
          
          margin-bottom: 10px;
          color:white;
          font-weight: bold;
          font-size:15px;
          padding-right: 50px;
          letter-spacing: 3px;
       
          
          
        }
        
        .add1{
          padding-bottom:20px;
          padding-top:1px;
          margin-bottom: 20px;
          color:white;
          font-weight: bold;
          font-size:15px;
          padding-right: 50px;
          letter-spacing: 1px;
          
        }
        .addis
        {
            letter-spacing: 3px; 
        }
        

        .logo img {
            width: 50px;
            height: 50px;
            margin-left: 150px;
        }

        .navbar-list {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            margin-left: 90px;
               
        }

        .navbar-list li {
            display: inline-block;
            margin-left: 20px;
        }

        .navbar-list li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            
            
        }
  
    /* CSS for Proctor's info and button list */
    .student-info-container {
      display: flex;
      justify-content: space-between;
      align-items: center; /* Align items vertically centered */
      padding-top: -20px;
      margin-bottom: 20px;
      box-shadow: 0 0 5px rgba(73, 98, 209, 0.5);
    }

   

    .student-info img {
      width: 150px;
      border-radius: 100%;
    }

    .button-list {
      display: flex;
      flex-direction: column;
      
      padding:20px;
      box-shadow: 0 0 5px rgba(73, 98, 209, 0.5);
    }

    .button-list button {
      height: 40px;
      width: 200px;
      padding: 10px;
      margin-bottom: 10px;
      background-color: rgba(0, 72, 181, 0.74);
      color: white;
      border: none;
      text-align: center;
      text-decoration: none;
      transition: background-color 0.3s ease;
      border-radius: 10px;
    }

    .button-list button:hover {
      background-color: #111;
    }

    /* CSS for footer */
    footer {
      height:20px;
      clear: both; /* Clear the floats */
      background-color: rgba(0, 72, 181, 0.74);
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 20px;
    }

    /* Additional CSS for an attractive and interactive design */
    body {
      font-family: Arial, sans-serif;
    }

    #myHeading {
        font-family: "Arial", sans-serif;
  font-size: 20px;
  color:rgb(0, 72, 181);
  
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
  transition: transform 0.3s ease;
      text-align: center;
      padding-top: -6px;
    }
    #myHeading:hover{
        transform: scale(1.1);
    }


    #myHeading2 {
        font-family: "Arial", sans-serif;
  font-size: 20px;
  color:rgb(0, 72, 181);
  
  /* text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); */
  transition: transform 0.3s ease;
      text-align: center;
      padding-top: -6px;
    }
    p {
      color: #5d44e9;
      text-align: center;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    .jumbotron {
      background-color: #f9f9f9;
      padding: 40px;
      margin-bottom: 30px;
      box-shadow: 0 0 5px rgba(73, 98, 209, 0.5);
      height:100px
    }
    .motion-effect {
            transition: transform 0.3s ease;
        }

        .motion-effect:hover {
            transform: scale(1.1);
        }

        @keyframes colorChange {
  0% { color: rgb(114, 122, 24); }
  50% { color: rgb(74, 37, 240); }
  100% { color: rgb(230, 156, 45); }

}

#motivationText {
  animation: colorChange 3s infinite;
  font-weight: bold;
  font-size: 20px;
  margin-top: 70px;
  /* padding: 10px; */
}
.student-info {
            height: 50;
            text-align: center;
            flex: 1;
            /* Take up remaining space */
            margin-left: -60px;
            margin-bottom: 140px;
            margin-top: 100px;
            padding-top: 50px ;
        }
        .form-group {
            margin-bottom: 20px;

        }

        label {
            display: inline-flex;
            margin-bottom: 5px;



        }

        .student-form {
            border-radius: 4px;
            box-shadow: 0 0 5px rgba(73, 98, 209, 0.5);
            margin-left: 140px;
            /* border: 2px solid black; */
            padding: 20px;
            border-radius: 4px;
            width: 400px;


        }

        input {
            border: none;
            outline: none;
            width:250px;
        }
      .email 
      {
        padding-left: 5px;
      }
      label
      {
        width: 100px;
  text-align: right;
  margin-right: 10px;
      }
        .student-info img {
            width: 150px;
            border-radius: 50%;
        }
        .custom-input::placeholder {
  color: rgb(0, 72, 181);
  font-weight: bold;
  opacity: 0.5;
  font-size: 15px;
}
/* Style the dropdown container */
.dropdown {
            position: relative;
            display: inline-block;
        }

        /* Style the dropdown button */
        .dropdown button {
            background-color: rgb(17, 92, 167);
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        /* Style the dropdown menu */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: rgb(17, 92, 167);
            min-width: 160px;
            box-shadow: 0 0 5px rgba(73, 98, 209, 0.5);
            z-index: 1;
        }

        /* Style the dropdown menu items */
        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change the background color of dropdown menu items when hovering */
        .dropdown-content a:hover {
            background-color: rgb(17, 92, 167);
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }


        table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
   border: 1px solid #1e2be4; /* Add a border line to the table */
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow-y: scroll;
}

th, td {
  padding: 8px;
  text-align: left;
  border: 1px solid #2a2ab5; /* Add a border line to the table cells*/

}

th {
  background-color: #ffffff;
  padding: 12px 20px; /* Adjust the padding as needed */
  text-align: left;
  color: rgb(17, 92, 167);

  
    
}

tr:nth-child(even) {
  background-color: #f9f9f9;
}
tr:hover {
  background-color: #c7d6f8;
}
 .custom-thead {
      background-color: #fff; /* Set the background color to white */
      color: #000; /* Set the text color to black */
      position: sticky;
  top: 0;
  
  z-index: 2;
    }
    .table-container {
      max-height: 300px; /* Set the maximum height of the container */
      overflow: auto; /* Enable scrolling */
      margin-top: 20px;
      box-shadow: 0 0 5px rgba(73, 98, 209, 0.5);
      width:1000px;
      margin-left:-90px;
    }
    .table-container button {
    padding: 8px 16px;
    background-color:  rgb(17, 92, 167);;
    color: white;
    border: none;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    cursor: pointer;
    border-radius: 4px;
  }

  .table-container button:hover {
    background-color: #45a049;
  }
        
  .allocate-button
  {
    margin-top: 6px;
    float: right;
    background-color:  rgb(17, 92, 167);;
    padding: 8px 16px;
   
    color: white;
    border: none;
    text-align: center;
    text-decoration: none;
  
    font-size: 14px;
    cursor: pointer;
    border-radius: 4px;
    margin-right: 240px;;
    margin-bottom: 5px;
    height:40px

  }

  .search-container {
  display: inline-block;
  align-items: center;
  justify-content: center;
  margin-bottom: 10px;
 
}

.search-input {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  margin-right: 10px;
  box-shadow: 0 0 5px rgba(73, 98, 209, 0.5);
  margin-left:85px;
}

.search-button {
  padding: 10px 20px;
  background-color:  rgb(17, 92, 167);;
  color: #ffffff;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}

.search-button:hover {
  background-color: #45a049;
}

.search-button:active {
  background-color: #3e8e41;
}


.student-search-container {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
  justify-content: center;
}

.student-search-input {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  margin-right: 10px;
  width: 200px;
  box-shadow: 0 0 5px rgba(73, 98, 209, 0.5);


}

.student-search-button1 {
  padding: 10px 20px;
  background-color:  rgb(17, 92, 167);
  color: #ffffff;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: transform 0.2s;
  margin-top:25px;
  width:10px;
   
  

  
}
.student-search-button2 {
  padding: 10px 20px;
  background-color:  rgb(17, 92, 167);
  color: #ffffff;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: transform 0.2s;
  margin-top:11px;
   margin-left:87px; 
  justify-content:center;
  

  
}
.student-search-button3 {
  padding: 10px 20px;
  background-color:  rgb(17, 92, 167);
  color: #ffffff;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: transform 0.2s;
  margin-top:11px;
   margin-left:457px; 
  justify-content:center;
  

  
}




.student-search-button:hover {
  background-color: #45a049;
  transform: scale(1.1);
}

.student-search-button:active {
  background-color: #3e8e41;
  transform: scale(0.9);
}
button {
 
  transition: transform 0.2s;
}

button:hover {
  background-color: rgb(17, 92, 167);
  transform: scale(1.1);
}

button:active {
  background-color: #3e8e41;
  transform: scale(0.9);
}
.block
{
  margin-left: 150px;
  margin-top: 5px;
  display:inline-block;
  /* margin-right:20px; */
}

.studentsearch
{
  border: 1px solid #ccc;
  padding:10px;

}



  </style>


</head>
<body>
    <!-- Navigation Bar -->
    <div class="navbar">
        <div class="logo">
            <img src="{{ asset('logo1.jpg') }}" alt="Logo">
        </div>
        <div class="two">
            <div class="re">
                <p class="add1">ADDIS ABABA UNIVERSITY<br><span class="addis">አዲስ አበባ ዩኒቨርሲቲ</span></p>
            </div>
        </div>
    </div>

    <!-- Main content of the page -->
    <div class="container">
        <div class="jumbotron">
            <h1 id="myHeading">Student Allocation</h1>
            <h1 id="myHeading">"Unlock Your Dormitory Experience: Seamlessly Manage Your Student Life"</h1>
        </div>

        <div class="student-search-container">
            <form method="GET" action="">
              <div>
                <input type="text" id="studentIdInput" name="id" class="student-search-input" placeholder=" Student ID ">
                <button type="submit" id="studentSearchButton" class="student-search-button1" style="width: 270px;">Search</button><br>
</div>
                <h1 id="myHeading2">fill the next fields to allocate and search students</h1>
            </form>
        </div>

        <div>
            <div class="search-container">
                <form method="GET" action="">
                    <input type="text" id="departmentInput" class="search-input" name="department" placeholder="Enter Department">
                    <input type="text" class="search-input" name="block" id="block" placeholder="Enter block">
                    <input type="text" id="disabilityInput" class="search-input" name="disability" placeholder="Enter Disability">
                    <input type="number" class="search-input" name="roomNumber" id="roomNumber" placeholder="Enter Room Number">
                    <input type="text" id="yearInput" class="search-input" name="year" placeholder="Enter Year">
                    <input type="submit" name="search" value="Search and Allocate" id="studentSearchButton" class="student-search-button2" style="width: 270px;">
                    <button type="submit" id="studentSearchButton" class="student-search-button3" style="width: 270px;">Display</button>
                </form>
            </div>
        </div>

        <div class="table-container" style="height: 300px; overflow: auto;">
            <table class="table table-striped table-hover">
                <thead class="custom-thead">
                    <tr>
                        <th>First Name:</th>
                        <th>Last Name:</th>
                        <th>ID:</th>
                        <th>Year</th>
                        <th>Department</th>
                        <th>Sex</th>
                        <th>Disability</th>
                        <th>Block</th>
                        <th>Room Number</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Add the dynamic data here using Laravel's Blade syntax -->
                </tbody>
            </table>
        </div>

        

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>