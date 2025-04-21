<?php
require_once 'process.php';

$result = null;
$error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tiktok_url'])) {
    $tiktokUrl = $_POST['tiktok_url'];
    
    if (empty($tiktokUrl)) {
        $error = "Masukkan Link Video Tiktok yang valid";
    } else {
        $apiResponse = fetchTikTokVideo($tiktokUrl);
        
        if ($apiResponse['success']) {
            $result = $apiResponse['data'];
        } else {
            $error = $apiResponse['message'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id" dir="ltr">
<head>
    <meta charset="UTF-8"><meta name="HandheldFriendly" content="True"><meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="home" href="/">
    <link rel="canonical" href="/">
    <meta name="robots" content="all, index, follow, max-image-preview:large">
    <meta name="googlebot-news" content="all, index, follow, max-image-preview:large">
    <link rel="shortcut icon" href="icon.jpg" type="image/png">
    <title>Download Video TikTok HD Tanpa Watermark - AIL TikTok Downloader</title>
    <meta name="title" content="Download Video TikTok HD Tanpa Watermark - AIL TikTok Downloader">
    <meta name="description" content="Download video TikTok HD tanpa Watermark dan convert video TikTok ke audio Mp3. Sekarang kamu dapat mendownload video audio TikTok tanpa batasan dan aplikasi apapun. Cukup copy paste link atau url video TikTok dan download tanpa watermark.">
    <meta name="keywords" content="Download tiktok, Tiktok tanpa watermark, Video tiktok mp3, Tiktok downloader, Tiktok Mp3, Tiktok Mp4">
    <meta name="news_keywords" content="Download tiktok, Tiktok tanpa watermark, Video tiktok mp3, Tiktok downloader, Tiktok Mp3, Tiktok Mp4">
    <link rel="stylesheet" href="https://webtool.seosecret.id/tiktok/public/theme-assets/css/app.css?v1.0.4">
    
    <script defer src="https://unpkg.com/@alpinejs/collapse@3.10.3/dist/cdn.min.js" integrity="sha384-gE382HiLf7oZIQO4e8O4ursZqf9JAjQQgNCRsUyUKfWBMXOiEFm89KxNkJjycgEq" crossorigin="anonymous"></script>
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js" integrity="sha384-WJjkwfwjSA9R8jBkDaVBHc+idGbOa+2W4uq2SOwLCHXyNktpMVINGAD2fCYbUZn6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/toastedjs@0.0.2/dist/toasted.min.css">
    <script defer src="https://unpkg.com/toastedjs@0.0.2/dist/toasted.min.js"
            integrity="sha384-/MVO8JFl9R2K32DQkRu+OOg3layD72sHHL9HBuMtiu2XCGeIYRL+WI3YizSdB3PF"
            crossorigin="anonymous"></script>
    <script defer>
        document.addEventListener('DOMContentLoaded', function () {
            window.toasted = new window.Toasted({
                theme: 'bootstrap',
                position: 'top-center',
                duration: 5000,
            });
            
            <?php if ($error): ?>
            window.toasted.show("<?php echo htmlspecialchars($error); ?>", { type: "error" });
            <?php endif; ?>
        });
    </script>
    <style>
    html{scrollbar-width:thin;}html::-webkit-scrollbar{width:5px;background-color:#F5F5F5;}html::-webkit-scrollbar-thumb{background-color:#0082E6;border-radius:0px;}.element{scrollbar-width:thin;}.element::-webkit-scrollbar{width:5px;background-color:#F5F5F5;}.element::-webkit-scrollbar-thumb{background-color:#0082E6;border-radius:0px;}
    
    .video-container {
        margin: 20px auto;
        max-width: 600px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        padding: 20px;
        text-align: center;
    }
    
    .video-container h3 {
        margin-bottom: 15px;
        color: #333;
    }
    
    .video-container .download-btn {
        display: inline-block;
        background: #0082E6;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        margin: 10px 0;
        transition: background 0.3s;
    }
    
    .video-container .download-btn:hover {
        background: #065FB4;
    }
    
    .video-container .back-btn {
        display: block;
        margin-top: 20px;
        color: #0082E6;
        text-decoration: none;
    }
    </style>
</head>
<body>
    <header x-data="HeaderComponent()" class="header" aria-label="Main Header">
    <div class="logo">
        <a href="/" aria-label="Download Video TikTok HD Tanpa Watermark - AIL TikTok Downloader">
            <img data-sizes="auto" class="lazyload" data-src="https://i.ibb.co/qLswjsbL/logo.png" alt="Download Video TikTok HD Tanpa Watermark" aria-hidden="true" height="40" width="150"/>
        </a>
    </div>
    <div></div>
</header>

    <section class="splash" aria-label="Download TikTok Video Section" x-data="SplashComponent()">
    <div class="container">
        <?php if ($result): ?>
            <div class="video-container">
                <h3><?php echo htmlspecialchars($result['title']); ?></h3>
                <?php if (!empty($result['description'])): ?>
                    <p><?php echo htmlspecialchars($result['description']); ?></p>
                <?php endif; ?>
                
                <a href="<?php echo htmlspecialchars($result['videoUrl']); ?>" class="download-btn" download>
                    Download Video (Tanpa Watermark)
                </a>
                
                <a href="index.php" class="back-btn">Download video lainnya</a>
            </div>
        <?php else: ?>
            <div class="splash-form">
                <h1>Download Video TikTok HD Tanpa Watermark</h1>
                <form method="POST" action="index.php">
                    <div class="splash-search pi">
                        <input name="tiktok_url" type="url" placeholder="Masukkan link video TikTok.."
                               aria-label="Search Tiktok Video" class="splash-search-input pi-end" required>
                        <button type="button" onclick="pasteText()" class="splash-paste-button mi-end" aria-label="Tempel">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="icon mi-end" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10.5 3A1.501 1.501 0 009 4.5h6A1.5 1.5 0 0013.5 3h-3zm-2.693.178A3 3 0 0110.5 1.5h3a3 3 0 012.694 1.678c.497.042.992.092 1.486.15 1.497.173 2.57 1.46 2.57 2.929V19.5a3 3 0 01-3 3H6.75a3 3 0 01-3-3V6.257c0-1.47 1.073-2.756 2.57-2.93.493-.057.989-.107 1.487-.15z" clip-rule="evenodd" />
                            </svg>
                            <span aria-hidden="true">Tempel</span>
                        </button>
                        <button type="submit" class="splash-search-button">
                            <span>Download</span>
                        </button>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </div>
</section>

    <section class="features-section" aria-label="Feature Section">
    <div class="container">
        <h2>Download Konten TikTok dengan Mudah</h2>
        <div class="card">
            <img data-sizes="auto" class="lazyload" data-src="https://webtool.seosecret.id/tiktok/public/theme-assets/images/feature-download.min.webp" alt="Unlimited downloads" height="125px"
                 width="200px" loading="lazy"/>
            <h3>Download Tanpa Batas</h3>
            <p>Simpan video TikTok sebanyak yang Anda butuhkan, tanpa ada batasan.</p>
        </div>
        <div class="card">
            <img data-sizes="auto" class="lazyload" data-src="https://webtool.seosecret.id/tiktok/public/theme-assets/images/feature-vip.min.webp" alt="No Watermark!" height="125px"
                 width="200px"
                 loading="lazy"/>
            <h3>Tanpa Watermark TikTok</h3>
            <p>Download video TikTok tanpa Watermark, itu menghilangkan logo TikTok.</p>
        </div>
        <div class="card">
            <img data-sizes="auto" class="lazyload" data-src="https://webtool.seosecret.id/tiktok/public/theme-assets/images/feature-mp3.min.webp" alt="MP4 and MP3 supported" height="125px"
                 width="200px" loading="lazy"/>
            <h3>Support MP4 dan MP3</h3>
            <p>Simpan video dalam kualitas HD, file MP4, atau konversi ke MP3.</p>
        </div>
    </div>
</section>
    <section class="how-to-section" aria-label="How to Section">
    <div class="container">
        <h2>Simpan Video TikTok tanpa Watermark</h2>
        <p>AIL TikTok Downloader adalah tool gratis yang membantu Anda download video TikTok tanpa Watermark secara online melalui website. Simpan video TikTok dengan kualitas terbaik dalam format file MP4 dengan resolusi HD. Untuk mengetahui cara menggunakan downloader video TikTok, ikuti petunjuk di bawah ini. Prosesnya sederhana - Anda dapat mendownload konten TikTok tanpa Watermark hanya dalam tiga langkah mudah.</p>
        <div class="how-to-card">
            <h3>Cara Download Konten TikTok tanpa Watermark</h3>
            <ol>
                <li class="inset-i-start">
                    <b>Temukan Video</b>
                    <span>Putar video yang ingin Anda simpan, menggunakan aplikasi TikTok atau situs web TikTok.</span>
                </li>
                <li class="inset-i-start">
                    <b>Salin Tautannya</b>
                    <span>Klik Bagikan (tombol panah di atas video yang dipilih), lalu tekan Salin tautan.</span>
                </li>
                <li class="inset-i-start">
                    <b>Download</b>
                    <span>Kembali ke AIL TikTok Downloader dan tempel link yang sudah disalin</span>
                </li>
            </ol>
        </div>
    </div>
</section>

    <footer class="footer">
    <nav class="footer-nav" aria-label="Footer Navigation">
    	<a href="/">Download</a>
    </nav>
    <small>
        <b>Tool ini tidak berafiliasi, disahkan, dipelihara, disponsori, atau didukung oleh TikTok atau anak perusahaannya.</b>
    </small>
    <small>
        <p>Copyright ©2025 - All Rights Reserved.</p>
        <p>Powered by AIL</p>
    </small>
</footer>

    <!--Lazy load-->
    <script src="https://webtool.seosecret.id/tiktok/public/theme-assets/lazysizes.src.js" async></script>
    <script src="https://webtool.seosecret.id/tiktok/public/theme-assets/lazyload.min.js" async></script>
    
    <script>
        function pasteText() {
            if (navigator.clipboard) {
                navigator.clipboard.readText()
                    .then(function(text) {
                        document.querySelector('input[name="tiktok_url"]').value = text;
                    })
                    .catch(function(err) {
                        console.error('Failed to read clipboard:', err);
                    });
            }
        }
        
        function SplashComponent() {
            return {};
        }
        
        function HeaderComponent() {
            return {
                showNav: false,
                toggleNav() {
                    this.showNav = !this.showNav;
                }
            };
        }
    </script>
</body>
</html>