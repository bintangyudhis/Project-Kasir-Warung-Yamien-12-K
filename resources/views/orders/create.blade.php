<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Kasir (POS)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-list {
            max-height: 80vh;
            overflow-y: auto;
        }
        .cart-list {
            max-height: 40vh;
            overflow-y: auto;
        }
    </style>
</head>
<body>

    <div class="container-fluid mt-4">

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">

            <div class="col-md-7">
                <h3>Daftar Produk</h3>
                <div class="product-list row">
                    @forelse ($products as $product)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="{{ asset('storage/' . $product->photo) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 150px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">Rp {{ number_format($product->price) }} | Stok: {{ $product->stock_quantity }}</p>

                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm w-100">Tambah ke Keranjang</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-muted">Belum ada produk.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="col-md-5">
                <h3>Keranjang</h3>

                <div class="cart-list">
                    <ul class="list-group">
                        @forelse ($cart as $id => $item)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $item['name'] }}</strong>
                                        <br>
                                        <small>Rp {{ number_format($item['price']) }}</small>
                                    </div>


                                    <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" class="form-control form-control-sm" style="width: 60px;">
                                        <button type="submit" class="btn btn-secondary btn-sm ms-1">Upd</button>
                                    </form>

                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">X</button>
                                    </form>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted">Keranjang masih kosong.</li>
                        @endforelse
                    </ul>
                </div>

                <hr>

                <h4>Total: Rp {{ number_format($totalAmount) }}</h4>

                <hr>

                <h3>Detail Pesanan</h3>
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Nama Customer</label>
                        <input type="text" class="form-control @error('customer_name') is-invalid @enderror"
                               id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required>
                        @error('customer_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="order_date" class="form-label">Tanggal Order</label>
                        <input type="date" class="form-control @error('order_date') is-invalid @enderror"
                               id="order_date" name="order_date" value="{{ old('order_date', date('Y-m-d')) }}" required>
                        @error('order_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="table_id" class="form-label">Pilih Meja (Opsional)</label>
                        <select class="form-select" id="table_id" name="table_id">
                            <option value="">-- Take Away / Tidak Pilih Meja --</option>
                            @foreach ($availableTables as $table)
                                <option value="{{ $table->id ?? '' }}">{{ $table->table_number }} (Kapasitas: {{ $table->capacity }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Metode Bayar</label>
                        <select class="form-select @error('payment_method') is-invalid @enderror"
                                id="payment_method" name="payment_method" required>
                            <option value="cash">Cash</option>
                            <option value="midtrans">Midtrans (Digital)</option>
                        </select>
                        @error('payment_method')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-lg">BUAT PESANAN</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
