<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        /* Basic styles */
        body {
            padding: 0;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        .header {
            background: linear-gradient(135deg, #fddde6, #a7c7e7);
            height: 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            padding: 0 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-bottom: 3px solid #fdcfe9;
        }

        /* ปรับแต่ง Navbar */
        .navbar-custom {
            background-color: #fff;
            border-bottom: 1px solid #e0e0e0;
            padding: 0.5rem 1rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar-custom .navbar-nav .nav-link {
            color: black;
            font-weight: bold;
            text-transform: uppercase;
            margin: 0 0.5rem;
            transition: color 0.3s, border-bottom 0.3s;
        }

        .navbar-custom .navbar-nav .nav-link:hover {
            color: #fdcfe9;
            border-bottom: 2px solid #fdcfe9;
        }

        .navbar-custom .navbar-nav .nav-link.active {
            border-bottom: 3px solid #a7c7e7;
        }

        /* ปรับแต่ง Floating Cart Button */
        .floating-cart {
            background: linear-gradient(135deg, #fddde6, #a7c7e7);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            color: #fff;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .floating-cart:hover {
            transform: scale(1.15) rotate(5deg);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        .btn-custom {
            background-color:#FDDDE6;
            /* สีพื้นหลังปุ่ม */
            color: white;
            /* สีข้อความในปุ่ม */
            border: none;
            /* ไม่แสดงขอบ */
            padding: 10px 20px;
            /* ระยะห่างภายในปุ่ม */
            border-radius: 50px;
            /* มุมโค้งมน */
            font-size: 16px;
            /* ขนาดฟอนต์ */
            font-weight: bold;
            /* ตัวหนา */
            cursor: pointer;
            /* เปลี่ยนรูปเคอร์เซอร์ */
            transition: all 0.3s ease;
            /* ทำให้การเปลี่ยนแปลงนุ่มนวล */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* แสงเงา */
        }

        .btn-custom:hover {
            background-color: #218838;
            /* สีปุ่มเมื่อ hover */
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
            /* เงาเข้มขึ้นเมื่อ hover */
            transform: translateY(-2px);
            /* ยกปุ่มขึ้นเมื่อ hover */
        }

        .btn-custom:active {
            background-color: #1e7e34;
            /* สีปุ่มเมื่อคลิก */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            /* เงาตอนคลิก */
            transform: translateY(0);
            /* ปุ่มกดลง */
        }

        /* ปรับแต่ง Card */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        /* ปรับแต่งปุ่ม Buy Now ให้มีลักษณะ 3 มิติ */
        .btn-primary {
            background: linear-gradient(135deg, #fddde6, #a7c7e7);
            color: white;
            border: none;
            border-radius: 25px;
            padding: 12px 25px;
            font-weight: bold;
            text-transform: uppercase;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3), 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .btn-primary:before {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #a7c7e7, #fddde6);
            border-radius: 25px;
            z-index: -1;
            filter: blur(8px);
            transform: scale(1.05);
        }

        .btn-primary:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3), 0 3px 10px rgba(0, 0, 0, 0.2);
        }

        .btn-primary:active {
            transform: translateY(1px) scale(0.98);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2), 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            height: 220px;
            object-fit: cover;
        }

        .card-body {
            background-color: #fafafa;
            border-top: 2px solid #fdcfe9;
        }

        /* ปรับแต่ง Modal */
        .modal-content {
            border-radius: 15px;
            border: 2px solid #fdcfe9;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            background-color: #fddde6;
            border-bottom: none;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .modal-footer {
            border-top: none;
        }

        /* ปรับแต่งปุ่มใน Modal */
        .modal-footer .btn-primary {
            background: linear-gradient(135deg, #a7c7e7, #fdcfe9);
            border: none;
            transition: background-color 0.3s;
        }

        .modal-footer .btn-primary:hover {
            background: linear-gradient(135deg, #fdcfe9, #a7c7e7);
        }

        .lobster-regular {
            font-family: "Lobster", sans-serif;
            font-weight: 400;
            font-size: 50px;
            color: #fff;

        }

        .textname {
            display: flex;
            align-items: center;
        }

        .textname h6 {
            margin-bottom: 0;
            margin-left: 10px;
            color: white;
        }

        /* Floating cart button */
        .floating-cart {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #a7c7e7, #fddde6);
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            font-size: 24px;
            text-decoration: none;
            z-index: 1000;
            transition: background-color 0.3s, transform 0.3s;
        }

        .floating-cart:hover {
            background-color: #fdcfe9;
            transform: scale(1.1) rotate(10deg);
        }

        /* Header styles */
        .header {
            background-color: #fddde6;
            height: 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            padding: 0 20px;
        }

        .header .icon {
            font-size: 36px;
            color: white;
        }

        .textname h6 {
            margin-bottom: 0;
            margin-left: 10px;
            color: white;
            cursor: pointer;
        }

        .dropdown-menu {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .navbar-custom {
            background-color: #fff;
            border-bottom: 1px solid #e0e0e0;
            padding: 0.5rem 1rem;
        }

        .navbar-custom .navbar-nav .nav-link {
            color: black;
            font-weight: bold;
            text-transform: uppercase;
            margin: 0 0.5rem;
            transition: color 0.3s;
        }

        .navbar-custom .navbar-nav .nav-link:hover {
            color: #fdcfe9;
        }

        .navbar-custom .navbar-nav .nav-link.active {
            border-bottom: 2px solid black;
        }

        .icon-container {
            display: flex;
            align-items: center;
            position: relative;
        }

        .search-input {
            display: none;
            position: absolute;
            top: -5px;
            right: 0;
            width: 0;
            opacity: 0;
            transition: width 0.5s, opacity 0.5s;
        }

        .card {
            height: 100%;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 180px;
            /* Ensures consistent card body height */
        }

        .search-input.show {
            display: block;
            width: 200px;
            opacity: 1;
        }

        /* CSS ของคุณเหมือนเดิม */
    </style>
    <!-- Include Bootstrap JS (make sure Bootstrap JS and jQuery are included) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Script to open the cart modal when the floating cart button is clicked
        $(document).ready(function() {
            $('#openCartModal').on('click', function(e) {
                e.preventDefault(); // Prevent the default action
                $('#cartModal').modal('show'); // Show the modal
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            // จัดการการคลิกของปุ่ม 'Buy Now' เพื่อเปิด Modal
            const buyNowButtons = document.querySelectorAll('.btn-primary');
            buyNowButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const prodID = this.getAttribute('data-prod-id');
                    const productName = this.getAttribute('data-prod-name');
                    const productPrice = this.getAttribute('data-price');

                    // ตั้งค่าข้อมูลใน Modal
                    document.getElementById('productInfo').innerText = `Product: ${productName}, Price: ฿${productPrice}`;
                    document.getElementById('confirmPurchase').setAttribute('data-prod-id', prodID);
                    document.getElementById('confirmPurchase').setAttribute('data-price', productPrice);

                    // Fetch sizes ผ่าน AJAX
                    fetch(`get_sizes.php?prodID=${prodID}`)
                        .then(response => response.text())
                        .then(data => {
                            document.getElementById('sizeSelect').innerHTML = data;
                        });
                });
            });

            // จัดการการคลิกของปุ่ม 'confirmPurchase'
            document.getElementById('confirmPurchase').addEventListener('click', function() {
                const selectedSize = document.getElementById('sizeSelect').value;
                const prodID = this.getAttribute('data-prod-id');
                const productPrice = this.getAttribute('data-price');

                if (!selectedSize) {
                    alert('Please select a size before confirming your purchase.');
                    return;
                }

                alert(`Product ID: ${prodID}, Price: ฿${productPrice}, Size: ${selectedSize}`);
                // คุณสามารถใช้ข้อมูลนี้เพื่อส่งคำขอ AJAX เพิ่มเติมได้
                    document.getElementById('confirmPurchase').addEventListener('click', function() {
                    const selectedSize = document.getElementById('sizeSelect').value;
                    const prodID = this.getAttribute('data-prod-id');
                    const productPrice = this.getAttribute('data-price');

                    // ตรวจสอบว่าผู้ใช้เลือกขนาดหรือไม่
                    if (!selectedSize) {
                        alert('Please select a size before confirming your purchase.');
                        return;
                    }

                    // สร้างคำขอ AJAX โดยใช้ fetch
                    fetch('process_order.php', {
                        method: 'POST', // เลือกใช้ POST เพื่อส่งข้อมูล
                        headers: {
                            'Content-Type': 'application/json' // กำหนดประเภทข้อมูลที่ส่งเป็น JSON
                        },
                        body: JSON.stringify({
                            prodID: prodID,
                            price: productPrice,
                            size: selectedSize
                        }) // แปลงข้อมูลเป็น JSON ส่งไปยังเซิร์ฟเวอร์
                    })
                    .then(response => response.json()) // แปลงการตอบกลับจากเซิร์ฟเวอร์เป็น JSON
                    .then(data => {
                        if (data.success) {
                            alert(data.message); // แสดงข้อความเมื่อสำเร็จ เช่น "Order placed successfully!"
                        } else {
                            alert(data.message); // แสดงข้อผิดพลาดถ้ามี เช่น "Failed to place order. Please try again."
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while processing your request.');
                    });
                });

            });
        });
        function toggleSearch() {
            var searchInput = document.getElementById('searchInput');
            searchInput.classList.toggle('show'); // ใช้ 'show' ตาม class ใน CSS
        }
        </script>
</head>

<body>
    <div class="header">
        <div class="lobster-regular">StepIntoStyle</div>
        <div class="textname dropdown">
            <i class="bi bi-person-circle icon"></i>
            <h6 class="mb-0 ms-2 dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $_SESSION['username']; ?>
            </h6>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                <li>
                    <a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profile</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item text-danger" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
                </li>
            </ul>
        </div>
    </div>
    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "mydb";

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch products from the database
    $M = isset($_GET["M"]) ? $_GET["M"] : ''; // Assign $M from $_GET, default to empty string

    // Define SQL query based on $M
    if ($M == "") {
        $sql = "SELECT prodID, prodImage, prodName, price FROM products";
    } elseif ($M == 1) {
        // Query for Home (all products)
        $sql = "SELECT prodID, prodImage, prodName, price FROM products";
    } elseif ($M == 2) {
        // Query for Adidas products
        $sql = "SELECT prodID, prodImage, prodName, price FROM products WHERE brandID = 3";
    } elseif ($M == 3) {
        // Query for Nike products
        $sql = "SELECT prodID, prodImage, prodName, price FROM products WHERE brandID = 1";
    } elseif ($M == 4) {
        // Query for Puma products
        $sql = "SELECT prodID, prodImage, prodName, price FROM products WHERE brandID = 2";
    } elseif ($M == 5) {
        // Query for Vans products
        $sql = "SELECT prodID, prodImage, prodName, price FROM products WHERE brandID = 4";
    } else {
        // Query for other products (non-specific)
        $sql = "SELECT prodID, prodImage, prodName, price FROM products WHERE brandID = 5 ";
    }
    // ตรวจสอบว่ามีการส่งคำค้นมาหรือไม่
    $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

    // เขียน SQL Query ตามคำค้นหา
    if (!empty($searchQuery)) {
        // ใช้คำค้นหาในการค้นหาข้อมูลที่ตรงกับชื่อสินค้าหรือคำอธิบาย
        $sql = "SELECT prodID, prodImage, prodName, price FROM products WHERE prodName LIKE '%$searchQuery%'";
    }
    $result = $conn->query($sql);

    // Execute the query
    $result = $conn->query($sql);

    // Display results (you can adjust this part as needed)
    ?>

    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="user_dashboard.php?M=1" class="nav-link <?php if ($M == 1) echo 'active'; ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="user_dashboard.php?M=2" class="nav-link <?php if ($M == 2) echo 'active'; ?>">Adidas</a>
                    </li>
                    <li class="nav-item">
                        <a href="user_dashboard.php?M=3" class="nav-link <?php if ($M == 3) echo 'active'; ?>">Nike</a>
                    </li>
                    <li class="nav-item">
                        <a href="user_dashboard.php?M=4" class="nav-link <?php if ($M == 4) echo 'active'; ?>">Puma</a>
                    </li>
                    <li class="nav-item">
                        <a href="user_dashboard.php?M=5" class="nav-link <?php if ($M == 5) echo 'active'; ?>">Converse</a>
                    </li>
                    <li class="nav-item">
                        <a href="user_dashboard.php?M=6" class="nav-link <?php if ($M == 6) echo 'active'; ?>">Other</a>
                    </li>
                </ul>
                <div class="icon-container">
                    <!-- <span class="icon" onclick="toggleSearch()"><i class="bi bi-search"></i></span> -->
                    <!-- <input type="text" class="form-control search-input" id="searchInput" placeholder="Search..."> -->
                    <form action="user_dashboard.php" method="GET" class="d-flex">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search products" aria-label="Search">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>

                </div>
            </div>
        </div>
    </nav>

    <!-- Floating cart button -->
    <a href="#" class="floating-cart" id="openCartModal"><i class="bi bi-cart"></i></a>

    <!-- Modal for Shopping Cart -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalContent">
                <div class="container cart-container">
                    <div class="cart-body">
                        <table class="table table-hover cart-table">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "12345678";
                                $dbname = "mydb";

                                // สร้างการเชื่อมต่อฐานข้อมูล
                                $conn = mysqli_connect($servername, $username, $password, $dbname);

                                // ตรวจสอบการเชื่อมต่อ
                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                // คำสั่ง SQL ที่ใช้ JOIN ดึงข้อมูลตามที่ต้องการ รวมถึง size และยอดรวม
                                $sql = "SELECT 
                                            products.prodName, 
                                            orderitems.size, 
                                            orderitems.price, 
                                            orderitems.quantity, 
                                            (orderitems.price * orderitems.quantity) AS totalAmount
                                        FROM orderitems
                                        JOIN products ON orderitems.productID = products.prodID
                                        JOIN orders ON orderitems.orderID = orders.orderID";

                                // รันคำสั่ง SQL
                                $objQuery = mysqli_query($conn, $sql);

                                // ตรวจสอบว่ามีผลลัพธ์จากคำสั่ง SQL หรือไม่
                                if (mysqli_num_rows($objQuery) > 0) {
                                    // วนลูปเพื่อแสดงผลลัพธ์
                                    while ($row = mysqli_fetch_assoc($objQuery)) {
                                        echo "<tr class='cart-item'>";
                                        echo "<td>" . htmlspecialchars($row["prodName"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["size"]) . "</td>";
                                        echo "<td>฿" . htmlspecialchars($row["price"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["quantity"]) . "</td>";
                                        echo "<td>฿" . htmlspecialchars($row["totalAmount"]) . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>No products in the cart.</td></tr>";
                                }

                                // ปิดการเชื่อมต่อฐานข้อมูล
                                mysqli_close($conn);
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="cart-footer d-flex justify-content-between">
                        <div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continue Shopping</button>
                        </div>
                        <div>
                            <button class="checkout-btn btn btn-primary">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <div class="container mt-5">
        <h2 class="mb-4">Product List</h2>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($product = $result->fetch_assoc()) {
            ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?php echo $product['prodImage']; ?>" class="card-img-top" alt="<?php echo $product['prodName']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['prodName']; ?></h5>
                                <p class="card-text">Price: ฿<?php echo number_format($product['price'], 2); ?></p>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sizeModal" 
                                data-prod-id="<?php echo $product['prodID']; ?>" 
                                data-prod-name="<?php echo $product['prodName']; ?>" 
                                data-price="<?php echo number_format($product['price'], 2); ?>">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No products found.</p>";
            }
            ?>
        </div>
    </div>

    <div class="modal fade" id="sizeModal" tabindex="-1" aria-labelledby="sizeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sizeModalLabel">Select Shoe Size</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="productInfo"></p>
                    <select id="sizeSelect" class="form-select">
                        <option selected disabled>Select size</option>
                        <!-- Sizes will be loaded dynamically via AJAX -->
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="confirmPurchase"data-bs-toggle="modal" data-bs-target="#sizeModal" 
                                data-prod-id="<?php echo $product['prodID']; ?>" 
                                data-prod-name="<?php echo $product['prodName']; ?>" 
                                data-price="<?php echo number_format($product['price']); ?>">Confirm Purchase</button>
                </div>
            </div>
        </div>
    </div>

    <?php $conn->close(); ?>
</body>
</html>