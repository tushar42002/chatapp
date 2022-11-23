<?php include "header.php"; ?>
<body>

    <div class="wrapper">
        <section class="form signup">
            <header>Realtime chat app</header>
            <form action="#" enctype="multipart/form-data" autocomplete="off">
                <div class="error-txt">This is error text</div>
                <div class="name-details">
                    <div class="field input">
                        <label for="">First name</label>
                        <input type="text" name="fname" placeholder="First name" required>
                    </div>
                    <div class="field input">
                        <label for="">Last name</label>
                        <input type="text" name="lname" placeholder="Last name" required>
                    </div>
                </div>
                <div class="field input">
                    <label for="">email id </label>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label for="">Password </label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label for="">Select image</label>
                    <input type="file" name="image" placeholder="" required>
                </div>
                <div class="field button">
                    <input type="submit" value="continue to chat">
                </div>

            </form>
            <div class="link">Already a user? <a href="login.php">login now</a></div>
        </section>
    </div>


    <script src="js/password.js"></script>
    <script src="js/signup.js"></script>
</body>

</html>