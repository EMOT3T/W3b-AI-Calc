<?php

function sessionVerify() {
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../logout/logout.php");
        exit;
    } else {
        require_once("../connection/connect.php");

        $userId = $_SESSION['user_id'];

        $query = "SELECT p.policy_type
                  FROM Policy p
                  JOIN PolicyUsers pu ON p.policy_id = pu.policy_id
                  JOIN Users u ON u.user_id = pu.user_id
                  WHERE u.user_id = ?";
        
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        $permissions = array();

        if ($row = $result->fetch_assoc()) {
            $permissions = array('user_id' => $userId, 'permission' => $row['policy_type']);
        }

        $_SESSION['permissions'] = $permissions;

        $stmt->close();
        $conn->close();
    }
}

?>
