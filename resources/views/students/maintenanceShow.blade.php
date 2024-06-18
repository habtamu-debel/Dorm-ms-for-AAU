<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Request</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4">Maintenance Request</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Requester Name: {{ $maintenanceRequest->requester_name }}</h5>
                <p class="card-text">Department: {{ $maintenanceRequest->department }}</p>
                <p class="card-text">Issue Description: {{ $maintenanceRequest->issue_description }}</p>
                <p class="card-text">Contact Details: {{ $maintenanceRequest->contact_details }}</p>
                @if ($maintenanceRequest->supporting_documents)
                    <p class="card-text">Supporting Documents: <a href="{{ asset('storage/' . $maintenanceRequest->supporting_documents) }}" target="_blank">View Documents</a></p>
                @endif
            </div>
        </div>
    </div>
</body>
</html>