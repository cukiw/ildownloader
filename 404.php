<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #000428, #004e92);
            color: #fff;
            height: 100vh;
            overflow: hidden;
            font-family: 'Segoe UI', sans-serif;
        }
        .stars {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            background: url('https://images.unsplash.com/photo-1534796636912-3b95b3ab5986?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center/cover;
            opacity: 0.3;
            animation: stars-animation 60s linear infinite;
        }
        .error-container {
            background: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
            padding: 3rem;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        .error-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
        }
        @keyframes stars-animation {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        .btn-astronaut {
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
        }
        .btn-astronaut:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
        }
        .btn-astronaut::after {
            content: "\F135";
            font-family: "bootstrap-icons";
            position: absolute;
            right: -20px;
            transition: all 0.3s;
        }
        .btn-astronaut:hover::after {
            right: 15px;
        }
    </style>
</head>
<body>
    <div class="stars"></div>
    <div class="container d-flex justify-content-center align-items-center h-100">
        <div class="error-container text-center">
            <h1 class="display-1 fw-bold mb-4">
                <i class="bi bi-planet"></i> 404
            </h1>
            <p class="fs-3 mb-3">Halaman tidak ditemukan</p>
            <p class="lead mb-4">Sepertinya Anda tersesat di luar angkasa...</p>
            <a href="/" class="btn btn-primary btn-lg btn-astronaut px-4">
                Kembali ke Bumi
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>