

<?php
    foreach ($output as $user) {
        echo "
            <h1>User Details</h1>
            <p><strong>ID:</strong>".$user["user"]."</p>
            <p><strong>Name:</strong>".$user["pass"]."</p>
            <p><strong>Email:</strong>".$user["status"]."</p>
        ";
    }
?>