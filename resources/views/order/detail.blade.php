<x-app-layout>
    <x-nav/>
    <div class="container py-5">
        <h2 class="mb-4">Detail Pesanan</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pesanan #{{ $order->id }}</h5>
                <p class="card-text"><strong>Nama Pelanggan:</strong> {{ $order->user->name ?? 'Tidak Diketahui' }}</p>
                <p class="card-text"><strong>Produk:</strong> {{ $order->product->nama ?? 'Tidak Diketahui' }}</p>
                <p class="card-text"><strong>Harga per Hari:</strong> Rp. {{ number_format($order->product->harga, 0, '.', ',') }}</p>
                <p class="card-text"><strong>Tanggal Mulai:</strong> {{ $order->mulai }}</p>
                <p class="card-text"><strong>Tanggal Selesai:</strong> {{ $order->selesai }}</p>
                <p class="card-text"><strong>Lokasi:</strong> {{ $order->lokasi }}</p>
                <p class="card-text"><strong>Nomor Telepon:</strong> {{ $order->telepon }}</p>
                <p class="card-text"><strong>Catatan:</strong> {{ $order->catatan ?? 'Tidak Ada Catatan' }}</p>
                <p class="card-text"><strong>Total:</strong> Rp. {{ number_format($order->total, 0, '.', ',') }}</p>
                <p class="card-text"><strong>Status:</strong> {{ $order->status }}</p>
                <a id="pay-button" class="btn btn-primary">Bayar</a>
                <a href="{{ route('order.index') }}" class="btn btn-primary">Kembali ke Daftar Pesanan</a>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{config('services.midtrans.clientKey')}}"></script>
<script type="text/javascript">
  document.getElementById('pay-button').onclick = function(){
    // SnapToken acquired from previous step
    snap.pay('{{ $order->snap_token }}', {
      // Optional
      onSuccess: function(result){
        // /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        window.location.href = '{{ route('order.index') }}'
      },
      // Optional
      onPending: function(result){
        /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
      },
      // Optional
      onError: function(result){
        /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
      }
    });
  };
</script>
