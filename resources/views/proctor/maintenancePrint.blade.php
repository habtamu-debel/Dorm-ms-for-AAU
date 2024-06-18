<!DOCTYPE html>
<html>
<head>
    <style>
        /* Add your custom print styles here */
        /* Example: */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #444;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        h2 {
            color: #555;
            margin-bottom: 15px;
        }
        p {
            margin-bottom: 20px;
        }
        strong {
            font-weight: bold;
        }
        img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
        }

        /* Additional Styles */
        .paper-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            border: 1px solid #999;
            background-color: #f5f5f5;
        }

        .intro {
            font-size: 18px;
            line-height: 1.4;
            margin-bottom: 30px;
        }

        .section-heading {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .section-text {
            margin-bottom: 20px;
        }

        .section-label {
            font-weight: bold;
            color: #555;
        }

        .section-value {
            margin-left: 15px;
            color: #333;
        }

        .thank-you {
            font-style: italic;
            color: #666;
        }

        /* Hide the print button when printing */
        @media print {
            .print-button {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="paper-form">
        <h1>Building Maintenance Request</h1>

        <p class="intro">This is building maintenance request form submitted to the maintenance team</p>

        <h2 class="section-heading">Maintenance Request Details</h2>

        <p class="section-text"><span class="section-label">Occurrence:</span> <span class="section-value">{{ $buildingMaintenance->occurrence }}</span></p>
        
        <p class="section-text"><span class="section-label">Maintenance Type:</span> <span class="section-value">{{ $buildingMaintenance->category }}</span></p>
        
        <p class="section-text"><span class="section-label">Impact Level:</span> <span class="section-value">{{ $buildingMaintenance->impact }}</span></p>
        
        <p class="section-text"><span class="section-label">Urgency:</span> <span class="section-value">{{ $buildingMaintenance->urgency }}</span></p>
        
        <p class="section-text"><span class="section-label">Location:</span> <span class="section-value">{{ $buildingMaintenance->room }}</span></p>
        
        <p class="section-text"><span class="section-label">Description:</span> <span class="section-value">{{ $buildingMaintenance->description }}</span></p>

        <h2 class="section-heading">Maintenance Issue Image</h2>

        <p class="section-text">Please refer to the picture below for the maintenance issue:</p>
        <img src="{{ $buildingMaintenance->media }}" alt="Maintenance Issue">

        <p class="thank-you">Thank you for accepting our request. We expect your response soon.</p>
    </div>

    <button class="print-button" onclick="window.print()">Print</button>

</body>
</html>