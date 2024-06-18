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
    </style>
   
</head>
<body>
    <nav>
        <ul>
            <li>
                <a class="menu-item" href="{{route('roomMaintenance.all')}}" data-target="room-maintenance">
                    Room Maintenance
                    <span class="progress-bar"></span>
                </a>
            </li>

            <li>
                <a class="menu-item" href="{{route('clearanceResponse.all')}}" data-target="room-maintenance">
                    Clearance Request
                    <span class="progress-bar"></span>
                </a>
            </li>

            <li>
                <a class="menu-item" href="{{route('lostandfound.all')}}" data-target="room-maintenance">
                    Lost and Found
                    <span class="progress-bar"></span>
                </a>
            </li>



            <li>
                <a class="menu-item" href="{{route('emergencies.all')}}" data-target="room-maintenance">
                 Emergency And Safety
                    <span class="progress-bar"></span>
                </a>
            </li>


            <li>
            <a class="menu-item" href="{{ route('accommodated.all') }}" data-target="room-maintenance">
    Special Accommodation
    <span class="progress-bar"></span>
</a>
            </li>


            <li>
                <a class="menu-item" href="{{route('dormChange.all')}}" data-target="room-maintenance">
                 Dorm Change
                    <span class="progress-bar"></span>
                </a>
            </li>

            <li>
                <a class="menu-item" href="{{route('resource-exist.all')}}" data-target="room-maintenance">
                    Resource Exist
                    <span class="progress-bar"></span>
                </a>
            </li>
           
        </ul>
    </nav>

    
    @yield('content')
</body>
</html>