<nav class="font-family navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item mr-5" id="overview-link">
                <a class="nav-link" href="overview.php">Áttekintés</a>
            </li>
            <li class="nav-item mr-5" id="history-link">
                <a class="nav-link" href="history.php">Előzmények</a>
            </li>
            <li class="nav-item mr-5" id="food-link">
                <a class="nav-link" href="food.php">Élelmiszerek</a>
            </li>
            <li class="nav-item mr-5" id="activities-link">
                <a class="nav-link" href="activities.php">Tevékenységek</a>
            </li>
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Beállítások
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="basic-data.php">Alapadatok</a>
                    <a class="dropdown-item" href="profile-information.php">Profil adatok</a>
                    <a class="dropdown-item" href="password.php">Jelszó módosítása</a>
                </div>
            </div>
        </ul>

        <div class="mr-2">
            <button type="button" class="btn btn-primary btn-style" id="kijelentkezes" onclick="logout()">Kijelentkezés</button>
        </div>
    </div>
</nav>