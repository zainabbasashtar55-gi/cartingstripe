@extends('layouts.app ')

@section('content')
<style>
  @import url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Poppins:wght@300;400;500&display=swap');
        
  ul {
            font-family: "Poppins", sans-serif;
            list-style-type: none;
            display: flex;
            gap: 20px;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 18px;
            margin: 30px 0;
        }

        ul li {
            position: relative;
            cursor: pointer;
            transition: transform 0.3s ease, color 0.3s ease;
            color: #4b4b4b;
        }

        ul li:hover {
            transform: scale(1.1);
            color: #656558;
        }

        ul li::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 0%;
            height: 2px;
            background-color: #656558;
            transition: width 0.3s ease;
        }

        ul li:hover::after {
            width: 100%;
        }
          .collection-title2 {
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            font-weight: 500;
            margin-bottom: 20px;
            color: #393939;
            text-align: center;
            margin-top: 30px;
        }

        .collection-text {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            font-weight: 300;
            line-height: 1.7;
            color: #666;
            max-width: 700px;
            margin: 0 auto;
        }

        .main-footer {
    background-color: #f8f8f8; /* Light gray background */
    padding: 60px 20px 20px;
}

.footer-container {
    display: flex;
    justify-content: space-between;
    max-width: 1200px;
    margin: 0 auto;
    flex-wrap: wrap; /* Allows columns to wrap on smaller screens */
    gap: 30px;
}

.footer-column {
    flex: 1;
    min-width: 200px; /* Prevents columns from getting too narrow */
}

.footer-column h4 {
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 20px;
}

.footer-column p,
.footer-column a {
    font-size: 0.9rem;
    color: #666;
    line-height: 1.6;
    text-decoration: none;
}

.footer-column ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-column ul li {
    margin-bottom: 10px;
}

.footer-column a:hover {
    text-decoration: underline;
}

.social-icons img {
    width: 24px;
    height: 24px;
    margin-right: 15px;
}


</style>


<div class="container my-5 " style="margin-top: 30px">
    <div class="row">
        <div class="col-md-12">
            <div style="position: relative; text-align: center; color: white;">
                <!-- Background Image -->
                <img src="images/background.jpg" 
                     class="img-fluid rounded-5" 
                     style="width: 100%; height: 600px; object-fit: cover; filter: brightness(60%);" 
                     alt="About Us">

                <!-- Text Overlay -->
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                    <h2 style="font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 700;">
                        About Us
                    </h2>
                    <p style="font-family: 'Poppins', sans-serif; font-size: 18px; max-width: 700px; margin: 20px auto; line-height: 1.7;">
                        At Zipper, we believe fashion is more than clothing — it’s a lifestyle.  
                        Our mission is to blend timeless elegance with modern design, ensuring  
                        every piece speaks of quality, sustainability, and sophistication.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

   <div class="container mt-5 mb-5">
        <h2 class="collection-title2">OUR BEST SELLING ARTICLES</h2>
        <div class="row g-4 justify-content-center">
            <!-- Product 1 -->
            <div class="col-md-4">
                <div class="card text-center p-3" style="width: 350px;">
                    <div class="card-header">
                        <img src="images/best1.png" style="height: 300px;" class="img-fluid mb-3" alt="Product 1">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">OVERSIZE BOMBER JACKET</h5>
                        <p class="card-text mb-4">
                          A classic bomber jacket with a modern oversized fit, made from durable nylon with ribbed cuffs and hem.
                        </p>
                      
                    </div>
                </div>
            </div>
            <!-- Product 2 -->
            <div class="col-md-4">
                <div class="card text-center p-3" style="width: 350px;">
                    <div class="card-header">
                        <img src="images/product2.png" style="height: 300px;" class="img-fluid mb-3" alt="Product 2">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">The Knit Polo</h5>
                        <p class="card-text mb-4">
                            A short-sleeved polo shirt crafted from fine cotton or lightweight wool, featuring a soft collar and button.
                        </p>
                      
                    </div>
                </div>
            </div>
            <!-- Product 3 -->
            <div class="col-md-4">
                <div class="card text-center p-3" style="width: 350px;">
                    <div class="card-header">
                    <img src="images/best2.png" style="height: 300px;" class="img-fluid mb-3" alt="Product 3"></div>
                    <div class="card-body">
                    <h5 class="card-title">PILOT LEATHER JACKET</h5>
                        <p class="card-text mb-4">
                           A classic pilot jacket made from premium leather, featuring a zip closure and multiple pockets
                           .
                        </p>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="container my-5 mt-5">
        <div class="row align-items-center mt-4">
            <h1 style="text-align: center;font-family: 'Playfair Display', serif;font-weight: 500;color: #211b13;margin-top: 50px;">OUR BRAND</h1>
            <div class="col-md-6">
               <img src="images/download1.jpg " alt="Winter Collection" class="img-fluid rounded w-75">
            </div>
            <div class="col-md-6">
                <h2 style="font-family: 'Playfair Display', serif; font-size: 36px; font-weight: 600; color: #222;">
                    About Our Brand
                </h2>
                <p style="font-family: 'Poppins', sans-serif; font-size: 18px; font-weight: 300; line-height: 1.7; color: #666;">
                    At Zipper, we believe in timeless elegance and quality craftsmanship. Our collections are designed for those who appreciate classic styles with a modern twist. We are committed to sustainability and ethical practices, ensuring that every piece we create not only looks good but also feels good to wear. Join us on our journey to redefine fashion with integrity and style.
                </p>
                <button class="btn" style="background-color: #211b13; color: white;width: 200px;margin-top: 30px;font-family: 'Roboto', sans-serif;">SHOP COLLECTION</button>
            </div>
        </div>
    </div>

 <footer class="main-footer">
    <div class="footer-container">
        <div class="footer-column company-info">
            <h4>ZIPPER</h4>
            <p>
                Dignissim lacus, turpis ut suspendisse vel tellus. Turpis purus, gravida orci, fringilla a. Ac sed eu fringilla odio mi.
            </p>
            <div class="social-icons">
              <a href="#"><i class="fab fa-twitter" style="font-size: 24px; color: #1DA1F2; margin-right: 15px;"></i></a>
<a href="#"><i class="fab fa-youtube" style="font-size: 24px; color: #FF0000; margin-right: 15px;"></i></a>
<a href="#"><i class="fab fa-instagram" style="font-size: 24px; color: #E1306C; margin-right: 15px;"></i></a>
<a href="#"><i class="fab fa-pinterest" style="font-size: 24px; color: #BD081C; margin-right: 15px;"></i></a>

            </div>
        </div>

        <div class="footer-column">
            <h4>QUICK LINKS</h4>
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="#">ABOUT</a></li>
                <li><a href="#">SERVICES</a></li>
                <li><a href="#">CONTACT</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h4>HELP & INFO</h4>
            <ul>
                <li><a href="#">TRACK YOUR ORDER</a></li>
                <li><a href="#">SHIPPING + DELIVERY</a></li>
                <li><a href="#">CONTACT US</a></li>
                <li><a href="#">FAQS</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h4>CONTACT US</h4>
            <p>
                Do you have any questions or suggestions?
                <a href="mailto:contact@yourcompany.com">contact@yourcompany.com</a>
            </p>
            <p>
                Do you need support? Give us a call.
                <a href="tel:+43720115278">+43 720 11 52 78</a>
            </p>
        </div>
    </div>

    
</footer>

    @endsection
    