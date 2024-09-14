<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <!-- Link to your custom CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light custom-bg">
    <div class="card shadow p-4" style="width: 24rem;">
        <form action="{{ route('user.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama :</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama">
            </div>
            <div class="mb-3">
                <label for="npm" class="form-label">NPM :</label>
                <input type="text" name="npm" class="form-control" placeholder="NPM">
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas :</label>
                <input type="text" name="kelas" class="form-control" placeholder="Kelas">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
