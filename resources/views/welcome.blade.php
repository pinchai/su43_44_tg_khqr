<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Home</title>
</head>
<body>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card" style="width: 100%;">
                <img
                    src="{{ asset('image/buldak.webp') }}"
                    class="card-img-top" alt="..."
                >
                <div class="card-body">
                    <a href="{{ route('product_detail') }}">
                        <h5 class="card-title">Buldak</h5>
                        <h5 class="card-title">0.01$</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                    </a>

                    <form
                        method="post"
                        action="{{ url(route('buy_now')) }}"
                    >
                        @csrf
                        <input type="hidden" name="name" value="Buldak">
                        <input type="hidden" name="price" value="0.01">
                        <button type="submit"
                                class="btn btn-primary float-right"
                        >Buy Now
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
