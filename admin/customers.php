<?php
include 'inc/header.php';
?>
    
            <!------------content-body------------>
<?php
           
$sql = "SELECT * FROM tbl_customer";
$result = $conn->query($sql);
?>

<div class="container">
    <h2>Customer List</h2>
    <table class="table table-bordered" style="background-color: #00536cad;color: white;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email ID</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['phone'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="6">No orders found.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include 'inc/footer.php';
?>