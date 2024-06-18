<!DOCTYPE html>
<html>
<head>
    <title>Room Maintenance Request</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .maintenance-issue {
            margin-bottom: 20px;
            padding: 20px;
            border-bottom: 1px solid #ccc;
        }

        .room-number {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .maintenance-type {
            margin-bottom: 15px;
        }

        .urgency-level {
            font-weight: bold;
        }

        .contact-info {
            margin-top: 20px;
            text-align: right;
        }

        .print-button {
            display: block;
            margin-top: 20px;
            text-align: center;
        }

        .date {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 16px;
            text-align: right;
        }

        @media print {
            .container {
                max-width: inherit;
                margin: 0;
                padding: 0;
                box-shadow: none;
                border: none;
            }

            .maintenance-issue {
                margin-bottom: 20px;
                border-bottom: none;
            }

            .contact-info {
                display: none;
            }

            .print-button {
                display: none;
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dateElement = document.getElementById('current-date');
            var currentDate = new Date().toLocaleDateString();
            dateElement.textContent = currentDate;
        });
    </script>
</head>
<body>
    <div class="container">
        <h1>Room Maintenance Request</h1>
        <p class="date" id="current-date"></p>
        <div class="maintenance-issue">
            <p class="room-number">Maintenance Issue in Room {{ $roomMaintenance->room_number }}</p>
            <p class="maintenance-type">The room requires {{ $roomMaintenance->maintenance_type }} due to its <span class="urgency-level">{{ $roomMaintenance->urgency }}</span> level of urgency.</p>
            <p class="contact-info">For any further communication, please contact {{ $roomMaintenance->contact }}.</p>
        </div>
        
        <div class="print-button">
            <button onclick="window.print()">Print</button>
        </div>
    </div>
</body>
</html>