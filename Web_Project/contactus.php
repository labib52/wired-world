<?php

include("connection.php");

if (isset($_POST['submit'])) {
  $firstname = $_POST ['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];

  $query = "insert into feedback (firstname,lastname,email,subject) values ('$firstname','$lastname','$email','$subject')";

  mysqli_query($conn,$query);

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    #navbar li a.cont {
      color: #eb9e10;
    }
  </style>
</head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contactus</title>
<link rel="stylesheet" href="contactus.css">
<link rel="stylesheet" href="CSS/NavBar.css">
<script src="https://kit.fontawesome.com/3929e16ef5.js" crossorigin="anonymous"></script>
<script src="{% static 'network/functions.js' %}"></script>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
  <section id="header">
    <a class="logo" href="pro.html">Wired World</a>

    <div>
      <ul id="navbar">
        <li><a href="pro.html">Home</a></li>
        <li><a href="products.html">Shop</a></li>
        <li><a href="test.html">Blog</a></li>
        <li><a href="about.html">About</a></li>
        <li><a class="cont" href="contact.html">Contact</a></li>
        <li><a href="wishhlist.html"><i id="heart" class="far fa-heart"></i></a></li>
        <li><a href="cart.html"><i class="material-icons">shop</i></a></li>
      </ul>
    </div>
  </section>
  <section>
    <div class="content">
      <h2> Contact Us</h2>
    </div>
  </section>
  <br>
  <br>
  <br>
  <section>
    <form  method="POST">
        <p style="color: white;">Leave Your Feadback</p>
        <label for="fname">First Name</label>
        <input type="text" id="firstname" name="firstname" placeholder="Your name.."/>
        <label for="lname">Last Name</label>
        <input type="text" id="lastname"  name="lastname" placeholder="Your last name.."/>
        <label for="email">Email</label>
        <input type="text" id="email"  name="email" placeholder="Leave your email to contact you"/>
        <label for="subject">Subject</label>
        <textarea id="subject"  name="subject" placeholder="Write something.." style="height:100px"></textarea>
        <input type="submit" value="submit" name="submit"/>
      </form>
  </section>
  <br>
  <section>
    <div class="layout">
      <h2 style="color:goldenrod; text-align:center"> Frequently asked Questions.. </h2>
      <div class="faq">
        <div class="question">
          <p> IS this online store only or there are any branches?</p>
        </div>
        <div class="answer">
          <p>We are mainly an online stor but there is a valid showroom in Nacr City</p>
        </div>
      </div>
      <div class="faq">
        <div class="question">
          <p> What are the large size equivelent to kgs?</p>
        </div>
        <div class="answer">
          <p> Our sizes: small->60kg to 70kg, Medium->70kg to 85kg, large->85kg to 100kg</p>
        </div>
      </div>
      <div class="faq">
        <div class="question">
          <p>Can you tell us more about your busines?</p>
        </div>
        <div class="answer">
          <p>This is a startup business,made by three friends in collage. We are in computer science faculty and it all
            starts by web development project</p>
        </div>
      </div>
    </div>
  </section>
  <img class="imgg" src="istockphoto-1372134479-170667a.jpg" alt="img">
  <script>
    let answers = document.querySelectorAll(".faq");
    answers.forEach((event) => {
      event.addEventListener("click", () => {
        if (event.classList.contains("active")) {
          event.classList.remove("active");
        } else {
          event.classList.add("active");
        }
      });
    });
  </script>
</body>

</html>