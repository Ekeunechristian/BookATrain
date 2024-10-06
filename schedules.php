<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Schedules</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 2.5em;
        }

        /* Styling for buttons */
        .btn {
            padding: 10px 20px;
            margin: 10px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .btn-return {
            background-color: #007bff;
        }

        .btn-logout {
            background-color: #dc3545;
        }

        .btn-add {
            background-color: #28a745;
        }

        .btn-edit {
            background-color: #007bff;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn:hover {
            filter: brightness(90%);
        }

        /* Styling for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }

        /* Styling for modals */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 60%;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: #333;
            text-decoration: none;
        }

        /* Form styling within modal */
        .modal-content form {
            display: grid;
            gap: 15px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input[type=text], 
        .form-group input[type=datetime-local],
        .form-group input[type=number] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.2s ease;
        }

        .form-group input[type=text]:focus, 
        .form-group input[type=datetime-local]:focus,
        .form-group input[type=number]:focus {
            border-color: #007bff;
            outline: none;
        }

        .form-group button[type=submit] {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 12px 24px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .form-group button[type=submit]:hover {
            background-color: #218838;
        }
    </style>
</head>
<script>
        window.onload = function() {
            // Check if the query parameters 'message' and 'type' are present
            const urlParams = new URLSearchParams(window.location.search);
            const message = urlParams.get('message');
            const type = urlParams.get('type');

            if (message) {
                let alertType = 'success';
                if (type === 'error') {
                    alertType = 'error';
                }
                alert(message);
            }
        }
    </script>
<body>
    <h1>Manage Schedules</h1>
    
    <button class="btn btn-return" onclick="window.history.back()">Return</button>
    <button class="btn btn-logout" onclick="window.location.href='logout.php'">Logout</button>
    <button class="btn btn-add" onclick="showAddForm()">Add New Schedule +</button>

    <!-- Add Schedule Form Modal -->
    <div id="addModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('addModal')">&times;</span>
            <h3>Add New Schedule</h3>
            <form id="addForm" action="add_schedule.php" method="POST">
                <div class="form-group">
                    <label for="operator">Operator:</label>
                    <input type="text" id="operator" name="operator" required>
                </div>
                
                <div class="form-group">
                    <label for="departure_time">Departure Time:</label>
                    <input type="datetime-local" id="departure_time" name="departure_time" required>
                </div>
                
                <div class="form-group">
                    <label for="arrival_time">Arrival Time:</label>
                    <input type="datetime-local" id="arrival_time" name="arrival_time" required>
                </div>
                
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" step="0.01" required>
                </div>
                
                <div class="form-group">
                    <label for="start_point">Start Point:</label>
                    <input type="text" id="start_point" name="start_point" required>
                </div>
                
                <div class="form-group">
                    <label for="end_point">End Point:</label>
                    <input type="text" id="end_point" name="end_point" required>
                </div>
                
                <div class="form-group">
                    <label for="number_of_changes">Number of Changes:</label>
                    <input type="number" id="number_of_changes" name="number_of_changes" value="0">
                </div>
                
                <div class="form-group">
                    <button type="submit">Add Schedule</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Schedule Form Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('editModal')">&times;</span>
            <h3>Edit Schedule</h3>
            <form id="editForm" action="edit_schedule.php" method="POST">
                <input type="hidden" id="edit_schedule_id" name="schedule_id">
                
                <div class="form-group">
                    <label for="edit_operator">Operator:</label>
                    <input type="text" id="edit_operator" name="operator" required>
                </div>
                
                <div class="form-group">
                    <label for="edit_departure_time">Departure Time:</label>
                    <input type="datetime-local" id="edit_departure_time" name="departure_time" required>
                </div>
                
                <div class="form-group">
                    <label for="edit_arrival_time">Arrival Time:</label>
                    <input type="datetime-local" id="edit_arrival_time" name="arrival_time" required>
                </div>
                
                <div class="form-group">
                    <label for="edit_price">Price:</label>
                    <input type="number" id="edit_price" name="price" step="0.01" required>
                </div>
                
                <div class="form-group">
                    <label for="edit_train_id">Train ID:</label>
                    <input type="number" id="edit_train_id" name="train_id" required>
                </div>
                
                <div class="form-group">
                    <label for="edit_start_point">Start Point:</label>
                    <input type="text" id="edit_start_point" name="start_point" required>
                </div>
                
                <div class="form-group">
                    <label for="edit_end_point">End Point:</label>
                    <input type="text" id="edit_end_point" name="end_point" required>
                </div>
                
                <div class="form-group">
                    <label for="edit_number_of_changes">Number of Changes:</label>
                    <input type="number" id="edit_number_of_changes" name="number_of_changes" value="0">
                </div>
                
                <div class="form-group">
                    <button type="submit">Update Schedule</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Display Schedules Table -->
    <table>
        <tr>
            <th>ID</th>
            <th>Operator</th>
            <th>Departure Time</th>
            <th>Arrival Time</th>
            <th>Duration</th>
            <th>Price</th>
            <th>Train ID</th>
            <th>Start Point</th>
            <th>End Point</th>
            <th>Changes</th>
            <th>Actions</th>
        </tr>
        <?php
        // Database connection
        include 'db_connection.php';

        // Fetch data from Schedules table
        $sql = "SELECT *, TIMEDIFF(arrival_time, departure_time) AS duration FROM Schedules";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['schedule_id'] . "</td>";
                echo "<td>" . $row['operator'] . "</td>";
                echo "<td>" . $row['departure_time'] . "</td>";
                echo "<td>" . $row['arrival_time'] . "</td>";
                echo "<td>" . $row['duration'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['train_id'] . "</td>";
                echo "<td>" . $row['start_point'] . "</td>";
                echo "<td>" . $row['end_point'] . "</td>";
                echo "<td>" . $row['number_of_changes'] . "</td>";
                echo '<td><button class="btn btn-edit" onclick="openEditModal(' . $row['schedule_id'] . ', \'' . $row['operator'] . '\', \'' . $row['departure_time'] . '\', \'' . $row['arrival_time'] . '\', ' . $row['price'] . ', ' . $row['train_id'] . ', \'' . $row['start_point'] . '\', \'' . $row['end_point'] . '\', ' . $row['number_of_changes'] . ')">Edit</button>';
                echo '<button class="btn btn-delete" onclick="confirmDelete(' . $row['schedule_id'] . ')">Delete</button></td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='11'>No schedules found</td></tr>";
        }

        $conn->close();
        ?>
    </table>

    <script>
        // Function to show the add form
        function showAddForm() {
            document.getElementById("addModal").style.display = "block";
        }

        // Function to open the edit form modal and populate the fields
        function openEditModal(scheduleId, operator, departureTime, arrivalTime, price, trainId, startPoint, endPoint, numberOfChanges) {
            document.getElementById("edit_schedule_id").value = scheduleId;
            document.getElementById("edit_operator").value = operator;
            document.getElementById("edit_departure_time").value = departureTime.replace(' ', 'T');
            document.getElementById("edit_arrival_time").value = arrivalTime.replace(' ', 'T');
            document.getElementById("edit_price").value = price;
            document.getElementById("edit_train_id").value = trainId;
            document.getElementById("edit_start_point").value = startPoint;
            document.getElementById("edit_end_point").value = endPoint;
            document.getElementById("edit_number_of_changes").value = numberOfChanges;
            document.getElementById("editModal").style.display = "block";
        }

        // Function to confirm and delete a schedule
        function confirmDelete(scheduleId) {
            if (confirm("Are you sure you want to delete this schedule?")) {
                // Redirect to delete_schedule.php with scheduleId as parameter
                window.location.href = 'delete_schedule.php?id=' + scheduleId;
            }
        }

        // Function to close modal
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }
    </script>
</body>
</html>
