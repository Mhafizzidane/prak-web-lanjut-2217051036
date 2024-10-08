<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('assets/images/valo.png') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(3px);
            font-family: 'Times New Roman', serif;
            margin: 0;
        }

        .profile-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.8);     
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1); 
        }

        .profile-image {
            border-radius: 50%;
            border: 2px solid #ccc;
            width: 200px;
            height: 200px;
            background-color: #f0f0f0;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover; 
        }

        .profile-info {
            margin-top: 20px;
            width: 300px;
        }

        .profile-info div {
            background-color: #696969;
            color: #fff; 
            text-align: center;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-container">
            <div class="img-bx">
                <!-- Tampilkan foto user atau gambar default -->
                <img style="width: 10%" src="{{asset('upload/img/'.$user->foto) }}" alt="img">
            </div>

            <div class="profile-info">
                <div>Nama: {{ $user->nama }}</div>
                <div>Kelas: {{ $user->nama_kelas ?? 'Kelas Tidak Ditemukan' }}</div>
                <div>NPM: {{ $user->npm }}</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
