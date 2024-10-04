<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/14608486fa.js" crossorigin="anonymous"></script>
    <title>TRAVEL WEBSITE | Contact Page</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar bg-dark">
        <div class="container">
            <h1 class="logo lg-heading">Travel and Tourism</h1>
            <ul class="nav-items">
                <li class="nav-item"><a href="./index.php">Home</a></li>
                <li class="nav-item"><a href="./about.html">About</a></li>
                <li class="nav-item"><a href="./contact.php">Contact</a></li>
            </ul>
        </div>
    </nav>
    
    <section class="contact-form">
        <div class="container">
            <div class="form-wrapper">
                <div class="company-address">
                    <div class="address-group">
                        <i class="fa-solid fa-location-dot text-red fa-3x"></i>
                        <h2 class="text-gray md-heading">Location</h2>
                        <p>Arya Nagar Chhutmalpur</p>
                    </div>
                    <div class="address-group">
                        <i class="fa-solid fa-envelope text-red fa-3x"></i>
                        <h2 class="text-gray md-heading">Email</h2>
                        <p>abhayrohilla@company.com</p>
                    </div>
                    <div class="address-group">
                        <i class="fa-solid fa-phone text-red fa-3x"></i>
                        <h2 class="text-gray md-heading">Call</h2>
                        <p>9917940660</p>
                    </div>
                    <img src="./img/company-img.jpg" alt="company-image">
                </div>
                
                <form method="POST" id="contactForm" class="form">
                    <h1 class="lg-heading text-black">Contact Us</h1>
                    <p class="text-gray">Let us know your questions, suggestions, and concerns by filling out the contact form below.</p>
                    
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" name="phone" id="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" placeholder="Type here"></textarea>
                    </div>
                    <input type="submit" name="submit" id="submit" value="Send Mail" class="form-btn">
                    
                    <p id="msg" style="display:none;color:green;margin-top:15px;text-align:center;font-size:22px;">Mail sent successfully!</p>
                </form>
            </div>
        </div>
    </section>
    
    <footer class="footer">
        <div class="social-media">
            <i class="fa-brands fa-facebook fa-4x"></i>
            <i class="fa-brands fa-twitter fa-4x"></i>
            <i class="fa-brands fa-instagram fa-4x"></i>
        </div>
        <p>World Travel &copy;2023, All rights reserved.</p>
    </footer>

    <script>
        $(document).ready(function() {
            $('#contactForm').on('submit', function(e) {
                e.preventDefault(); // Prevent form submission
                $("#submit").val("Submitting.......");

                var formData = {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    message: $('#message').val()
                };

          
                $.ajax({
                    url: 'mail.php', // URL to send the request to
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Handle success (e.g., show a success message)
                        $("#msg").css("display", "block");
                        $("#submit").val("Send Mail");

                         $('#name').val('');
                         $('#email').val(''),
                         $('#phone').val(''),
                         $('#message').val('');

                        setTimeout(() => {
                            $("#msg").css("display", "none");
                        }, 5000);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle error
                        alert('Error sending mail: ' + textStatus);
                    }
                });
            });

            // Add smooth scrolling to all links
            $("a").on('click', function(event) {
                if (this.hash !== "") {
                    event.preventDefault();

                    var hash = this.hash;
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function() {
                        window.location.hash = hash;
                    });
                }
            });
        });
    </script>
</body>
</html>
