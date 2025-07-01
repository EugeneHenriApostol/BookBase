<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookBase - My Dashboard</title>
    <style>
        /* Reset and basic styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        /* Header */
        .header {
            background: #2c3e50;
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-name {
            font-size: 16px;
        }

        .logout-btn {
            background: #e74c3c;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background: #c0392b;
        }

        /* Main container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        /* Welcome section */
        .welcome-section {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .welcome-section h1 {
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .welcome-section p {
            color: #666;
            font-size: 16px;
        }

        /* Dashboard grid */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        /* Section styles */
        .section {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .section-header {
            background: #667eea;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .section-header h2 {
            font-size: 20px;
        }

        .section-content {
            padding: 20px;
        }

        /* Book cards */
        .book-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .book-card {
            display: flex;
            gap: 15px;
            padding: 15px;
            border: 1px solid #e1e8ed;
            border-radius: 8px;
            transition: box-shadow 0.3s;
        }

        .book-card:hover {
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .book-cover {
            width: 60px;
            height: 80px;
            background: #667eea;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            flex-shrink: 0;
        }

        .book-info {
            flex: 1;
        }

        .book-title {
            font-size: 16px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .book-author {
            color: #666;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .book-meta {
            font-size: 12px;
            color: #999;
        }

        .due-date {
            color: #e74c3c;
            font-weight: bold;
        }

        .due-date.warning {
            color: #f39c12;
        }

        .due-date.safe {
            color: #27ae60;
        }

        /* Action buttons */
        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }

        .btn-primary {
            background: #667eea;
            color: white;
        }

        .btn-primary:hover {
            background: #5a6fd8;
        }

        .btn-success {
            background: #27ae60;
            color: white;
        }

        .btn-success:hover {
            background: #229954;
        }

        .btn-warning {
            background: #f39c12;
            color: white;
        }

        .btn-warning:hover {
            background: #e67e22;
        }

        /* Stats cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .stat-number {
            font-size: 36px;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 10px;
        }

        .stat-label {
            color: #666;
            font-size: 14px;
        }

        /* Search section */
        .search-section {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .search-form {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .search-input {
            flex: 1;
            padding: 12px 15px;
            border: 2px solid #e1e8ed;
            border-radius: 8px;
            font-size: 16px;
        }

        .search-input:focus {
            outline: none;
            border-color: #667eea;
        }

        .search-btn {
            padding: 12px 25px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        .search-btn:hover {
            background: #5a6fd8;
        }

        /* Available books grid */
        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .available-book-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .available-book-card:hover {
            transform: translateY(-2px);
        }

        .available-book-cover {
            height: 200px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 48px;
        }

        .available-book-info {
            padding: 20px;
        }

        .available-book-title {
            font-size: 16px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .available-book-author {
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .book-status {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }

        .copies-available {
            font-size: 12px;
            color: #27ae60;
        }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #666;
        }

        .empty-state-icon {
            font-size: 48px;
            margin-bottom: 15px;
        }

        /* Mobile responsive */
        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .header-content {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .user-info {
                flex-direction: column;
                gap: 10px;
            }

            .search-form {
                flex-direction: column;
            }

            .books-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .book-card {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="logo">📚 BookBase</div>
            <div class="user-info">
                <span class="user-name">Welcome, <strong id="userName">John Doe</strong></span>
                <a href="index.html" class="logout-btn" onclick="logout()">Logout</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h1>My Dashboard</h1>
            <p>Manage your borrowed books and discover new ones to read</p>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number" id="borrowedCount">3</div>
                <div class="stat-label">Books Borrowed</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="totalRead">12</div>
                <div class="stat-label">Books Read</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="overdueCount">0</div>
                <div class="stat-label">Overdue Books</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="availableCount">1,247</div>
                <div class="stat-label">Available Books</div>
            </div>
        </div>

        <!-- Dashboard Grid -->
        <div class="dashboard-grid">
            <!-- My Borrowed Books -->
            <div class="section">
                <div class="section-header">
                    <h2>📖 My Borrowed Books</h2>
                    <span id="borrowedBooksCount">3 books</span>
                </div>
                <div class="section-content">
                    <div class="book-list" id="borrowedBooksList">
                        <!-- Borrowed books will be loaded here -->
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="section">
                <div class="section-header">
                    <h2>⚡ Quick Actions</h2>
                </div>
                <div class="section-content">
                    <div style="display: flex; flex-direction: column; gap: 15px;">
                        <button class="btn btn-primary" onclick="showAllBooks()">📚 Browse All Books</button>
                        <button class="btn btn-success" onclick="showHistory()">📋 View Reading History</button>
                        <button class="btn btn-warning" onclick="showProfile()">👤 Edit Profile</button>
                        <a href="#search" class="btn btn-primary">🔍 Search Books</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Section -->
        <div class="search-section" id="search">
            <h2 style="margin-bottom: 20px; color: #2c3e50;">🔍 Search Books</h2>
            <div class="search-form">
                <input type="text" class="search-input" id="searchInput" placeholder="Search by title, author, or ISBN...">
                <button class="search-btn" onclick="searchBooks()">Search</button>
            </div>
        </div>

        <!-- Available Books -->
        <div class="section">
            <div class="section-header">
                <h2>📚 Available Books</h2>
                <span id="availableBooksCount">Showing 6 books</span>
            </div>
            <div class="section-content">
                <div class="books-grid" id="availableBooksList">
                    <!-- Available books will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sample data - in a real app, this would come from your PHP backend
        const borrowedBooks = [
            {
                id: 1,
                title: "Introduction to Programming",
                author: "John Smith",
                isbn: "978-0123456789",
                borrowDate: "2024-01-15",
                dueDate: "2024-02-15",
                cover: "💻"
            },
            {
                id: 2,
                title: "Database Systems",
                author: "Jane Wilson",
                isbn: "978-0987654321",
                borrowDate: "2024-01-20",
                dueDate: "2024-02-20",
                cover: "🗄️"
            },
            {
                id: 3,
                title: "Web Development Basics",
                author: "Mike Johnson",
                isbn: "978-0456789123",
                borrowDate: "2024-01-25",
                dueDate: "2024-02-25",
                cover: "🌐"
            }
        ];

        const availableBooks = [
            {
                id: 4,
                title: "Advanced JavaScript",
                author: "Sarah Davis",
                isbn: "978-0321654987",
                copiesAvailable: 3,
                cover: "📜"
            },
            {
                id: 5,
                title: "Python for Beginners",
                author: "Tom Brown",
                isbn: "978-0789123456",
                copiesAvailable: 5,
                cover: "🐍"
            },
            {
                id: 6,
                title: "Data Structures",
                author: "Lisa Garcia",
                isbn: "978-0654321987",
                copiesAvailable: 2,
                cover: "🏗️"
            },
            {
                id: 7,
                title: "Machine Learning",
                author: "David Lee",
                isbn: "978-0147258369",
                copiesAvailable: 4,
                cover: "🤖"
            },
            {
                id: 8,
                title: "Network Security",
                author: "Anna White",
                isbn: "978-0963852741",
                copiesAvailable: 1,
                cover: "🔒"
            },
            {
                id: 9,
                title: "Mobile App Development",
                author: "Chris Taylor",
                isbn: "978-0852741963",
                copiesAvailable: 6,
                cover: "📱"
            }
        ];

        // Load borrowed books
        function loadBorrowedBooks() {
            const container = document.getElementById('borrowedBooksList');
            
            if (borrowedBooks.length === 0) {
                container.innerHTML = `
                    <div class="empty-state">
                        <div class="empty-state-icon">📚</div>
                        <p>You haven't borrowed any books yet.</p>
                        <button class="btn btn-primary" onclick="showAllBooks()" style="margin-top: 15px;">Browse Books</button>
                    </div>
                `;
                return;
            }

            container.innerHTML = borrowedBooks.map(book => {
                const dueDate = new Date(book.dueDate);
                const today = new Date();
                const daysLeft = Math.ceil((dueDate - today) / (1000 * 60 * 60 * 24));
                
                let dueDateClass = 'safe';
                let dueDateText = `Due in ${daysLeft} days`;
                
                if (daysLeft < 0) {
                    dueDateClass = 'due-date';
                    dueDateText = `Overdue by ${Math.abs(daysLeft)} days`;
                } else if (daysLeft <= 3) {
                    dueDateClass = 'warning';
                    dueDateText = `Due in ${daysLeft} days`;
                }

                return `
                    <div class="book-card">
                        <div class="book-cover">${book.cover}</div>
                        <div class="book-info">
                            <div class="book-title">${book.title}</div>
                            <div class="book-author">by ${book.author}</div>
                            <div class="book-meta">
                                Borrowed: ${formatDate(book.borrowDate)} | 
                                <span class="due-date ${dueDateClass}">${dueDateText}</span>
                            </div>
                        </div>
                        <div style="display: flex; flex-direction: column; gap: 8px;">
                            <button class="btn btn-success" onclick="returnBook(${book.id})">Return</button>
                            <button class="btn btn-primary" onclick="renewBook(${book.id})">Renew</button>
                        </div>
                    </div>
                `;
            }).join('');
        }

        // Load available books
        function loadAvailableBooks() {
            const container = document.getElementById('availableBooksList');
            
            container.innerHTML = availableBooks.map(book => `
                <div class="available-book-card">
                    <div class="available-book-cover">${book.cover}</div>
                    <div class="available-book-info">
                        <div class="available-book-title">${book.title}</div>
                        <div class="available-book-author">by ${book.author}</div>
                        <div class="book-status">
                            <span class="copies-available">${book.copiesAvailable} copies available</span>
                            <button class="btn btn-primary" onclick="borrowBook(${book.id})">Borrow</button>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        // Helper functions
        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString();
        }

        function returnBook(bookId) {
            if (confirm('Are you sure you want to return this book?')) {
                alert('Book returned successfully!');
                // In a real app, you would make an API call to your PHP backend
                // Remove book from borrowed list and reload
                const index = borrowedBooks.findIndex(book => book.id === bookId);
                if (index > -1) {
                    borrowedBooks.splice(index, 1);
                    loadBorrowedBooks();
                    updateStats();
                }
            }
        }

        function renewBook(bookId) {
            if (confirm('Do you want to renew this book for another 30 days?')) {
                alert('Book renewed successfully! New due date: ' + new Date(Date.now() + 30 * 24 * 60 * 60 * 1000).toLocaleDateString());
                // In a real app, you would make an API call to your PHP backend
            }
        }

        function borrowBook(bookId) {
            const book = availableBooks.find(b => b.id === bookId);
            if (book && book.copiesAvailable > 0) {
                if (confirm(`Do you want to borrow "${book.title}"?`)) {
                    alert('Book borrowed successfully! Due date: ' + new Date(Date.now() + 30 * 24 * 60 * 60 * 1000).toLocaleDateString());
                    // In a real app, you would make an API call to your PHP backend
                    book.copiesAvailable--;
                    loadAvailableBooks();
                }
            } else {
                alert('Sorry, this book is currently not available.');
            }
        }

        function searchBooks() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            if (searchTerm.trim() === '') {
                alert('Please enter a search term.');
                return;
            }
            
            // Filter available books based on search term
            const filteredBooks = availableBooks.filter(book => 
                book.title.toLowerCase().includes(searchTerm) ||
                book.author.toLowerCase().includes(searchTerm) ||
                book.isbn.includes(searchTerm)
            );
            
            const container = document.getElementById('availableBooksList');
            
            if (filteredBooks.length === 0) {
                container.innerHTML = `
                    <div class="empty-state">
                        <div class="empty-state-icon">🔍</div>
                        <p>No books found for "${searchTerm}"</p>
                        <button class="btn btn-primary" onclick="clearSearch()" style="margin-top: 15px;">Show All Books</button>
                    </div>
                `;
            } else {
                container.innerHTML = filteredBooks.map(book => `
                    <div class="available-book-card">
                        <div class="available-book-cover">${book.cover}</div>
                        <div class="available-book-info">
                            <div class="available-book-title">${book.title}</div>
                            <div class="available-book-author">by ${book.author}</div>
                            <div class="book-status">
                                <span class="copies-available">${book.copiesAvailable} copies available</span>
                                <button class="btn btn-primary" onclick="borrowBook(${book.id})">Borrow</button>
                            </div>
                        </div>
                    </div>
                `).join('');
            }
            
            document.getElementById('availableBooksCount').textContent = `Showing ${filteredBooks.length} books`;
        }

        function clearSearch() {
            document.getElementById('searchInput').value = '';
            loadAvailableBooks();
            document.getElementById('availableBooksCount').textContent = `Showing ${availableBooks.length} books`;
        }

        function updateStats() {
            document.getElementById('borrowedCount').textContent = borrowedBooks.length;
            document.getElementById('borrowedBooksCount').textContent = `${borrowedBooks.length} books`;
            
            // Count overdue books
            const today = new Date();
            const overdueCount = borrowedBooks.filter(book => new Date(book.dueDate) < today).length;
            document.getElementById('overdueCount').textContent = overdueCount;
        }

        // Quick action functions
        function showAllBooks() {
            document.getElementById('search').scrollIntoView({ behavior: 'smooth' });
        }

        function showHistory() {
            alert('Reading History:\n\n• Introduction to Algorithms (Returned)\n• Computer Networks (Returned)\n• Software Engineering (Returned)\n\nTotal books read: 12');
        }

        function showProfile() {
            alert('Profile Settings:\n\nName: John Doe\nEmail: john.doe@university.edu\nStudent ID: STU2024001\nDepartment: Computer Science\n\n(In a real app, this would open a profile editing page)');
        }

        function logout() {
            if (confirm('Are you sure you want to logout?')) {
                alert('Logged out successfully!');
                // In a real app, you would clear session and redirect
                // window.location.href = 'index.html';
            }
        }

        // Search on Enter key
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchBooks();
            }
        });

        // Initialize dashboard
        window.addEventListener('load', function() {
            loadBorrowedBooks();
            loadAvailableBooks();
            updateStats();
        });
    </script>
</body>
</html>
