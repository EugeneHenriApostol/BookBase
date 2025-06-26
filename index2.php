<?php
//index.php

session_start();

include "connection.php";
include "functions.php";

if (isset($_SESSION["user_id"])) {
    header("Location: dashboard.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookBase - Digital Library System</title>
    <style>
        /* Reset and basic styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        .header {
            background: #2c3e50;
            color: white;
            padding: 1rem 0;    
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .nav-menu a:hover {
            background-color: #34495e;
        }

        .nav-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: #667eea;
            color: white;
        }

        .btn-primary:hover {
            background: #5a6fd8;
        }

        .btn-secondary {
            background: transparent;
            color: white;
            border: 1px solid white;
        }

        .btn-secondary:hover {
            background: white;
            color: #2c3e50;
        }

        /* Mobile menu */
        .mobile-menu {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .mobile-menu span {
            width: 25px;
            height: 3px;
            background: white;
            margin: 3px 0;
            transition: 0.3s;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 120px 0 80px;
            text-align: center;
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .hero-buttons {
            margin-top: 30px;
        }

        .hero .btn {
            padding: 15px 30px;
            font-size: 18px;
            margin: 10px;
        }

        /* Features Section */
        .features {
            padding: 80px 0;
            background: #f8f9fa;
        }

        .section-title {
            text-align: center;
            font-size: 36px;
            margin-bottom: 50px;
            color: #2c3e50;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .feature-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 60px;
            margin-bottom: 20px;
        }

        .feature-card h3 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #2c3e50;
        }

        .feature-card p {
            color: #666;
            line-height: 1.6;
        }

        /* How it Works Section */
        .how-it-works {
            padding: 80px 0;
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-top: 50px;
        }

        .step-card {
            text-align: center;
            padding: 20px;
        }

        .step-number {
            width: 60px;
            height: 60px;
            background: #667eea;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
            margin: 0 auto 20px;
        }

        .step-card h3 {
            font-size: 20px;
            margin-bottom: 15px;
            color: #2c3e50;
        }

        .step-card p {
            color: #666;
        }

        /* Stats Section */
        .stats {
            background: #2c3e50;
            color: white;
            padding: 60px 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            text-align: center;
        }

        .stat-item h3 {
            font-size: 48px;
            color: #667eea;
            margin-bottom: 10px;
        }

        .stat-item p {
            font-size: 18px;
            opacity: 0.9;
        }

        /* User Types Section */
        .user-types {
            padding: 80px 0;
            background: #f8f9fa;
        }

        .user-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 40px;
            margin-top: 50px;
        }

        .user-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .user-header {
            padding: 30px;
            text-align: center;
            color: white;
        }

        .user-header.student {
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .user-header.admin {
            background: linear-gradient(135deg, #f093fb, #f5576c);
        }

        .user-header h3 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .user-header p {
            opacity: 0.9;
        }

        .user-features {
            padding: 30px;
        }

        .user-features ul {
            list-style: none;
        }

        .user-features li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            color: #555;
        }

        .user-features li:before {
            content: "✓";
            color: #27ae60;
            font-weight: bold;
            margin-right: 10px;
        }

        .user-features li:last-child {
            border-bottom: none;
        }

        /* CTA Section */
        .cta {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
        }

        .cta h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .cta p {
            font-size: 18px;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .cta .btn {
            padding: 15px 30px;
            font-size: 18px;
            margin: 10px;
        }

        .cta .btn-secondary {
            background: white;
            color: #667eea;
        }

        .cta .btn-secondary:hover {
            background: #f8f9ff;
        }

        /* Footer */
        .footer {
            background: #2c3e50;
            color: white;
            padding: 40px 0 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 30px;
        }

        .footer-section h3 {
            margin-bottom: 20px;
            color: #667eea;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer-section ul li a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section ul li a:hover {
            color: white;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #34495e;
            color: #bdc3c7;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: #2c3e50;
                flex-direction: column;
                padding: 20px 0;
            }

            .nav-menu.active {
                display: flex;
            }

            .mobile-menu {
                display: flex;
            }

            .nav-buttons {
                display: none;
            }

            .hero h1 {
                font-size: 36px;
            }

            .hero p {
                font-size: 18px;
            }

            .section-title {
                font-size: 28px;
            }

            .user-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 28px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .steps-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
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
                <a href="login.html" class="btn btn-secondary">Login</a>
                <a href="register.html" class="btn btn-primary">Sign Up</a>
            </div>
            <div class="mobile-menu" id="mobileMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <h1>Welcome to BookBase</h1>
            <p>Your Digital Library System</p>
            <p>Browse, borrow, and manage books all in one place</p>
            <div class="hero-buttons">
                <a href="register.html" class="btn btn-primary">Get Started Free</a>
                <a href="#features" class="btn btn-secondary">Learn More</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
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

    <!-- How It Works Section -->
    <section class="how-it-works" id="how-it-works">
        <div class="container">
            <h2 class="section-title">How It Works</h2>
            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h3>Create Account</h3>
                    <p>Sign up with your student ID and email address. It's quick and free!</p>
                </div>
                <div class="step-card">
                    <div class="step-number">2</div>
                    <h3>Browse Books</h3>
                    <p>Search through our collection of books using our smart search system.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">3</div>
                    <h3>Borrow Books</h3>
                    <p>Click to borrow available books. Track your borrowed books in your dashboard.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">4</div>
                    <h3>Return On Time</h3>
                    <p>Return books before the due date. Get reminders so you never miss a deadline.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <h3 id="booksCount">0</h3>
                    <p>Books Available</p>
                </div>
                <div class="stat-item">
                    <h3 id="studentsCount">0</h3>
                    <p>Active Students</p>
                </div>
                <div class="stat-item">
                    <h3 id="borrowsCount">0</h3>
                    <p>Books Borrowed</p>
                </div>
                <div class="stat-item">
                    <h3 id="categoriesCount">0</h3>
                    <p>Categories</p>
                </div>
            </div>
        </div>
    </section>

    <!-- User Types Section -->
    <section class="user-types" id="users">
        <div class="container">
            <h2 class="section-title">Perfect for Everyone</h2>
            <div class="user-grid">
                <div class="user-card">
                    <div class="user-header student">
                        <h3>👨‍🎓 Students</h3>
                        <p>Everything you need for your studies</p>
                    </div>
                    <div class="user-features">
                        <ul>
                            <li>Browse thousands of books</li>
                            <li>Search by title, author, or subject</li>
                            <li>Borrow books instantly</li>
                            <li>Track your borrowed books</li>
                            <li>Get due date reminders</li>
                            <li>View your reading history</li>
                            <li>Mobile-friendly interface</li>
                            <li>24/7 access to your account</li>
                        </ul>
                    </div>
                </div>
                <div class="user-card">
                    <div class="user-header admin">
                        <h3>👩‍🏫 Librarians</h3>
                        <p>Complete library management tools</p>
                    </div>
                    <div class="user-features">
                        <ul>
                            <li>Add new books to the system</li>
                            <li>Edit book information</li>
                            <li>Track book availability</li>
                            <li>View all student borrowings</li>
                            <li>Manage overdue books</li>
                            <li>Generate reports</li>
                            <li>User management system</li>
                            <li>Inventory management</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2>Ready to Get Started?</h2>
            <p>Join thousands of students already using BookBase for their studies</p>
            <div>
                <a href="register.html" class="btn btn-secondary">Create Free Account</a>
                <a href="login.html" class="btn btn-primary">Login Now</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>BookBase</h3>
                    <p>Your digital library system for modern education. Making book borrowing simple and efficient.</p>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#how-it-works">How It Works</a></li>
                        <li><a href="register.html">Sign Up</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Support</h3>
                    <ul>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contact</h3>
                    <ul>
                        <li>📧 support@bookbase.com</li>
                        <li>📞 (555) 123-4567</li>
                        <li>📍 123 Library St, Education City</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 BookBase. All rights reserved. Made with ❤️ for students and libraries.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenu = document.getElementById('mobileMenu');
        const navMenu = document.getElementById('navMenu');

        mobileMenu.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetSection = document.querySelector(targetId);
                
                if (targetSection) {
                    targetSection.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
                
                // Close mobile menu if open
                navMenu.classList.remove('active');
            });
        });

        // Animated counter for stats
        function animateCounter(element, target, duration = 2000) {
            let start = 0;
            const increment = target / (duration / 16);
            
            function updateCounter() {
                start += increment;
                if (start < target) {
                    element.textContent = Math.floor(start);
                    requestAnimationFrame(updateCounter);
                } else {
                    element.textContent = target;
                }
            }
            updateCounter();
        }

        // Check if element is in viewport
        function isInViewport(element) {
            const rect = element.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        // Animate stats when they come into view
        let statsAnimated = false;
        
        function checkStatsAnimation() {
            const statsSection = document.querySelector('.stats');
            
            if (isInViewport(statsSection) && !statsAnimated) {
                statsAnimated = true;
                
                // Animate counters
                animateCounter(document.getElementById('booksCount'), 5420);
                animateCounter(document.getElementById('studentsCount'), 1250);
                animateCounter(document.getElementById('borrowsCount'), 8930);
                animateCounter(document.getElementById('categoriesCount'), 45);
            }
        }

        // Check on scroll
        window.addEventListener('scroll', checkStatsAnimation);
        
        // Check on page load
        window.addEventListener('load', checkStatsAnimation);

        // Header background change on scroll
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            
            if (window.scrollY > 50) {
                header.style.backgroundColor = 'rgba(44, 62, 80, 0.95)';
                header.style.backdropFilter = 'blur(10px)';
            } else {
                header.style.backgroundColor = '#2c3e50';
                header.style.backdropFilter = 'none';
            }
        });

        // Add fade-in animation for feature cards
        function addFadeInAnimation() {
            const cards = document.querySelectorAll('.feature-card, .step-card, .user-card');
            
            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            });

            function checkCardAnimation() {
                cards.forEach(card => {
                    if (isInViewport(card)) {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }
                });
            }

            window.addEventListener('scroll', checkCardAnimation);
            window.addEventListener('load', checkCardAnimation);
        }

        // Initialize animations
        addFadeInAnimation();
    </script>
</body>
</html>
