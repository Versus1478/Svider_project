<?php session_start(); ?>
<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                        <img src="assets/images/logo-v3.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="Functions/Admin/adminPage.php">Admin</a></li>
                        <li class="scroll-to-section"><a href="#about">About</a></li>
                        <li class="scroll-to-section"><a href="#services">Services</a></li>
                        <li class="scroll-to-section"><a href="#portfolio">Projects</a></li>
                        <li class="scroll-to-section"><a href="#blog">Blog</a></li>
                        <li class="scroll-to-section"><a href="#contact">Contact</a></li>
                        <li class="scroll-to-section">
                            <style>
                                .border-first-button a {
                                    display: inline-block;
                                    padding: 12px 28px;
                                    background: #2ecc71;
                                    color: white;
                                    font-size: 16px;
                                    font-weight: 600;
                                    text-decoration: none;
                                    border-radius: 50px;
                                    transition: background 0.3s, transform 0.2s;
                                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
                                }

                                .border-first-button a:hover {
                                    background: #27ae60;
                                    transform: scale(1.05);
                                }
                            </style>
                            <div class="border-first-button">
                                <a href="../Functions/Register/register.php">Register</a>
                            </div>
                        </li>
                        <li class="scroll-to-section">
                            <div class="border-first-button" style="background: none; padding: 1px;">
                                <?php if (isset($_SESSION['username'])): ?>
                                    <span style="
                                    color: #333;
                                    font-weight: 500;
                                    font-size: 16px;
                                    display: inline-block;
                                    background-color: transparent;
                                    padding: 8px 12px;
                                    border-radius: 5px;
                                    box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.1);">
                👤 <?= htmlspecialchars($_SESSION['username']) ?> <span style="font-size: 14px; color: #501217;">(logged in)</span>
            </span>
                                <?php else: ?>
                                    <a href="../Functions/Login/login.php" style="
                text-decoration: none;
                color: white;
                padding: 5px 16px;
                background-color: #3498db;
                border-radius: 5px;
                font-weight: bold;
                transition: background-color 0.3s;
            " onmouseover="this.style.backgroundColor='#2980b9'" onmouseout="this.style.backgroundColor='#3498db'">
                                        Login
                                    </a>
                                <?php endif; ?>
                            </div>
                        </li>

                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->