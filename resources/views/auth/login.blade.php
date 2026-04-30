@extends('layouts.app')

@section('content')
<div class="auth-section">
    <div class="auth-background">
        <div class="bg-shape shape-1"></div>
        <div class="bg-shape shape-2"></div>
        <div class="bg-shape shape-3"></div>
    </div>
    
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <div class="auth-logo">
                    <div class="logo-box">BK</div>
                </div>
                <h2>Welcome Back</h2>
                <p>Enter your credentials to access the admin portal</p>
            </div>
            
            <form action="{{ route('admin.dashboard') }}" class="auth-form" id="loginForm">
                @csrf
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-wrapper {{ $errors->has('email') ? 'has-error' : '' }}">
                        <i data-lucide="mail"></i>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="admin@bandoskomar.org" required>
                    </div>
                    @error('email')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper {{ $errors->has('password') ? 'has-error' : '' }}">
                        <i data-lucide="lock"></i>
                        <input type="password" id="password" name="password" placeholder="••••••••" required>
                        <button type="button" class="toggle-password" id="togglePassword">
                            <i data-lucide="eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox">
                        <span>Remember me</span>
                    </label>
                    <a href="#" class="forgot-password">Forgot password?</a>
                </div>
                
                <button type="submit" class="btn-auth-submit">
                    <span>Sign In</span>
                    <i data-lucide="arrow-right"></i>
                </button>
            </form>
            
            <div class="auth-support-msg" style="margin-top: 2rem; text-align: center; color: #64748b; font-size: 0.85rem;">
                <p>Protected administrative area. <br> Contact the system administrator for access.</p>
            </div>
        </div>
    </div>
</div>

<style>
    .auth-section {
        position: relative;
        height: calc(100vh - 80px); /* Strict height to prevent scroll */
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        background: #0b1120; /* Slightly darker */
        padding: 20px;
    }

    .auth-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }

    .bg-shape {
        position: absolute;
        border-radius: 50%;
        filter: blur(100px);
        opacity: 0.1;
    }

    .shape-1 {
        width: 500px;
        height: 500px;
        background: #f68b1e;
        top: -100px;
        right: -100px;
    }

    .shape-2 {
        width: 400px;
        height: 400px;
        background: #2563eb;
        bottom: -50px;
        left: -50px;
    }

    .shape-3 {
        width: 300px;
        height: 300px;
        background: #9333ea;
        top: 40%;
        left: 20%;
    }

    .auth-container {
        position: relative;
        z-index: 10;
        width: 100%;
        max-width: 480px;
        animation: fadeInDown 0.8s ease-out;
    }

    .auth-card {
        background: rgba(30, 41, 59, 0.5);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        padding: 32px;
        border-radius: 28px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        width: 100%;
    }

    .auth-header {
        text-align: center;
        margin-bottom: 28px;
    }

    .auth-logo {
        margin-bottom: 16px;
        display: flex;
        justify-content: center;
    }

    .logo-box {
        width: 52px;
        height: 52px;
        background: #f68b1e;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 900;
        font-size: 1.4rem;
        box-shadow: 0 8px 16px rgba(246, 139, 30, 0.3);
    }

    .auth-header h2 {
        color: white;
        font-size: 1.6rem;
        font-weight: 800;
        margin-bottom: 6px;
    }

    .auth-header p {
        color: #94a3b8;
        font-size: 0.9rem;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        margin-bottom: 6px;
        color: #cbd5e1;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        background: rgba(15, 23, 42, 0.4);
        border: 1.5px solid rgba(255, 255, 255, 0.08);
        border-radius: 12px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
    }

    .input-wrapper:focus-within {
        border-color: #f68b1e;
        background: rgba(15, 23, 42, 0.7);
        box-shadow: 0 0 0 4px rgba(246, 139, 30, 0.15);
    }

    .input-wrapper i:not(.toggle-password i) {
        position: absolute;
        left: 14px;
        width: 18px;
        height: 18px;
        color: #475569; /* More professional slate */
        stroke-width: 2.5px; /* Thicker stroke for better visibility */
        transition: color 0.3s;
        pointer-events: none;
        z-index: 5;
    }

    .input-wrapper:focus-within i:not(.toggle-password i) {
        color: #f68b1e;
    }

    .input-wrapper input {
        width: 100%;
        padding: 12px 14px 12px 44px;
        background: transparent;
        border: none;
        color: white;
        font-size: 0.95rem;
        outline: none;
        z-index: 1;
    }

    .toggle-password {
        position: absolute;
        right: 16px;
        background: none;
        border: none;
        color: #64748b;
        cursor: pointer;
        padding: 4px;
        display: flex;
        align-items: center;
        transition: color 0.3s;
        z-index: 10;
    }

    .toggle-password:hover {
        color: white;
    }

    .form-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        font-size: 0.875rem;
    }

    .remember-me {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #94a3b8;
        cursor: pointer;
    }

    .remember-me input {
        accent-color: #f68b1e;
        width: 16px;
        height: 16px;
    }

    .forgot-password {
        color: #f68b1e;
        text-decoration: none;
        font-weight: 600;
    }

    .forgot-password:hover {
        text-decoration: underline;
    }

    .btn-auth-submit {
        width: 100%;
        padding: 14px;
        background: #f68b1e;
        border: none;
        border-radius: 14px;
        color: white;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: all 0.3s;
    }

    .btn-auth-submit:hover {
        background: #ea580c;
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(246, 139, 30, 0.4);
    }

    .auth-divider {
        margin: 24px 0;
        position: relative;
        text-align: center;
    }

    .auth-divider::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        height: 1px;
        background: rgba(255, 255, 255, 0.05);
        z-index: 1;
    }

    .auth-divider span {
        position: relative;
        z-index: 2;
        background: #1e293b;
        padding: 0 12px;
        color: #64748b;
        font-size: 0.813rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .social-auth {
        display: flex;
        gap: 12px;
        margin-bottom: 24px;
    }

    .btn-social {
        flex: 1;
        padding: 12px;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 12px;
        color: #e2e8f0;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-social:hover {
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(255, 255, 255, 0.1);
        transform: translateY(-1px);
    }

    .auth-footer {
        text-align: center;
        color: #94a3b8;
        font-size: 0.9rem;
    }

    .auth-footer a {
        color: #f68b1e;
        text-decoration: none;
        font-weight: 700;
    }

    .auth-footer a:hover {
        text-decoration: underline;
    }

    .input-wrapper.has-error input {
        border-color: #ef4444;
        background: rgba(239, 68, 68, 0.05);
    }

    .input-wrapper.has-error i {
        color: #ef4444;
    }

    .error-text {
        display: block;
        margin-top: 6px;
        color: #f87171;
        font-size: 0.75rem;
        font-weight: 500;
        animation: shake 0.4s ease-in-out;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 480px) {
        .auth-card {
            padding: 24px;
        }
    }
</style>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        
        togglePassword.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            const icon = togglePassword.querySelector('i');
            if (type === 'text') {
                icon.setAttribute('data-lucide', 'eye-off');
            } else {
                icon.setAttribute('data-lucide', 'eye');
            }
            lucide.createIcons();
        });

        // Form Validation UI Demo
        const loginForm = document.getElementById('loginForm');
        loginForm.addEventListener('submit', (e) => {
            // e.preventDefault(); // Uncomment to stop actual submission for testing
            const btn = loginForm.querySelector('.btn-auth-submit');
            btn.innerHTML = '<i data-lucide="loader-2" class="animate-spin"></i> Processing...';
            lucide.createIcons();
        });
    });
</script>
@endsection
@endsection
