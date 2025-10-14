@extends('layouts.app')
@section('content')
    <style>
         
       
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
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f8f8;
        }

            /* ul {
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
            } */
        .container-fluid {
           

margin-top: 30px;
          
        }
        
        .contact-form-column {
            flex: 1;
            padding: 5rem 4rem;
            margin-top: 0px;
        }

        .contact-image-column {
            flex: 1;
            background-image: url('https://placehold.co/1920x1080/e9ecef/212529?text=Contact+Image');
            background-size: cover;
            background-position: center;
        }

        .contact-form-column h1 {
            font-size: 2.5rem;
            font-weight: 600;
        }

        .contact-form-column p {
            color: #6c757d;
        }
        
        .contact-details {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .contact-item {
            flex: 1;
            min-width: 150px;
            margin-bottom: 1rem;
        }

        .contact-item h5 {
            font-size: 0.9rem;
            text-transform: uppercase;
            color: #212529;
            font-weight: bold;
        }

        .contact-item p {
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        .form-control {
            border-radius: 0;
            border-top: none;
            border-left: none;
            border-right: none;
            border-bottom: 1px solid #ccc;
            padding: 1rem 0.75rem;
            margin-bottom: 1.5rem;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #000;
        }

        .btn-send {
            background-color: #ffc107;
            color: #212529;
            border: none;
            padding: 1rem 2.5rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .btn-send:hover {
            background-color: #e0a800;
        }

        /* Mobile adjustments */
        @media (max-width: 992px) {
            .contact-container {
                flex-direction: column;
            }
            .contact-image-column {
                display: none; /* Hide the image column on smaller screens */
            }
        }
    </style>


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

   

    <!-- Contact Section -->
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-6">
        <div class="contact-form-column">
            <h1>Contact us</h1>
            <p>We're open for any suggestion or just to have a chat</p>
            
            <div class="contact-details">
                <div class="contact-item">
                    <h5>ADDRESS</h5>
                    <p>198 West 21th<br>Street, Suite 721<br>New York NY 10016</p>
                </div>
                <div class="contact-item">
                    <h5>EMAIL</h5>
                    <p>info@yoursite.com</p>
                </div>
                <div class="contact-item">
                    <h5>PHONE</h5>
                    <p>+ 1235 2355 98</p>
                </div>
            </div>
<form action="{{ route('send-email') }}" method="POST">
    @csrf
    <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="Name" required>
    </div>
    <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Email" required>
    </div>
    <div class="form-group">
        <input type="text" name="subject" class="form-control" placeholder="Subject" required>
    </div>
    <div class="form-group">
        <textarea name="message" class="form-control" rows="5" placeholder="Create a message here" required></textarea>
    </div>
    <button type="submit" class="btn btn-send">Send Message</button>
</form>

        </div>
            </div>
            <div class="col-md-6" style="mt">
        <div class="rounded-5 ">
            <img src="images/about.jpg" style="height:75%;width: 100%;opacity: ;" class="rounded-5" alt="">
        </div>
    </div>

        </div>
    </div>
    <!-- Bootstrap JS (optional, but good practice for components like togglers) -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

@endsection