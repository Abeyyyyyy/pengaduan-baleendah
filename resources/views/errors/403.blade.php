<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center" style="background-color: #F9F7F7;">
    <div class="text-center px-6">
        <div class="text-8xl mb-6">🚫</div>
        <h1 class="text-4xl font-bold mb-2" style="color: #112D4E;">403</h1>
        <h2 class="text-xl font-semibold mb-4" style="color: #3F72AF;">Akses Ditolak</h2>
        <p class="mb-8 text-sm" style="color: #3F72AF;">
            Kamu tidak memiliki izin untuk mengakses halaman ini.
        </p>
        <a href="{{ url()->previous() ?: '/' }}"
            class="inline-block px-6 py-3 rounded-xl text-white font-medium transition hover:opacity-90"
            style="background-color: #3F72AF;">
            ← Kembali ke Dashboard
        </a>
    </div>
</body>
</html>