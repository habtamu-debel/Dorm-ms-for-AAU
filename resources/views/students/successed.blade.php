<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar, Proctor Info, and Footer Example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/studentHome.css') }}">
  
  <style>
    /* Success Page CSS */
    .success-page {
      background-color: #f5f5f5;
      padding: 4rem 0;
    }

    .success-card {
      background-color: #fff;
      border: none;
      border-radius: 1rem;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }

    .success-card .card-header {
      background-color: #007bff;
      color: #fff;
      border-top-left-radius: 1rem;
      border-top-right-radius: 1rem;
      padding: 2rem;
    }

    .success-card .card-header h1 {
      font-size: 2.5rem;
      font-weight: 600;
      margin-bottom: 0;
    }

    .success-card .card-body {
      padding: 3rem;
    }

    .success-icon {
      font-size: 5rem;
      color: #007bff;
      margin-bottom: 2rem;
    }

    .success-message {
      font-size: 1.5rem;
      font-weight: 500;
      margin-bottom: 3rem;
    }

    .appointment-details, .next-steps {
      background-color: #f5f5f5;
      border-radius: 1rem;
      padding: 2rem;
      margin-bottom: 2rem;
    }

    .appointment-details h4, .next-steps h4 {
      font-size: 1.75rem;
      font-weight: 600;
      margin-bottom: 1.5rem;
    }

    .appointment-details ul, .next-steps ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    .appointment-details li, .next-steps li {
      font-size: 1.2rem;
      margin-bottom: 1rem;
    }

    .appointment-details li strong, .next-steps li i {
      font-weight: 600;
      margin-right: 0.75rem;
    }

    .next-steps li i {
      color: #007bff;
    }

    .return-button {
      margin-top: 3rem;
    }
  </style>
</head>

<body>
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="success-card">
          <div class="card-header">
            <h3 class="text-center">Appointment Scheduled Successfully !</h3>
          </div>
          <div class="card-body">
            <div class="text-center mb-4">
              <i class="fas fa-check-circle success-icon"></i>
            </div>
           

            

            <div class="next-steps">
              <h4>Next Steps</h4>
              <ul>
                <li><i class="fas fa-calendar-check"></i> Your appointment has been scheduled. Please make a note of the details.</li>
                <li><i class="fas fa-user-md"></i> You will be contacted soon to confirm your appointment.</li>
              </ul>
            </div>

            <div class="text-center return-button">
              <a href="#" class="btn btn-primary">Return to Dashboard</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>