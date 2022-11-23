<?php include "header.php"; ?>

<body>

    <div class="wrapper">
        <section class="form login">
            <header>Realtime chat app</header>
            <form action="#">
                <div class="error-txt">This is error text</div>
                <div class="field input">
                    <label for="">email id </label>
                    <input type="email" name="email" placeholder="Enter your email">
                </div>
                <div class="field input">
                    <label for="">Password </label>
                    <input type="password" name="password" placeholder="Enter your password">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="continue to chat">
                </div>

            </form>
            <div class="link">Not a user yet? <a href="index.php">signup now</a></div>
        </section>
    </div>

    <script src="js/password.js"></script>
    <script src="js/login.js"></script>
</body>

</html>