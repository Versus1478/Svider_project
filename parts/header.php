<?php session_start(); ?>
<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo" aria-label="Homepage">
                        <img src="assets/images/logo-v3.png" alt="Site Logo">
                    </a>
                    <!-- ***** Logo End ***** -->

                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="admin_redirect.php">Admin</a></li>
                        <li class="scroll-to-section"><a href="#about">About</a></li>
                        <li class="scroll-to-section"><a href="#services">Services</a></li>
                        <li class="scroll-to-section"><a href="#portfolio">Projects</a></li>
                        <li class="scroll-to-section"><a href="#blog">Blog</a></li>
                        <li class="scroll-to-section"><a href="#contact">Contact</a></li>

<!--                        <li class="scroll-to-section">-->
                            <div class="border-first-button" style="background: none; padding-right: 16px;">
                                <a class="btn-login" href="register.php">Register</a>
                            </div>
<!--                        </li>-->

<!--                        <li class="scroll-to-section">-->
                            <div class="border-first-button" style="background: none; padding: 1px;">
                                <?php if (!empty($_SESSION['username'])): ?>
                                    <span style="
                                        color: #333;
                                        font-weight: 500;
                                        font-size: 16px;
                                        display: inline-block;
                                        background-color: transparent;
                                        padding: 8px 12px;
                                        border-radius: 5px;
                                        box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.1);
                                        user-select: none;
                                    ">
                                        👤 <?= htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') ?> <span style="font-size: 14px; color: #501217;">(logged in)</span>
                                    </span>
                                <?php else: ?>
                                    <a href="login.php" class="btn-login">
                                        Login
                                    </a>
                                <?php endif; ?>
                            </div>
<!--                        </li>-->
                    </ul>

                    <a class='menu-trigger' aria-label="Toggle menu">
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>

    <style>
        .border-first-button a {
            display: inline-block;
            padding: 12px 24px;
            background: #337ab7;
            color: white;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            border-radius: 30px;
            transition: background 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 12px rgba(51, 122, 183, 0.4);
            user-select: none;
        }

        .border-first-button a:hover,
        .border-first-button a:focus {
            background: #2980b9;
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(41, 128, 185, 0.6);
            outline: none;
        }

        .btn-login {
            background-color: #3498db;
            padding: 8px 20px;
            border-radius: 30px;
            font-weight: bold;
            font-size: 16px;
            color: white;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 10px rgba(52, 152, 219, 0.4);
            user-select: none;
        }

        .btn-login:hover,
        .btn-login:focus {
            background-color: #2980b9;
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(41, 128, 185, 0.6);
            outline: none;
        }

        .menu-trigger {
            cursor: pointer;
            display: none;
        }

        @media (max-width: 768px) {
            .menu-trigger {
                display: block;
            }
            .nav {
                display: none;
            }
        }
    </style>
</header>
<!-- ***** Header Area End ***** -->
