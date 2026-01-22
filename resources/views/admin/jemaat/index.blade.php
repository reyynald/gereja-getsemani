<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Data Jemaat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar Sederhana -->
        <div class="w-64 min-h-screen bg-indigo-900 text-white p-6">
            <h2 class="text-2xl font-bold mb-8">Admin Gereja</h2>
            <nav>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-indigo-800 bg-indigo-800">Data Jemaat</a>
                <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full text-left py-2.5 px-4 rounded hover:bg-red-700 text-red-200">Logout</button>
                </form>
            </nav>
        </div>

        <!-- Konten Utama -->
        <div class="flex-1 p-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-semibold text-gray-800">Daftar Jemaat</h1>
                <a href="{{ route('admin.jemaat.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow">
                    + Tambah Jemaat
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 shadow-sm" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-gray-600 text-left text-xs uppercase font-semibold tracking-wider">
                            <th class="px-5 py-3">Nama Lengkap</th>
                            <th class="px-5 py-3">TTL</th>
                            <th class="px-5 py-3">Umur</th>
                            <th class="px-5 py-3">Gender</th>
                            <th class="px-5 py-3">Rayon</th>
                            <th class="px-5 py-3">Status</th>
                            <th class="px-5 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse($jemaats as $jemaat)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                            <td class="px-5 py-4 text-sm">
                                <p class="font-medium text-gray-900">{{ $jemaat->nama_lengkap }}</p>
                            </td>
                            <td class="px-5 py-4 text-sm">
                                {{ $jemaat->tempat_lahir }}, 
                                {{ \Carbon\Carbon::parse($jemaat->tanggal_lahir)->translatedFormat('d F Y') }}
                            </td>
                            <td class="px-5 py-4 text-sm">
                                <!-- Menghitung Umur Otomatis -->
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                    {{ \Carbon\Carbon::parse($jemaat->tanggal_lahir)->age }} Thn
                                </span>
                            </td>
                            <td class="px-5 py-4 text-sm">
                                {{ $jemaat->jenis_kelamin }}
                            </td>
                            <td class="px-5 py-4 text-sm">
                                {{ $jemaat->rayon }}
                            </td>
                            <td class="px-5 py-4 text-sm">
                                <span class="px-2 py-1 font-semibold leading-tight {{ $jemaat->status == 'Aktif' ? 'text-green-700 bg-green-100' : 'text-orange-700 bg-orange-100' }} rounded-full text-xs">
                                    {{ $jemaat->status }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-sm text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('admin.jemaat.edit', $jemaat->id) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold">Edit</a>
                                    <form action="{{ route('admin.jemaat.destroy', $jemaat->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-5 py-10 text-center text-gray-500 italic">
                                Belum ada data jemaat.
                            </td>
                        </tr>
                        @endforelse 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>