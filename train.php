<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Trains</title>
    <style>
        /* Resetting default margins and paddings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Styling for buttons */
        .btn {
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-return {
            background-color: #6c757d;
            color: #fff;
        }

        .btn-return:hover {
            background-color: #5a6268;
        }

        .btn-edit {
            background-color: #007bff;
            color: #fff;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        /* Styling for tables */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden; /* Ensures the shadow doesn't spill over */
            margin-bottom: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
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
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #ccc;
            width: 50%;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .modal-content h3 {
            margin-top: 0;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #333;
            text-decoration: none;
        }

        /* Form styling within modal */
        .modal-content form {
            display: grid;
            gap: 10px;
        }

        .modal-content form label {
            font-weight: bold;
        }

        .modal-content form input[type=text],
        .modal-content form input[type=number] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.2s ease;
        }

        .modal-content form input[type=text]:focus,
        .modal-content form input[type=number]:focus {
            border-color: #007bff;
            outline: none;
        }

        .modal-content form button[type=submit] {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .modal-content form button[type=submit]:hover {
            background-color: #218838;
        }

        .modal-content .btn-cancel {
            background-color: #6c757d;
            color: #fff;
        }

        .modal-content .btn-cancel:hover {
            background-color: #5a6268;
        }
        .btn-logout {
            background-color: #dc3545;
        }
    </style>
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
</head>
<body>
    <h1>Manage Trains</h1>

    <button class="btn btn-return" onclick="window.history.back()">Return</button>
    <button class="btn btn-logout" onclick="window.location.href='logout.php'">Logout</button>
    <button class="btn btn-edit" onclick="openModal('addModal')">Add New Train +</button>

    <!-- Add Train Form Modal -->
    <div id="addModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('addModal')">&times;</span>
            <h3>Add New Train</h3>
            <form id="addForm" action="add_train.php" method="POST">
                <div class="form-group">
                    <label for="train_name">Train Name:</label>
                    <input type="text" id="train_name" name="train_name" required>
                </div>
                <div class="form-group">
                    <label for="station">Station:</label>
                    <input type="text" id="station" name="station" required>
                </div>
                <div class="form-group">
                    <button type="submit">Add Train</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Train Form Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('editModal')">&times;</span>
            <h3>Edit Train</h3>
            <form id="editForm" action="edit_train.php" method="POST">
                <input type="hidden" id="edit_train_id" name="train_id">
                <div class="form-group">
                    <label for="edit_train_name">Train Name:</label>
                    <input type="text" id="edit_train_name" name="train_name" required>
                </div>
                <div class="form-group">
                    <label for="edit_station">Station:</label>
                    <input type="text" id="edit_station" name="station" required>
                </div>
                <div class="form-group">
                    <button type="submit">Update Train</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('deleteModal')">&times;</span>
            <h3>Confirm Deletion</h3>
            <p>Deleting this train will also delete all associated schedules. Do you want to continue?</p>
            <button id="confirmDeleteBtn">Confirm</button>
            <button class="btn-cancel" onclick="closeModal('deleteModal')">Cancel</button>
        </div>
    </div>

    <!-- Display Trains Table -->
    <table>
        <tr>
            <th>ID</th>
            <th>Train Name</th>
            <th>Station</th>
            <th>Actions</th>
        </tr>
        <?php
        // Database connection details
        include 'db_connection.php';

        // Fetch data from Trains table
        $sql = "SELECT * FROM Trains";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['train_id'] . "</td>";
                echo "<td>" . $row['train_name'] . "</td>";
                echo "<td>" . $row['station'] . "</td>";
                echo '<td><button class="btn btn-edit" onclick="openEditModal(' . $row['train_id'] . ', \'' . $row['train_name'] . '\', \'' . $row['station'] . '\')">Edit</button>';
                echo '<button class="btn btn-delete" onclick="confirmDelete(' . $row['train_id'] . ')">Delete</button></td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No trains found</td></tr>";
        }

        $conn->close();
        ?>
    </table>

    <script>
        // Function to open a modal
        function openModal(modalId) {
            document.getElementById(modalId).style.display = "block";
        }

        // Function to close a modal
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }

        // Function to open the edit form modal and populate the fields
        function openEditModal(trainId, trainName, station) {
            document.getElementById("edit_train_id").value = trainId;
            document.getElementById("edit_train_name").value = trainName;
            document.getElementById("edit_station").value = station;
            openModal('editModal');
        }

        // Function to confirm deletion and open the delete modal
        function confirmDelete(trainId) {
            openModal('deleteModal');
            document.getElementById('confirmDeleteBtn').onclick = function() {
                window.location.href = 'delete_train.php?id=' + trainId;
            }
        }
    </script>
</body>
</html>
