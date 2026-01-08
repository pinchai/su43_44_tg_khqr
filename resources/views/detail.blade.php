<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Detail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="SU43.44 – មីកូរ៉េ"/>
    <meta property="og:description" content="Korean noodles are noodles.."/>
    <meta property="og:url" content="{{ url('/product-detail') }}"/>
    <meta property="og:type" content="Website"/>
    <meta property="og:image" content="{{ url('/image/buldak.png') }}"/>

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image"/>
    <meta property="twitter:title" content="SU43.44 – មីកូរ៉េ"/>
    <meta property="twitter:description" content="Korean noodles are noodles.."/>
    <meta property="twitter:image" content="{{ url('/image/buldak.png') }}"/>

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .price {
            font-size: 28px;
            font-weight: bold;
            color: #dc3545;
        }

        .old-price {
            text-decoration: line-through;
            color: #6c757d;
        }

        .rating i {
            color: #f8c146;
        }

        .product-img {
            width: 100%;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <hr>
    <a
        href="https://t.me/share/url?url=https%3A%2F%2F1c019160d3a2.ngrok-free.app%2Fproduct-detail%3Fv%3D2&text=Check%20out%20this%20product!"
        target="_blank"
        class="btn btn-info btn-lg">
        <i class="fab fa-telegram-plane"></i> Share on Telegram
    </a>
    <a
        href="https://www.facebook.com/sharer/sharer.php?u=https://1c019160d3a2.ngrok-free.app/product-detail?v=2"
        target="_blank"
        rel="noopener noreferrer"
        class="btn btn-primary btn-lg"
    >
        <i class="fab fa-facebook-f"></i> Share on Facebook
    </a>

    <hr>

    <div class="row">
        <!-- Product Image -->
        <div class="col-md-5">
            <img src="{{ asset('image/buldak.png') }}"
                 class="product-img"
                 alt="Product Image">
        </div>

        <!-- Product Info -->
        <div class="col-md-7">
            <h2>Wireless Headphones</h2>

            <div class="rating mb-2">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <i class="far fa-star"></i>
                <span class="ml-2">(120 reviews)</span>
            </div>

            <p class="price">
                $89.99
                <span class="old-price ml-2">$129.99</span>
            </p>

            <p>
                High-quality wireless headphones with noise cancellation,
                long battery life, and premium sound clarity.
            </p>

            <!-- Quantity -->
            <div class="form-group w-25">
                <label>Quantity</label>
                <input type="number" class="form-control" value="1" min="1">
            </div>

            <!-- Buttons -->
            <button class="btn btn-primary btn-lg">
                <i class="fas fa-shopping-cart"></i> Add to Cart
            </button>
        </div>
    </div>

    <!-- Description Tabs -->
    <div class="row mt-5">
        <div class="col">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#desc">
                        Description
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#spec">
                        Specifications
                    </a>
                </li>
            </ul>

            <div class="tab-content border p-4">
                <div class="tab-pane fade show active" id="desc">
                    <p>
                        These wireless headphones deliver superior sound quality
                        with deep bass and clear highs. Perfect for work, travel,
                        and entertainment.
                    </p>
                </div>
                <div class="tab-pane fade" id="spec">
                    <ul>
                        <li>Bluetooth 5.0</li>
                        <li>Battery life: 30 hours</li>
                        <li>Noise cancellation</li>
                        <li>Fast charging</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
