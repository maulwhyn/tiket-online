
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaksi Tiket</title>
    <link href="{{ asset('client-template/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client-template/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        

        .menu-item {
        padding: 20px;
        border-radius: 10px;
        border: #352c2c solid 0.2px ; 
        margin-top: 100px;
        margin-bottom: 20px;
        box-shadow: 0px 10px 10px 0.2px rgba(0.0.0,.10);
        }

        .menu-item .menu-img {
        border-radius: 10px;
        margin-bottom: 10px;
        }

    </style>
</head>
<body>
    <div class="container" >
        <div class="row">
            <div class="col-xl-12 col-md-12 align-self-center">
                <div class="menu-item">
                    <h3>{{ $tiket->title }}</h3>
                    <hr class="bg-secondary">
                    <div class="row">
                    <div class="col-md-6 d-flex mb-2">
                        <img src="{{ asset('storage/'.$tiket->image) }}" alt="" width="450px" height="250px">
                    </div>
                    <div class="col-md-6 ">
                        <h5 class="mb-2"><strong>Description</strong></h5>
                        <p>{!! $tiket->content !!}</p>
                        <h6 class="mt-2 me-2">Rp. <strong>@money($tiket->harga)</strong><h6>
                            <form action="{{ route('client.transaksi') }}" method="post">
                                @csrf
                            <input type="hidden" name="slug" value="{{ $tiket->slug }}">
                            <input type="hidden" name="tiket_id" value="{{ $tiket->id }}">
                            <div class="col-md-12 mb-2 mt-4">
                                <input type="number" name="jumlah" id="jumlah" class="form-control col-md-6" placeholder="jumlah tiket :">
                                <input type="number" id="amount" name="amount" class="form-control mt-2 col-md-6" placeholder="total" value="" disabled readonly>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-sm btn-primary px-4" onclick="contoh()">Checkout</button>
                                <a href="{{ route('home') }}" class=" btn-sm btn btn-danger px-4 ms-2">kembali</a>
                            </div>
                            </form>
                    </div>
                    </div>
                </div><!-- Menu Item -->
            </div><!-- End Service Item -->
        </div>
    </div>

      <script>

        const qtyInput = document.getElementById('jumlah');
        const hargaInput = document.getElementById('amount');
        const total = document.getElementById('total');
        qtyInput.addEventListener('input', () => {
            const harga = {{ $tiket->harga }};
            const qty =qtyInput.value;
            hargaInput.value = harga * qty;
            console.log(harga);
        });
        </script>
      <script src="{{ asset('client-template/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('client-template/js/swiper-bundle.min.js') }}"></script>

      <script type="text/javascript">
        function contoh() {
           swal({
                title: "Berhasil!",
                text: "Tiket berhasil dipesan",
                icon: "success",
                button: true

            });

        }

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>