<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Application-1</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link href="frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="frontend/css/style.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                   
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                   
                </div>
            </div>
        </div>
        
    </div>
  
   
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            @foreach($products as $product)
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">Category: {{ $product->catName }}</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img src="/productImage/{{ $product->image }}" alt="{{ $product->name }}" style="max-width: 100%; height: auto;">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">{{ $product->name }}</h5>
                    <div class="marketTrends mt-4">
                        <button class="btn btn-primary custom-width-btn mr-2 view-product" style="background-color:gold" data-product-id="{{ $product->id }}" data-product-description="{{ $product->description }}">View</button>
                        <button class="btn btn-primary custom-width-btn mr-2 cart-product add-to-cart-btn" style="background-color:red" onclick="addToCart({{ $product->id }});">Add to Cart</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
    
    
  
    <footer class="footer">
        <div class="container-fluid bg-secondary text-dark">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    Designed by Vishnu Chandran
                </p>
            </div>
        </div>
    </footer>
    
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .content {
            flex: 1;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
           
            color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>

    
<div class="popup">
    <div class="popup-content">
        <span class="close">&times;</span>
        <div id="product-details">
           
        </div>
    </div>
</div>


<style>
    .custom-width-btn {
        width: 100%; 
    }
</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
       
        var popup = $('.popup');
        var viewButtons = $('.view-product');
        viewButtons.on('click', function() {
            var productId = $(this).data('product-id');
            var description = $(this).data('product-description');
           
            var productDetails = {
                id: productId,
                description: description
            };

            $('#product-details').html(`
                <h3>Product ID: ${productDetails.id}</h3>
                <p>Description: ${productDetails.description}</p>
               
            `);
            popup.show();
        });
        $('.popup .close').on('click', function() {
            popup.hide();
        });
        $(window).on('click', function(event) {
            if (event.target === popup[0]) {
                popup.hide();
            }
        });
    });
</script>
<script>
    function addToCart(productId) {
        event.preventDefault(); 
       
        var userPhoneNumber = prompt('Please enter your phone number:');
        $.ajax({
            url: '/add_cart',
            method: 'POST',
            data: { 
                productId: productId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
               
                 console.log('Product added to cart successfully!');
                sendMessageToWhatsApp(userPhoneNumber);
            },
            error: function(xhr, status, error) {
               
                console.error(error);
                alert('Error occurred while adding product to cart.');
            }
        });
    }
    function sendMessageToWhatsApp(userPhoneNumber) {
       // alert(userPhoneNumber);
        $.ajax({
            url: '/send_msg',
            method: 'GET',
            data: { phone_number: userPhoneNumber },
            success: function(response) {
               // alert('Message sent to WhatsApp successfully!');
                alert('Product added to cart successfully!');
            },
            error: function(xhr, status, error) {
                console.error('Error sending message to WhatsApp:', error);
                alert('Failed to send message to WhatsApp. Please try again later.');
            }
        });
    }
</script>
<style>
    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); 
        z-index: 9999; 
    }
    
    .popup-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        border-radius: 5px;
    }
    
    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }
</style>


   
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="frontend/lib/easing/easing.min.js"></script>
    <script src="frontend/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="frontend/mail/jqBootstrapValidation.min.js"></script>
    <script src="frontend/mail/contact.js"></script>
    <script src="frontend/js/main.js"></script>
</body>

</html>