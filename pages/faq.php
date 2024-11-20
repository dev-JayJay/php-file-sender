<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Component</title>
    <!-- <link rel="stylesheet" href="<?php echo BASE_URL; ?>/styles/faq.css"> -->
    <link rel="stylesheet" href="..//styles/faq.css">
    <?php 
        // session_start(); 
        // include_once '../config.php';

        // if (isset($_POST['log_out'])) {
        //     session_unset(); 
        //     session_destory(); 
        //     header("Location: login.php");
        //     exit();
        // }
    ?>
</head>
<body>
    <header class="header_container">
        <div class="wrapper">
            <span>UserName</span>
            <ul>
                <li><a href="<?php BASE_URL ?>/pages/dashboard.php">Home</a></li>
                <li><a href="<?php BASE_URL ?>/pages/file.php">File</a></li>
                <li><a href="<?php BASE_URL ?>/pages/faq.php">Faq</a></li>
                <li><a href="<?php BASE_URL ?>/pages/settings.php">Settings</a></li>
            </ul>
            <form method="post">
                <button name="log_out">log out</button>
            </form>
        </div>
    </header>
    <div class="faq-container">
        <div class="faq-item">
            <div class="faq-question">
                What is your return policy?
            </div>
            <div class="faq-answer">
                We offer a 30-day return policy on all items. Please ensure the product is in its original condition.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                How do I track my order?
            </div>
            <div class="faq-answer">
                You can track your order using the tracking number provided in the confirmation email. Visit our tracking page to see updates.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                Do you ship internationally?
            </div>
            <div class="faq-answer">
                Yes, we offer international shipping to most countries. Shipping fees vary depending on the destination.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                How can I contact customer support?
            </div>
            <div class="faq-answer">
                You can contact our customer support team through the contact form on our website or by emailing support@ourwebsite.com.
            </div>
        </div>
    </div>
    <footer>
        <p>all right reserved @ daha</p>
    </footer>
    <script>
        // Get all FAQ items
        const faqItems = document.querySelectorAll('.faq-item');
    
        // Loop through each FAQ item and add a click event listener
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            question.addEventListener('click', () => {
                // Toggle the 'active' class on the clicked FAQ item
                item.classList.toggle('active');
            });
        });
    </script>
    

</body>
</html>
