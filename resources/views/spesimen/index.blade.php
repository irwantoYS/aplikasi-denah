<!DOCTYPE html>
<html lang="en">
<head>
    <title>Penerimaan Spesimen</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Letakkan tag link atau style untuk CSS tambahan jika diperlukan -->
</head>
<body>
<x-app-layout>
    <head>
        <title>Data Penerimaan Spesimen</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <div class="w-full mx-auto bg-white p-6 rounded-md shadow-md">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Data Penerimaan Spesimen</h2>

            @if(session('success'))
                <script>alert('Data Berhasil Disimpan')</script>
            @endif

            @if(session('deleted'))
                <script>alert('Data Berhasil Dihapus')</script>
            @endif

            <a href="{{ route('spesimen.create') }}" class="text-sm text-white bg-blue-500 py-2 px-4 rounded-full">Tambah Data</a>
        </div>

        <!-- Tambahkan di atas tabel data -->
        <div class="mb-4 flex justify-between items-center">
            <form action="{{ route('spesimen.index') }}" method="GET" class="flex items-center">
                <input type="text" name="search" placeholder="Cari..." class="border-2 border-primary-20 text-primary-50 text-sm rounded-md focus:ring-primary-70 focus:border-primary-70 p-2.5">
                <button type="submit" class="ml-2 text-sm text-white bg-blue-500 py-2 px-4 rounded-full">Cari</button>
            </form>
        </div>

        @if (count($spesimens) > 0)
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr>
                            <th class="p-2 border-b">Tanggal dan Waktu</th>
                            <th class="p-2 border-b">Asal Pengirim</th>
                            <th class="p-2 border-b">Nama PIC</th>
                            <th class="p-2 border-b">Nomor Telepon PIC</th>
                            <th class="p-2 border-b">Jenis Spesimen</th>
                            <th class="p-2 border-b">Jumlah Spesimen</th>
                            <th class="p-2 border-b">Suhu Spesimen</th>
                            <!-- Tambah kolom untuk tombol aksi -->
                            <th class="p-2 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($spesimens as $spesimen)
                            <tr>
                                <td class="p-2 border-b">{{ $spesimen->datetime }}</td>
                                <td class="p-2 border-b">{{ $spesimen->origin }}</td>
                                <td class="p-2 border-b">{{ $spesimen->pic_name }}</td>
                                <td class="p-2 border-b">{{ $spesimen->pic_phone }}</td>
                                <td class="p-2 border-b">{{ $spesimen->specimen_type }}</td>
                                <td class="p-2 border-b">{{ $spesimen->specimen_quantity }}</td>
                                <td class="p-2 border-b">{{ $spesimen->specimen_temperature }}</td>
                                <!-- Tambah kolom untuk tombol aksi -->
                                <td class="p-2 border-b">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('spesimen.edit', $spesimen->id) }}" class="text-sm text-white bg-yellow-500 py-1 px-2 rounded-full">Edit</a>
                                        <a href="{{ route('spesimen.show', $spesimen->id) }}" class="text-sm text-white bg-green-500 py-1 px-2 rounded-full">Detail</a>
                                        <form action="{{ route('spesimen.destroy', $spesimen->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete('{{ $spesimen->id }}')" class="text-sm text-white bg-red-500 py-1 px-2 rounded-full">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $spesimens->links() }}
            </div>
            
        @else
            <p class="text-sm text-gray-600">Belum ada data penerimaan spesimen.</p>
        @endif
    </div>

    <script>
    function confirmDelete(id) {
        // Tampilkan dialog konfirmasi
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            // Jika pengguna menekan OK, submit form penghapusan
            document.querySelector(`form[action="{{ route('spesimen.destroy', '') }}/${id}"]`).submit();
        }
    }
    </script>

</x-app-layout>
</body>
</html>