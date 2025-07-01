<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookBase - Login</title>
    <style>
        /* Reset and basic styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Main container */
        .auth-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        /* Logo and header */
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo h1 {
            color: #2c3e50;
            font-size: 28px;
            margin-bottom: 5px;
        }

        .logo p {
            color: #7f8c8d;
            font-size: 14px;
        }

        /* Form styles */
        .auth-form {
            width: 100%;
        }

        .form-title {
            text-align: center;
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #2c3e50;
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e8ed;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
        }

        .form-group input:invalid {
            border-color: #e74c3c;
        }

        /* Remember me checkbox */
        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .checkbox-group input[type="checkbox"] {
            width: auto;
            margin-right: 8px;
        }

        .checkbox-group label {
            margin-bottom: 0;
            font-size: 14px;
            color: #7f8c8d;
        }

        /* Submit button */
        .submit-btn {
            width: 100%;
            background: #667eea;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background: #5a6fd8;
        }

        .submit-btn:active {
            transform: translateY(1px);
        }

        /* Links */
        .auth-links {
            text-align: center;
            margin-top: 25px;
        }

        .auth-links a {
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
        }

        .auth-links a:hover {
            text-decoration: underline;
        }

        .divider {
            margin: 15px 0;
            color: #bdc3c7;
        }

        /* User type selection */
        .user-type {
            margin-bottom: 25px;
        }

        .user-type-options {
            display: flex;
            gap: 10px;
        }

        .user-type-option {
            flex: 1;
            padding: 10px;
            border: 2px solid #e1e8ed;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .user-type-option:hover {
            border-color: #667eea;
        }

        .user-type-option.active {
            border-color: #667eea;
            background: #f8f9ff;
        }

        .user-type-option input[type="radio"] {
            display: none;
        }

        /* Error message */
        .error-message {
            background: #fee;
            color: #e74c3c;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
            display: none;
        }

        /* Success message */
        .success-message {
            background: #efe;
            color: #27ae60;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
            display: none;
        }

        /* Mobile responsive */
        @media (max-width: 480px) {
            .auth-container {
                padding: 30px 20px;
            }
            
            .logo h1 {
                font-size: 24px;
            }
            
            .form-title {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <!-- Logo -->
        <div class="logo">
            <h1>📚 BookBase</h1>
            <p>Digital Library System</p>
        </div>

        <!-- Error/Success Messages -->
        <div class="error-message" id="errorMessage"></div>
        <div class="success-message" id="successMessage"></div>

        <!-- Login Form -->
        <form class="auth-form" id="loginForm">
            <h2 class="form-title">Welcome Back</h2>

            <!-- User Type Selection -->
            <div class="user-type">
                <label>Login as:</label>
                <div class="user-type-options">
                    <div class="user-type-option active" onclick="selectUserType('student')">
                        <input type="radio" name="userType" value="student" checked>
                        <div>👨‍🎓 Student</div>
                    </div>
                    <div class="user-type-option" onclick="selectUserType('admin')">
                        <input type="radio" name="userType" value="admin">
                        <div>👩‍🏫 Admin</div>
                    </div>
                </div>
            </div>

            <!-- Email Field -->
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <!-- Remember Me -->
            <div class="checkbox-group">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Sign In</button>

            <!-- Links -->
            <div class="auth-links">
                <a href="#" onclick="showForgotPassword()">Forgot your password?</a>
                <div class="divider">•</div>
                <a href="register.html">Don't have an account? Sign up</a>
            </div>
        </form>
    </div>

    <script>
        // Select user type function
        function selectUserType(type) {
            // Remove active class from all options
            document.querySelectorAll('.user-type-option').forEach(option => {
                option.classList.remove('active');
            });
            
            // Add active class to selected option
            event.target.closest('.user-type-option').classList.add('active');
            
            // Check the radio button
            document.querySelector(`input[value="${type}"]`).checked = true;
        }

        // Show/hide messages
        function showError(message) {
            const errorDiv = document.getElementById('errorMessage');
            errorDiv.textContent = message;
            errorDiv.style.display = 'block';
            
            // Hide success message
            document.getElementById('successMessage').style.display = 'none';
        }

        function showSuccess(message) {
            const successDiv = document.getElementById('successMessage');
            successDiv.textContent = message;
            successDiv.style.display = 'block';
            
            // Hide error message
            document.getElementById('errorMessage').style.display = 'none';
        }

        function hideMessages() {
            document.getElementById('errorMessage').style.display = 'none';
            document.getElementById('successMessage').style.display = 'none';
        }

        // Forgot password function
        function showForgotPassword() {
            const email = prompt('Enter your email address:');
            if (email) {
                showSuccess('Password reset link sent to ' + email);
            }
        }

        // Handle form submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const userType = document.querySelector('input[name="userType"]:checked').value;
            const remember = document.getElementById('remember').checked;
            
            // Hide previous messages
            hideMessages();
            
            // Basic validation
            if (!email || !password) {
                showError('Please fill in all fields.');
                return;
            }
            
            // Simple email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showError('Please enter a valid email address.');
                return;
            }
            
            // Simulate login process
            console.log('Login attempt:', {
                email: email,
                userType: userType,
                remember: remember
            });
            
            // Show loading state
            const submitBtn = document.querySelector('.submit-btn');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Signing in...';
            submitBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Reset button
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                
                // For demo purposes, show success
                showSuccess('Login successful! Redirecting...');
                
                // In a real app, you would redirect to the dashboard
                setTimeout(() => {
                    if (userType === 'admin') {
                        alert('Redirecting to Admin Dashboard...');
                        // window.location.href = 'admin-dashboard.html';
                    } else {
                        alert('Redirecting to Student Dashboard...');
                        // window.location.href = 'student-dashboard.html';
                    }
                }, 1500);
                
            }, 2000);
        });

        // Clear messages when user starts typing
        document.getElementById('email').addEventListener('input', hideMessages);
        document.getElementById('password').addEventListener('input', hideMessages);
    </script>
</body>
</html>
