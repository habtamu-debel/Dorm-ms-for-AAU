<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar, Proctor Info, and Footer Example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/adminRegister.css') }}">
  <style>
    .error-message {
      color: red;
     
    }
    .error-input {
      border-color: red;
    }
  </style>
</head>
<body>

<div class="form-container">
    <h2>Register Staff</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.register') }}" onsubmit="return validateForm()">
        @csrf

        <div>
            <label for="staffid">ID</label>
            <input type="text" name="staffid" id="staffid" value="{{ old('staffid') }}" required>
            @if ($errors->has('staffid'))
    <small class="error-message">{{ $errors->first('staffid') }}</small>
@endif
        </div>
        <div>
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname" pattern="[A-Za-z]+" value="{{ old('firstname') }}" required>
           
        </div>

        <div>
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname" pattern="[A-Za-z]+" value="{{ old('lastname') }}" required>
          
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="text" name="password" id="password" value="{{ old('password', rand(1000, 9999)) }}" readonly required>
        </div>

        <div>
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone"  value="{{ old('phone') }}" required>
    <small class="error-message">Please enter a valid phone number.</small>
</div>

        <div>
            <label for="role">Role</label>
            <select name="role" id="role" required>
                <option value="Proctor">Proctor</option>
                <option value="Proctor Manager">Proctor Manager</option>
                <option value="Dean of Students">Dean of Students</option>
                <option value="Admin">Admin</option>
                <option value="Proctor Director">Proctor Director</option>
                <option value="Registrar">Registrar</option>
                <!-- Add more options as needed -->
            </select>
        </div>

        <div>
            <label for="campus">Campus</label>
            <select name="campus" id="campus" required>
                <option value="Main">Main</option>
                <option value="FBE">FBE</option>
                <option value="5 Kilo">5 Kilo</option>
                <option value="4 Kilo">4 Kilo</option>
                <option value="Ldeta">Ldeta</option>
                <option value="Sefere Selam">Sefere Selam</option>
                <option value="Bishoftu">Bishoftu</option>
                <option value="Bishoftu">Admin</option>
                <!-- Add more options as needed -->
            </select>
        </div>

        <button type="submit">Register</button>
    </form>
</div>
<script>
function validateForm() {
    const firstNameInput = document.getElementById('firstname');
    const lastNameInput = document.getElementById('lastname');
    const phoneInput = document.getElementById('phone');

    const firstNamePattern = /^[A-Za-z]+$/;
    const lastNamePattern = /^[A-Za-z]+$/;
    const phonePattern = /^\+251\d{9}$/;

    let errorFlag = false;

    if (!firstNamePattern.test(firstNameInput.value)) {
        firstNameInput.classList.add('error-input');
        firstNameInput.nextElementSibling.style.display = 'block';
        errorFlag = true;
    } else {
        firstNameInput.classList.remove('error-input');
        firstNameInput.nextElementSibling.style.display = 'none';
    }

    if (!lastNamePattern.test(lastNameInput.value)) {
        lastNameInput.classList.add('error-input');
        lastNameInput.nextElementSibling.style.display = 'block';
        errorFlag = true;
    } else {
        lastNameInput.classList.remove('error-input');
        lastNameInput.nextElementSibling.style.display = 'none';
    }

    if (!phonePattern.test(phoneInput.value)) {
        phoneInput.classList.add('error-input');
        phoneInput.nextElementSibling.style.display = 'block';
        errorFlag = true;
    } else {
        phoneInput.classList.remove('error-input');
        phoneInput.nextElementSibling.style.display = 'none';
    }

    return !errorFlag;
}

// Assign the old values to the input fields
const firstNameInput = document.getElementById('firstname');
const lastNameInput = document.getElementById('lastname');
const phoneInput = document.getElementById('phone');
firstNameInput.value = "{{ old('firstname') }}";
lastNameInput.value = "{{ old('lastname') }}";
phoneInput.value = "{{ old('phone') }}";

// Set the "+251" prefix as the initial value of the phone input and disable editing
phoneInput.value = "+251";
phoneInput.addEventListener('input', function(event) {
    const inputValue = phoneInput.value;
    const prefix = "+251";

    if (!inputValue.startsWith(prefix)) {
        phoneInput.value = prefix;
    }
});
</script>

</body>
</html>