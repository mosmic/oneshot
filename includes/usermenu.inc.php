<?php $currentPage = basename($_SERVER['SCRIPT_FILENAME']); ?>
<ul id="nav">
        <li><a href="index.php" <?php if ($currentPage == 'index.php') {echo 'id="here"';} ?>>Αρχη</a></li>
        <li><a href="style.php" <?php if ($currentPage == 'style.php') {echo 'id="here"';} ?>>Style</a></li>
        <li><a href="design.php" <?php if ($currentPage == 'design.php') {echo 'id="here"';} ?>>Design</a></li>
        <li><a href="music.php" <?php if ($currentPage == 'music.php') {echo 'id="here"';} ?>>Μουσικη</a></li>
        <li><a href="technology.php" <?php if ($currentPage == 'technology.php') {echo 'id="here"';} ?>>Τεχνολογια</a></li>
        <li><a href="contact_us.php" <?php if ($currentPage == 'contact_us.php') {echo 'id="here"';} ?>>Επικοινωνια</a></li>
        <li><a href="/admin/blog_list_mysqli.php" <?php if ($currentPage == '/admin/blog_list_mysqli.php') {echo 'id="here"';} ?>>Επεξεργασια</a></li>
    </ul>