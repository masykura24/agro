<x-app-layout>
    <x-nav />
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-5">{{$page['title']}}</h2>
            <form action="{{$page['action']}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method($page['method'])
                <div class="mb-4">
                    <label for="gambar" class="block text-gray-700">Gambar (opsional):</label>
                    <input type="file" name="gambar" id="gambar" class="w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="mb-4">
                    <label for="nama" class="block text-gray-700">Nama Jasa/Barang:</label>
                    <input type="text" name="nama" id="nama" class="w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label for="harga" class="block text-gray-700">Harga:</label>
                    <input type="number" name="harga" id="harga" class="w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700">Deskripsi:</label>
                    <textarea name="deskripsi" id="deskripsi" class="w-full border-gray-300 rounded-md shadow-sm" rows="4" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="jumlah" class="block text-gray-700">Jumlah:</label>
                    <input type="number" name="jumlah" id="jumlah" class="w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label for="kategori" class="block text-gray-700">Kategori:</label>
                    <select name="kategori" id="kategori" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="jasa">Jasa</option>
                        <option value="sewa">Sewa Barang</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="btn btn-primary">{{$page['button']}}</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
