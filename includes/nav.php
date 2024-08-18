<?php
function aria_current($url) {
    // If $url is an exact match for the current URL, return 'aria-current="page"'.
    if ($_SERVER['REQUEST_URI'] === $url) {
        echo 'aria-current="page"';
        return;
    }

    // Otherwise it might be a subpage, so check if the current URL contains
    // $url. If it does, return 'aria-current="true"' to indicate that the link
    // is an ancestor of the current page. Ignore a lone slash.
    if ($url !== '/' && strpos($_SERVER['REQUEST_URI'], $url) !== false) {
        echo 'aria-current="true"';
        return;
    }
}
?>

<nav>
    <a href="/" <?php aria_current('/') ?>>Home</a>
    <a href="/blog" <?php aria_current('/blog') ?>>Blog</a>
    <a href="/about.php" <?php aria_current('/about.php') ?>>About</a>
    <a href="/resume.php" <?php aria_current('/resume.php') ?>>Resume</a>
    <a href="/fun.php" <?php aria_current('/fun.php') ?>>Fun!</a>
</nav>