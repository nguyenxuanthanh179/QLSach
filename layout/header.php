<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sách - báo</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   </head>
<body>
        <header class="header">
            <div class="row">
                <div class="col-4">
                    <h3 class="bg-color">
                        Management books
                    </h3>
                </div>
                <div class="col-8">
                    <div class="row flex">
                        <div class= "icon-bars">
                            <i class="fas fa-bars"></i>
                        </div>
                        <div class="info">
                            <i class="fas fa-envelope info__item"></i>
                            <i class="far fa-bell info__item"></i>
                            <a class="info__item-img info__item">
                                <img src="../photos/avatar.png" alt="" class="item-img">
                            </a>
                            <span class="info__item">Nguyễn Xuân Thanh</span>
                            <i class="fas fa-cogs info__item"></i>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="row">
            <div class="sidebar col-4">
                <div class="row al-items">
                    <div>
                        <a class="info__item-img info__item">
                            <img src="../photos/avatar.png" alt="" class="item-img">
                        </a>
                    </div>
                    <div class="name__online">
                        Nguyễn Xuân Thanh
                        <p class="online">Online</p>
                    </div>
                </div>
                <div class="sidebar__search">
                    <input type="text" placeholder="Search" class="search__input">
                    <i class="fas fa-search"></i>
                </div>
                <ul class="menu">
                    <li class="menu__item">
                        <i class="far fa-folder-open"></i>
                        <a href="./../category/view.php" class="menu__item-link">Manage categories</a>
                    </li>
                    <li class="menu__item">
                        <i class="fas fa-book"></i>
                        <a href="./../book/view.php" class="menu__item-link">Manage books</a>
                    </li>
                </ul>
            </div>