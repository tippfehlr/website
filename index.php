<!doctype html>
<html lang="en">

<head>
  <title>tippfehlr</title>
  <meta charset="utf-8" />
  <meta name="darkreader-lock">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="website of tippfehlr :)" />
  <link rel="stylesheet" href="styles.css" />
  <!-- <script src="script.js" defer></script> -->
  <script defer data-domain="tippfehlr" src="https://plausible.tippfehlr.dev/js/script.js"></script>
</head>

<?php
$url = "https://wakapi.tippfehlr.dev/api/v1/users/tippfehlr/stats";
$json = file_get_contents($url);
$data = json_decode($json)->data;

$totalTime = $data->human_readable_total;
$topLang1 = $data->languages[0]->name;
$topLang2 = $data->languages[1]->name;
$topProject1 = $data->projects[0]->name;
$topProject2 = $data->projects[1]->name;
$topEditor = $data->editors[0]->name;

?>

<body>
  <main class="container">
    <h3 class="name">Hey there, stranger 👋</h3>
    <p>
      I’m <span style="color: var(--mauve)">tippfehlr</span>, a teenager from Germany. I like many things, but
      especially computers and music.
    </p>
    <p>I maintain a few packages in the <a href="https://aur.archlinux.org/packages?K=tippfehlr&SeB=m">AUR</a>.</p>

    <b>Me:</b>
    <ul>
      <li>tippfehlr at tippfehlr dot eu <span class="visible-on-hover">(spam, sorry)</span> </li>
      <li><a rel="me" href="https://github.com/tippfehlr">github.com/tippfehlr</a></li>
      <li><a rel="me" href="https://codeberg.org/tippfehlr">codeberg.org/tippfehlr</a></li>
      <li><a rel="me" href="https://fosstodon.org/@tippfehlr">@tippfehlr@fosstodon.org</a></li>
      <li><a rel="me" href="https://matrix.to/#/@tippfehlr:matrix.org">@tippfehlr:matrix.org</a></li>
    </ul>

    <b>PGP key:</b>
    <p style="text-align: center;">
      <a style="white-space:pre;" href="https://keys.openpgp.org/search?q=tippfehlr%40tippfehlr.eu">1AB6 C278 FF41 229B CF74  7B2C 8DFD B575 B053 8C5D</a>
    </p>

    <b>Coding stats for the last 30 days:</b>
    <ul>
      <li>Time: <?php echo $totalTime; ?></li>
      <li>Top projects: <?php echo $topProject1; ?> && <?php echo $topProject2; ?></li>
      <li>Top languages: <?php echo $topLang1; ?> && <?php echo $topLang2; ?></li>
    </ul>

    <b>Setup:</b>
    <ul>
      <li>OS: Arch Linux</li>
      <li>DE: KDE Plasma</li>
      <li>Shell: fish with <a href="https://starship.rs">Starship</a></li>
      <li>Editor: <?php echo $topEditor; ?></li>
    </ul>

    <b>Other awesome things I use:</b>
    <ul>
      <li><a href="https://github.com/jesseduffield/lazygit">lazygit</a> - my go-to git tui</li>
      <li><a href="https://github.com/zyedidia/micro">micro</a> - nano but (way) better</li>
      <li><a href="https://github.com/thelocehiliosan/yadm">yadm</a> - my dotfiles manager</li>
    </ul>

    <b>My projects:</b>
    <ul>
      <li>
        <a href="https://github.com/tippfehlr/activity-roles">Activity Roles</a>
        <img class="icon" src="img/typescript.svg">
        <br>  Discord bot to assign roles on presence events.
        <br>  500+ guilds.
      </li>
      <li>
        <a href="https://codeberg.org/tippfehlr/switch-lamps">switch-lamps (WIP)</a>
        <img class="icon" src="img/rust.svg">
        <br>  A switch for all my lamps 🛋️
      </li>
      <li>
        <a href="https://github.com/tippfehlr/composehook">composehook</a>
        <img class="icon" src="img/rust.svg">
        <br>  Webhooks to update docker compose services.
        <br>  Configured with labels.
      </li>
      <li>
        <a href="https://github.com/tippfehlr/wumpus-webhook">wumpus-webhook</a>
        <img class="icon" src="img/rust.svg">
        <br>  Simple webserver to translate Wumpus.store webhooks into
        <br>  Discord webhooks.
      </li>
    </ul>

    <p style="text-align: center">
      <span class="quote"><i>We are not alone, little one.</i></span><br>
      <span class="quote-author">
        — Christopher Paolini, Inheritance
      </span>
      <!-- yes, I also like books :) -->
    </p>

    <p class="footer">
      Website stolen with permission™ from
      <a href="https://bain.cz">bain.cz</a>
      // <a href="https://github.com/tippfehlr/website">source code</a>
      // <a href="https://plausible.tippfehlr.dev/tippfehlr">site analytics</a>
    </p>
  </main>
</body>

</html>
