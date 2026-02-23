<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "bleuConnection.php";

// Ensure only admins
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: bleuLogin.php");
    exit;
}

// Get all clients (including pending & approved)
$bleusql = "SELECT * FROM users WHERE role = 'client'";
$bleuuserres = $bleuConn->query($bleusql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Clients</title>
<style>
body {
    font-family: "Georgia", serif;
    background-color: #ffffff;
    color: #000;
    margin: 0;
    padding: 30px;
}
h1 { text-align: center; font-size: 2.5rem; margin-bottom: 20px; }
table { width: 95%; margin: auto; border-collapse: collapse; border: 1px solid black; }
thead { background: #5b5656; color: white; }
th, td { padding: 12px; text-align: center; border-bottom: 1px solid black; }
tr:hover { background: #e6e6e6; }
.bleuappbtn { background: white; border: 2px solid black; padding: 6px 12px; cursor: pointer; }
.bleuappbtn:hover { background: black; color: white; }
.bleudenybtn { background: white; border: 2px solid red; color: red; padding: 6px 12px; cursor: pointer; }
.bleudenybtn:hover { background: red; color: white; }
.approved { color: green; font-weight: bold; }
.pending { color: orange; font-weight: bold; }
</style>
<script>
function denyClient(id, row) {
    if(confirm("Are you sure you want to deny this client?")) {
        // Redirect to delete script
        window.location.href = "bleuAdminDenyClients.php?bleuid=" + id;
    }
}
</script>
</head>
<body>

<h1>View Clients</h1>
<table>
<thead>
<tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Username</th>
    <th>Type</th>
    <th>Status</th>
</tr>
</thead>
<tbody>
<?php
if ($bleuuserres && $bleuuserres->num_rows > 0) {
    while ($u = $bleuuserres->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($u['id']) . "</td>";
        echo "<td>" . htmlspecialchars($u['fname']) . "</td>";
        echo "<td>" . htmlspecialchars($u['lname']) . "</td>";
        echo "<td>" . htmlspecialchars($u['email']) . "</td>";
        echo "<td>" . htmlspecialchars($u['username']) . "</td>";
        echo "<td>Client</td>";

        if ($u["status"] == 0) {
            echo "<td>
                <span class='pending'>Pending</span><br><br>
                <button class='bleuappbtn'
                    onclick=\"location.href='bleuAdminApproveClients.php?bleuid={$u['id']}'\">
                    Approve
                </button>
                <button class='bleudenybtn'
                    onclick=\"denyClient({$u['id']}, this)\">
                    Deny
                </button>
            </td>";
        } else {
            echo "<td class='approved'>Approved</td>";
        }

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No clients found.</td></tr>";
}
?>
</tbody>
</table>
</body>
</html>
