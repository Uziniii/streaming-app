<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8"> <!--Meta-->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MovApp</title>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <header class="header">
        <div class="headerContainer">
            <a href="Homepage.php">
                <div class="logo"></div>
            </a>
            <div class="SearchLoginContainer">
                <div class="headerSearchContainer">
                    <form action="/search" class="headerSearchForm" id="headerSearchForm">
                        <input type="text" placeholder="Search a movie" maxLength="40" class="headerSearchBar" id="headerSearchBar">
                        <img class="headerSearchBarLogo" src="/img/icons8-magnifying-glass-96.png"></img>
                    </form>
                </div>
                <div class="login">
                    <button class="menuBurgerBtn">
                        <img class="menuBurgerIcon" src="/img/Untitledicon_profil.png" alt="">
                    </button>
                </div>
            </div>
        </div>
        <nav class="nav">   
            <ul>
                <a href="/profile">
                    <li class="first">
                        <img src="/img/Family Man Woman Girl Boyfamily_icon.png" alt="" class="profilesIcon">
                        Manage Profile
                    </li>
                </a>
                <a href="">
                    <li class="second">
                        <img src="/img/Untitledicon_logout.png" alt="" class="logoutIcon">
                        Log out
                    </li>
                </a>
            </ul>
        </nav>
    </header>
    <main>