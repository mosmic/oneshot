<?php $currentPage = basename($_SERVER['SCRIPT_FILENAME']); ?>
<ul id="nav">
        <li><a href="index.php" <?php if ($currentPage == 'index.php') {echo 'id="here"';} ?>>Αρχη</a></li>
        <li><a href="style.php" <?php if ($currentPage == 'style.php') {echo 'id="here"';} ?>>Style</a></li>
        <li><a href="design.php" <?php if ($currentPage == 'design.php') {echo 'id="here"';} ?>>Design</a></li>
        <li><a href="music.php" <?php if ($currentPage == 'music.php') {echo 'id="here"';} ?>>Μουσικη</a></li>
        <li><a href="technology.php" <?php if ($currentPage == 'technology.php') {echo 'id="here"';} ?>>Τεχνολογια</a></li>
        <li><a href="rss.php" <?php if ($currentPage == 'rss.php') {echo 'id="here"';} ?>>Ροη RSS</a></li>
        <li><a href="contact_us.php" <?php if ($currentPage == 'contact_us.php') {echo 'id="here"';} ?>>Επικοινωνια</a></li>
        <li><a href="/authenticate/login_db.php" <?php if ($currentPage == '/authenticate/login_db.php') {echo 'id="here"';} ?>>Συνδεση</a></li>
    </ul>