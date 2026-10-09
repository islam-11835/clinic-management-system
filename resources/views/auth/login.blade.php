<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Şifa Hastane Portalı - Giriş</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* حركة نبض القلب (Pulse Animation) */
        @keyframes heartPulse {
            0% {
                transform: scale(1);
            }
            14% {
                transform: scale(1.25);
            }
            28% {
                transform: scale(1);
            }
            42% {
                transform: scale(1.25);
            }
            70% {
                transform: scale(1);
            }
        }

        .pulsing-heart {
            display: inline-block;
            font-size: 3.8rem;
            color: #e63946;
            animation: heartPulse 1.5s infinite ease-in-out;
            filter: drop-shadow(0 0 12px rgba(230, 57, 70, 0.5));
        }

        body {
            background: linear-gradient(135deg, #e8f5e9 0%, #e0f2f1 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
        }

        .login-wrapper {
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(15px);
            border-radius: 30px;
            padding: 25px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
            border: 1px solid rgba(255, 255, 255, 0.6);
            max-width: 900px;
            width: 90%;
        }

        .main-card {
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        .brand-section {
            background: linear-gradient(180deg, #b2dfdb 0%, #80cbc4 100%);
            padding: 40px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .form-section {
            padding: 40px;
            background: #f7faf9;
        }

        .custom-input {
            width: 100%;
            padding: 12px 15px;
            border-radius: 12px;
            border: 1px solid #cfd8dc;
            margin-top: 5px;
        }

        .custom-input:focus {
            outline: none;
            border-color: #26a69a;
            box-shadow: 0 0 0 4px rgba(38, 166, 154, 0.15);
        }

        .btn-login {
            background: linear-gradient(90deg, #26a69a 0%, #00897b 100%);
            border: none;
            color: white;
            padding: 12px;
            border-radius: 12px;
            font-weight: 600;
            width: 100%;
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <div class="main-card row g-0">
            
            <!-- القسم الأيسر: الهوية البصرية مع عنصر القلب ينبض -->
            <div class="col-md-6 brand-section">
                <div class="mb-3">
                    <div class="pulsing-heart">❤️</div>
                </div>
                <h2 class="fw-bold text-dark mb-2">Şifa Hastane Portalı</h2>
                <p class="text-muted small mb-0">Tam Entegre Hastane Yönetim Sistemi</p>
            </div>

            <!-- القسم الأيمن: نموذج تسجيل الدخول -->
            <div class="col-md-6 form-section">
                <div class="text-center mb-4">
                    <i class="fa-solid fa-user-doctor fa-2x mb-2" style="color: #26a69a;"></i>
                    <h4 class="fw-bold">Personel Girişi</h4>
                    <p class="text-muted small">Lütfen bilgilerinizi giriniz</p>
                </div>

                <!-- رسائل الأخطاء -->
                @if($errors->any())
                    <div class="alert alert-danger p-2 small">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="small fw-bold text-muted">E-Posta Adresi</label>
                        <input type="email" name="email" class="custom-input" placeholder="ornek@sifahastanesi.com" value="{{ old('email') }}" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label class="small fw-bold text-muted">Parola</label>
                        <input type="password" name="password" class="custom-input" placeholder="••••••••" required>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label small" for="remember">Beni Hatırla</label>
                        </div>
                    </div>

                    <button type="submit" class="btn-login">Giriş Yap</button>
                    <div class="text-center mt-3">
    <p class="small text-muted mb-0">Hesabınız yok mu? 
        <a href="{{ route('register') }}" class="fw-bold text-decoration-none" style="color: #00897b;">Kayıt Ol</a>
    </p>
</div>
                </form>

            </div>

        </div>
    </div>

</body>
</html>