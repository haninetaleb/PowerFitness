<?php
session_start();

if (!isset($_SESSION['isAdmin']) || !$_SESSION['isAdmin']) {
    header("Location: login.html");
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="Assets/logo 2 (1).png" />
    <link rel="stylesheet" href="adminindex.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <title>Admin Panel</title>
</head>
<body>
    <nav>
      <div class="nav__logo">
        <a href="home.html"><img src="Assets/logo 2 (1).png" alt="logo" /></a>
      </div>
      <ul class="nav__links">
        <li class="link"><a href="home.html">Home</a></li>
        <li class="link"><a href="res.html">Reservation</a></li>
        <li class="link"><a href="products.html">Store</a></li>
        <li class="link"><a href="community.html">Community</a></li>
      </ul>
    </nav>
    <div class="sidebar">
      <div class="user">
        <img
          src="Assets/pissou.jpg"
          alt="user pfp"
          class="user__img"
          id="btn"
        />
        <div class="user__info">
          <p class="user__name">admin@gmail.com</p>
          <p class="user__status">Admin</p>
        </div>
      </div>
    </div>
    <script>
        let btn = document.querySelector('#btn')
        let sidebar = document.querySelector('.sidebar')
<<<<<<< HEAD
=======

        btn.onclick = function() {
        sidebar.classList.toggle('active');
        } 
    </script>
>>>>>>> 222bb12835d4240b6318d44b3a683750b104087b

        btn.onclick = function() {
        sidebar.classList.toggle('active');
        } 
    </script>

  <header class="header_container">
    <h1>Welcome to the Admin Panel</h1>
    <p>Here you can manage members and products:</p>
  </header>
    <div class="container">
        <div class="form__container">
            <h2>Add Member</h2>
            <form action="add_member.php" method="POST">
                <label for="FullName">Full Name:</label>
                <input type="text" id="FullName" name="FullName" required>
                <label for="Email">Email:</label>
                <input type="email" id="Email" name="Email" required>
                <label for="Phone">Phone number:</label>
                <input type="number" class="input" name="Phone" placeholder="Phone Number" required/>
                <label for="Date">Birth date:</label>
                <input type="date" class="input" name="BirthDate" placeholder="Birth date" required/>
                <button type="submit">Add Member</button>
            </form>
        </div>

        <div class="form__container">
            <h2>Delete Member</h2>
            <form action="delete_member.php" method="POST">
                <label for="MemberID">Member ID:</label>
                <input type="number" id="MemberID" name="MemberID" required>
                <button type="submit">Delete Member</button>
            </form>
        </div>

        <div class="form__container">
            <h2>Add Product</h2>
            <form action="add_product.php" method="post" enctype="multipart/form-data">
                <label for="ProductName">Product Name:</label>
                <input type="text" id="Product_name" name="Product_name" required>
                <label for="ProductDescription">Product Description:</label>
                <input type="text" id="Product_description" name="Product_description" required>
                <label for="ProductPrice">Product Price:</label>
                <input type="text" id="Price" name="Price" required>
                <label for="ProductImage">Product Image:</label>
                <input type="file" id="Product_image" name="Product_image" accept="image/*" required>
                <button type="submit">Add Product</button>
            </form>
        </div>

        <div class="form__container">
            <h2>Delete Product</h2>
            <form action="delete_product.php" method="post">
                <label for="ProductRef">Product Ref:</label>
                <input type="text" id="Product_ref" name="Product_ref" required>
                <button type="submit">Delete Product</button>
            </form>
        </div>
    </div>
   
</body>
</html>
