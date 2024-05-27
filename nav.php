<nav class="navbar navbar-expand-sm sticky-top">
    <div class="container d-flex justify-content-between">
        <div class="col-sm-2">
            <ul class="navbar-nav d-flex justify-content-around">
                <li class="nav-item">
                    <a class="nav-link rounded <?php echo ($_SERVER['PHP_SELF'] == '/alquran/index.php' || $_SERVER['PHP_SELF'] == '/alquran/' || $_SERVER['PHP_SELF'] == '/alquran/baca.php') ? 'active' : ''; ?>" href="/alquran/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded <?php echo ($_SERVER['PHP_SELF'] == '/alquran/tafsir.php' || $_SERVER['PHP_SELF'] == '/alquran/detail_tafsir.php') ? 'active' : ''; ?>" href="tafsir.php">Tafsir</a>
                </li>
            </ul>
        </div>
        <div class="col-sm-2">
            <ul class="navbar-nav d-flex justify-content-around">
                <li class="nav-item">
                    <a target="_blank" class="nav-link rounded" href="https://equran.id/apidev">API Developer EQuran</a>
                </li>
            </ul>
        </div>
    </div>
</nav>