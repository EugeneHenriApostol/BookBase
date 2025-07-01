<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookBase - Digital Library System</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <!-- header section -->
    <header class="header">
        <nav class="nav container">
            <div class="logo">📚 BookBase</div>
            <ul class="nav-menu" id="navMenu">
                <li><a href="#home">Home</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#how-it-works">How It Works</a></li>
                <li><a href="#users">For Users</a></li>
            </ul>
            <div class="nav-buttons">
                <a href="login.php" class="btn btn-secondary">Login</a>
                <a href="signup.php" class="btn btn-primary">Sign Up</a>
            </div>
            <div class="mobile-menu" id="mobileMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>

    <!-- hero section -->
    <section class="hero" id="home">
        <div class="container">
            <h1>Welcome to BookBase</h1>
            <p>Your Digital Library System</p>
            <p>Browse, borrow, and manage books all in one place</p>
            <div class="hero-buttons">
                <a href="signup.php" class="btn btn-primary">Get Started Free</a>
                <a href="#features" class="btn btn-secondary">Learn More</a>
            </div>
        </div>
    </section>

    <section class="features" id="features">
        <div class="container">
            <h2 class="section-title">Everything You Need</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🔍</div>
                    <h3>Smart Search</h3>
                    <p>Find books quickly with our advanced search system. Search by title, author, ISBN, or category.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3>Easy Borrowing</h3>
                    <p>Borrow books with just a few clicks. Track your borrowed books and return dates easily.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3>Track Everything</h3>
                    <p>Keep track of your reading history, borrowed books, and due dates in one dashboard.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <h3>Secure System</h3>
                    <p>Your account and borrowing history are protected with advanced security measures.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📚</div>
                    <h3>Large Collection</h3>
                    <p>Access thousands of books across different categories and subjects for your studies.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⚡</div>
                    <h3>Fast & Simple</h3>
                    <p>User-friendly interface designed for students and librarians. No complicated processes.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="how-it-works" id="how-it-works">
        <div class="container">
            <h2 class="section-title">How It Works</h2>
            <div class="steps-grid">
                <div class="steps-card">
                    <div class="step-number">1</div>
                    <h3>Create Account</h3>
                    <p>Sign up with your email address. It's quick and free!</p>
                </div>
                <div class="steps-card">
                    <div class="step-number">2</div>
                    <h3>Browse Books</h3>
                    <p>Search through our collection of books using our smart search system.</p>
                </div>
                <div class="steps-card">
                    <div class="step-number">2</div>
                    <h3>Borrow Books</h3>
                    <p>Click to borrow available books. Track your borrowed books in your dashboard.</p>
                </div>
                <div class="steps-card">
                    <div class="step-number">3</div>
                    <h3>Return On Time</h3>
                    <p>Return books before due date. Get reminders so you never miss a deadline</p>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/js/index.js"></script>
</body>
</html>