<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AutoCare Pro Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #e63946;
            --secondary-color: #1d3557;
        }
        
        body {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #0d1b2a 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 2rem 0;
        }
        
        .login-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 420px;
            padding: 2.5rem;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .login-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--secondary-color);
        }
        
        .login-header h1 span {
            color: var(--primary-color);
        }
        
        .login-header p {
            color: #6c757d;
            margin-top: 0.5rem;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(230, 57, 70, 0.1);
        }
        
        .input-group-text {
            background: transparent;
            border: 2px solid #e9ecef;
            border-right: none;
            border-radius: 8px 0 0 8px;
        }
        
        .input-group .form-control {
            border-left: none;
            border-radius: 0 8px 8px 0;
        }
        
        .btn-login {
            background: var(--primary-color);
            border: none;
            border-radius: 8px;
            padding: 0.75rem;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
        }
        
        .btn-login:hover {
            background: #c5303c;
            transform: translateY(-2px);
        }
        
        .car-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        .demo-section {
            width: 100%;
        }
        
        .demo-title {
            text-align: center;
            color: #adb5bd;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .demo-title::before, .demo-title::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e9ecef;
        }

        .demo-card {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 12px;
            padding: 0.75rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            border-top: 3px solid var(--primary-color);
        }

        .demo-card:hover {
            background: #fff;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border-color: var(--primary-color);
        }

        .demo-card h6 {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 0.25rem;
            font-size: 0.9rem;
        }

        .demo-card p {
            color: #6c757d;
            margin: 0;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <i class="bi bi-car-front-fill car-icon"></i>
            <h1><span>Auto</span>Care Pro</h1>
            <p>Admin Panel Login</p>
        </div>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first() }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="admin@example.com" value="{{ old('email') }}" required autofocus>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
            </div>
            
            <div class="mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary btn-login">
                <i class="bi bi-box-arrow-in-right me-2"></i> Sign In
            </button>
        </form>
        
        <div class="text-center mt-4">
            <a href="{{ route('landing') }}" class="text-muted text-decoration-none small">
                <i class="bi bi-arrow-left"></i> Back to Website
            </a>
        </div>

        <div class="demo-section mt-4 pt-4 border-top">
            <div class="demo-title">Demo Accounts</div>
            <div class="demo-card" onclick="fillDemo('admin@automotive.com', 'password123')">
                <h6>ADMIN</h6>
                <p>admin@automotive.com</p>
                <p class="text-muted small">password123</p>
            </div>
        </div>
    </div>


    <div class="text-center mt-3 text-white-50 small">
        &copy; {{ date('Y') }} AutoCare Pro Admin By Adhitya Sukma. All rights reserved.
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function fillDemo(email, password) {
            document.querySelector('input[name="email"]').value = email;
            document.querySelector('input[name="password"]').value = password;
            
            // Visual feedback loop
            const card = event.currentTarget;
            const originalBg = card.style.background;
            card.style.background = 'rgba(230, 57, 70, 0.1)';
            setTimeout(() => {
                card.style.background = '#f8f9fa';
            }, 200);
        }
    </script>
</body>
</html>
