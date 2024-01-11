<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MovApp</title>
    <script src="https://kit.fontawesome.com/5fa9a1caed.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/movieModal.css">
    <script defer src="/js/script.js"></script>

</head>

<body>
    <header class="header">
        <div class="headerContainer">
            <a href="Homepage.php">
                <div class="logo"></div>
            </a>
            <div class="SearchLoginContainer">
    <div class="headerSearchContainer">
        <form action="/searchmovie" method="POST" class="headerSearchForm" id="headerSearchForm">
            <input type="text" placeholder="Search a movie" maxLength="40" class="headerSearchBar" name="search_query" id="headerSearchBar">
            <button type="submit">Search</button>
        </form>
    </div>
    <div class="login">
                    <button class="menuBurgerBtn">
                        <div class="menuLineContainer">
                            <span class="menuLines"></span>
                            <span class="menuLines"></span>
                            <span class="menuLines"></span>
                        </div>
                        <i class="fa-solid fa-chevron-up"></i>
                    </button>
                </div>
            </div>
        </div>
</div>


                
        <nav class="nav">
            <ul>
                <a href="">
                    <li class="first">
                        <i class="fa-solid fa-user-group"></i>
                        Switch Profile
                    </li>
                </a>
                <a href="">
                    <li class="second">
                        <i class="fa-solid fa-film"></i>
                        WatchList
                    </li>
                </a>
            </ul>
        </nav>
    </header>

    <main>