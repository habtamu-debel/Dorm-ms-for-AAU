<!DOCTYPE html>
<html>
<head>
    <title>Building Management System</title>
    <style>
        /* CSS styles for the navigation bar */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;

        }
        
        nav {
            background-color: #fff;
            padding: 10px;
            box-shadow: 0 0 5px rgba(73, 98, 209, 0.5);
        }
        
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-between;
        }
        
        li {
            position: relative;
            margin-right: 10px;
        }
        
        a {
            color: #000;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            overflow: hidden;
            display: block;
        }
        
        .progress-bar {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 10%;
            background-color: #5d44e9;
            transition: width 0.3s ease;
        }
        
        a:hover .progress-bar {
            width: 100%;
        }
        
        .content {
            margin: 20px;
        }
        
        /* CSS styles for the content containers */
        .content-container {
            display: none;
        }
        
        h2 {
            margin-top: 0;
        }


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
    </style>
   
</head>
<body>
    <nav>
        <ul>
            
            <li class="dropdown">
    <a class="menu-item" href="{{ route('students.roomMaintenance') }}" data-target="room-maintenance">
      Room Maintenance
      <span class="progress-bar"></span>
    </a>
    <div class="dropdown-content">
      <a href="{{ route('roomMaintenance.index')}}">My Requests</a>
      <!-- Add more menu items if needed -->
    </div>
            </li>
            <li class="dropdown">
                <a class="menu-item" href="{{ route('students.lostAndFound') }}" data-target="lost-and-found">
                    Lost and Found
                    <span class="progress-bar"></span>
                </a>
                <div class="dropdown-content">
      <a href="{{ route('lostandfound.index')}}">My Requests</a>
      <!-- Add more menu items if needed -->
    </div>
            </li>
            <li class="dropdown">
                <a class="menu-item" href="{{ route('students.clearance') }}"  data-target="clearance">
                    Clearance
                    <span class="progress-bar"></span>
                </a>
                </a>
                <div class="dropdown-content">
      <a href="{{ route('clearances.index')}}">My Requests</a>
      <!-- Add more menu items if needed -->
    </div>
            </li>
            <li class="dropdown">
                <a class="menu-item" href="{{ route('students.emergency') }}" data-target="emergency-safety">
                    Emergency and Safety
                    <span class="progress-bar"></span>
                </a>
                <div class="dropdown-content">
      <a href="{{ route('emergencies.index')}}">My Requests</a>
      <!-- Add more menu items if needed -->
    </div>
            </li>
            <li class="dropdown">
                <a class="menu-item" href="{{ route('students.specialAccomodation') }}" data-target="special-accommodation">
                    Special Accommodation
                    <span class="progress-bar"></span>
                </a>
                <div class="dropdown-content">
      <a href="{{ route('accommodation.index')}}">My Requests</a>
      <!-- Add more menu items if needed -->
    </div>
            </li>
            <li class="dropdown">
                <a class="menu-item" href="{{ route('students.dormChange') }}" data-target="dorm-change">
                    Dorm Change
                    <span class="progress-bar"></span>
                </a>
                <div class="dropdown-content">
      <a href="{{ route('dorm-changes.index')}}">My Requests</a>
      <!-- Add more menu items if needed -->
    </div>
            </li>
            <li class="dropdown">
                <a class="menu-item" href="{{ route('resource-exit.create') }}" data-target="resource-exist">
                    Resource Exist
                    <span class="progress-bar"></span>
                </a>
                <div class="dropdown-content">
      <a href="{{ route('resource-exist.all')}}">My Requests</a>
      <!-- Add more menu items if needed -->
    </div>
            </li>
        </ul>
    </nav>

    
    @yield('content')
</body>
</html>