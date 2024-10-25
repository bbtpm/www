<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);

$prodID = $data['prodID'];
$price = $data['price'];
$size = $data['size'];
$quantity = isset($data['quantity']) ? $data['quantity'] : 1; // ตั้งค่า quantity เป็น 1 หากไม่ได้ส่งมา
$userID = $_SESSION['userID']; // รับ userID จาก session

// ตรวจสอบข้อมูลที่จำเป็น
if (!$prodID || !$price || !$size) {
    echo json_encode(['success' => false, 'message' => 'ข้อมูลไม่ครบถ้วน']);
    exit();
}

// ดึงค่า sizeID และ stock จากตาราง sizes
$sql = "SELECT sizeID, stock FROM sizes WHERE prodID = ? AND size = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $prodID, $size);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $sizeID = $row['sizeID'];
    $stock = $row['stock'];

    // ตรวจสอบ stock ว่ามีเพียงพอสำหรับ quantity ที่สั่งซื้อหรือไม่
    if ($stock >= $quantity) {
        // ดึงค่า orderID จากตาราง orders โดยอ้างอิงจาก userID
        $orderSql = "SELECT orderID FROM orders WHERE userID = ?";
        $orderStmt = $conn->prepare($orderSql);
        $orderStmt->bind_param("i", $userID);
        $orderStmt->execute();
        $orderResult = $orderStmt->get_result();

        if ($orderResult->num_rows > 0) {
            $orderRow = $orderResult->fetch_assoc();
            $orderID = $orderRow['orderID'];

            // อัปเดตตาราง orderitems
            $updateOrderItemsSql = "UPDATE orderitems SET quantity = ?, sizeID = ? WHERE orderID = ?";
            $updateOrderItemsStmt = $conn->prepare($updateOrderItemsSql);
            $updateOrderItemsStmt->bind_param("iii", $quantity, $sizeID, $orderID);
            $updateOrderItemsStmt->execute();

            // อัปเดต stock โดยการหัก quantity ออก
            $newStock = $stock - $quantity;
            $updateStockSql = "UPDATE sizes SET stock = ? WHERE sizeID = ?";
            $updateStockStmt = $conn->prepare($updateStockSql);
            $updateStockStmt->bind_param("ii", $newStock, $sizeID);
            $updateStockStmt->execute();

            // ตรวจสอบการอัปเดตสำเร็จหรือไม่
            if ($updateOrderItemsStmt->affected_rows > 0 && $updateStockStmt->affected_rows > 0) {
                echo json_encode(['success' => true, 'message' => 'Order updated successfully!', 'sizeID' => $sizeID, 'remainingStock' => $newStock]);
            } else {
                echo json_encode(['success' => false, 'message' => 'เกิดข้อผิดพลาดในการอัปเดตข้อมูล']);
            }

            $updateOrderItemsStmt->close();
            $updateStockStmt->close();
        } else {
            echo json_encode(['success' => false, 'message' => 'ไม่พบ orderID สำหรับ userID ที่กำหนด']);
        }
        $orderStmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'สินค้าในสต็อกไม่เพียงพอ']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ไม่พบข้อมูล sizeID สำหรับ prodID และ size ที่กำหนด']);
}

$stmt->close();
$conn->close();
?>
