<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);

$prodID = $data['prodID'];
$price = $data['price'];
$size = $data['size'];
$quantity = 1;  // กำหนดค่า quantity เป็น 1

// ตรวจสอบข้อมูลที่จำเป็น
if (!$prodID || !$price || !$size|| !$username ) {
    echo json_encode(['success' => false, 'message' => 'ข้อมูลไม่ครบถ้วน']);
    exit();
}

// ตรวจสอบว่ามีค่า username ใน session หรือไม่
if (!isset($_SESSION['username'])) {
    echo json_encode(['success' => false, 'message' => 'กรุณาเข้าสู่ระบบก่อน']);
    exit();
}

// ดึงค่า userID จาก session
$username = $_SESSION['username'];
$userSql = "SELECT userID FROM users WHERE username = ?";
$userStmt = $conn->prepare($userSql);
$userStmt->bind_param("s", $username);
$userStmt->execute();
$userResult = $userStmt->get_result();
if ($userResult->num_rows > 0) {
    $userRow = $userResult->fetch_assoc();
    $userID = $userRow['userID'];
} else {
    echo json_encode(['success' => false, 'message' => 'ไม่พบข้อมูล userID']);
    exit();
}
// ดึงค่า sizeID และ stock จากตาราง sizes
$sizeSql = "SELECT sizeID, stock FROM sizes WHERE prodID = ? AND size = ?";
$sizeStmt = $conn->prepare($sizeSql);
$sizeStmt->bind_param("is", $prodID, $size);
$sizeStmt->execute();
$sizeResult = $sizeStmt->get_result();
if ($sizeResult->num_rows > 0) {
    $sizeRow = $sizeResult->fetch_assoc();
    $sizeID = $sizeRow['sizeID'];
    $stock = $sizeRow['stock'];
} else {
    echo json_encode(['success' => false, 'message' => 'ไม่พบข้อมูล sizeID หรือ stock']);
    exit();
}
// ตรวจสอบสต็อกสินค้า
if ($stock <= $quantity) {
    echo json_encode(['success' => false, 'message' => 'สินค้าในสต็อกไม่เพียงพอ']);
    exit();
}
// ลดจำนวนสินค้าในสต็อก
$newStock = $stock - $quantity;
$updateStockSql = "UPDATE sizes SET stock = ? WHERE sizeID = ?";
$updateStockStmt = $conn->prepare($updateStockSql);
$updateStockStmt->bind_param("ii", $newStock, $sizeID);
if (!$updateStockStmt->execute()) {
    echo json_encode(['success' => false, 'message' => 'ไม่สามารถอัพเดทสต็อกสินค้าได้']);
    exit();
}
$oderItemsID =1;
// เพิ่มข้อมูลลงในตาราง orderitems
$insertOrderSql = "INSERT INTO orderitems (oderItemsID,userID, quantity, sizeID) VALUES (?, ?, ?,?)";
$insertOrderStmt = $conn->prepare($insertOrderSql);
$insertOrderStmt->bind_param("iii",$oderItemsID, $userID, $quantity, $sizeID);
if ($insertOrderStmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Order placed successfully!', 'remainingStock' => $newStock]);
} else {
    echo json_encode(['success' => false, 'message' => 'ไม่สามารถเพิ่มคำสั่งซื้อได้']);
}
echo json_encode(['success' => true, 'message' => 'Order placed successfully!']);
