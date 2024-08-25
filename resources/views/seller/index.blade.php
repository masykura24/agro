<x-app-layout>
    <x-nav />

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-5">Form Pembuatan Jasa / Sewa Barang</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Nama Jasa/Barang:</label>
                    <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Deskripsi:</label>
                    <textarea name="description" id="description" class="w-full border-gray-300 rounded-md shadow-sm" rows="4" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-gray-700">Harga:</label>
                    <input type="number" name="price" id="price" class="w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label for="days" class="block text-gray-700">Hari:</label>
                    <input type="number" name="days" id="days" class="w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label for="quantity" class="block text-gray-700">Jumlah:</label>
                    <input type="number" name="quantity" id="quantity" class="w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label for="availability" class="block text-gray-700">Ketersediaan:</label>
                    <select name="availability" id="availability" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="available">Tersedia</option>
                        <option value="unavailable">Tidak Tersedia</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-gray-700">Kategori:</label>
                    <select name="category" id="category" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="service">Jasa</option>
                        <option value="rental">Sewa Barang</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-700">Gambar (opsional):</label>
                    <input type="file" name="image" id="image" class="w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Buat Jasa/Sewa</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
