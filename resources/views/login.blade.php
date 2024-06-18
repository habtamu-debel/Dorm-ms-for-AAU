

@section('content')

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Dormitory</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <style>
        .error-message {
  color: red;
  font-size: 14px;
  margin-top: 5px;
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
            <li><a href="{{ route('login') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <div class="flex items-center">
            <li><a href="{{ route('announcements') }}">Announcements</a></li></div>
            <li><a href="{{ route('contactUs') }}">Contact Us</a></li>
            <li><a href="{{ route('help') }}">Help</a></li>
        </ul>
    </div>


    
    <div class="well">
    <h1 id="myHeading">Welcome to Dormitory Service</h1>
    <h2>Your Path to Success Starts Here: Elevating Student Dormitory Living</h2>
</div>
<div class="logo1"><img src="{{asset('images/logo.png') }}" alt="none"></div>
<div class="login-container">
    <div class="login-form">
        @isset($errorMessage)
            <p style="color: red;">{{ $errorMessage }}</p>
        @endisset
        <form method="POST" action="{{ route('login') }}">
    @csrf

    <div>

    @error('both')
        <span role="alert">
            <strong class="error-message">{{ $message }}</strong>
        </span>
        @enderror
        <label for="staffid">Staff ID</label>
        <input type="text" id="staffid" name="staffid" value="{{ old('staffid') }}" required autofocus>

        @error('staffid')
        <span role="alert">
            <strong class="error-message">{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="{{ old('password') }}" required>

        @error('password')
        <span role="alert">
            <strong class="error-message">{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>
    </div>
</div>

<div class="footer">
    &copy; {{ date('Y') }} Your Dormitory Name. All rights reserved.
</div>

    <div class="container">
        @yield('content')
    </div>

  

    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


</body>

</html>