<!doctype html>
<html lang="en">

<head>
  <title>tippfehlr</title>
  <meta charset="utf-8" />
  <meta name="darkreader-lock">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="website of tippfehlr :)" />
  <link rel="stylesheet" href="styles.css" />
  <script src="script.js" defer></script>
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
    <p>
      When coding, I try to focus on correctness and style.<br>
      I especially like languages like Rust and try to stay away from Python,
      (pure) Javascript and other dynamically-typed languages.
    </p>
    <p>I also maintain a few packages in the <a href="https://aur.archlinux.org/packages?K=tippfehlr&SeB=m">AUR</a>.</p>

    <b>Me</b>:
    <ul>
      <li>tippfehlr at tippfehlr dot eu <span class="visible-on-hover">(spam, sorry)</span> </li>
      <li><a href="https://github.com/tippfehlr">github.com/tippfehlr</a></li>
      <li><a rel="me" href="https://fosstodon.org/@tippfehlr">@tippfehlr@fosstodon.org</a></li>
      <li>@tippfehlr:matrix.org</li>
    </ul>

    <b class="wakapi">Coding stats for the last 30 days:</b>
    <ul>
      <li class="wakapi">Time: <?php echo $totalTime; ?></li>
      <li class="wakapi">Top projects: <?php echo $topProject1; ?> && <?php echo $topProject2; ?></li>
      <li class="wakapi">Top languages: <?php echo $topLang1; ?> && <?php echo $topLang2; ?></li>
    </ul>

    <b>Setup</b>:
    <ul>
      <li>OS: Arch Linux</li>
      <li>DE: KDE Plasma</li>
      <li>Shell: fish with <a href="https://starship.rs">Starship</a></li>
      <li class="wakapi">Editor: <?php echo $topEditor; ?></li>
    </ul>

    <b>Other awesome things I use:</b>
    <ul>
      <li><a href="https://github.com/jesseduffield/lazygit">lazygit</a> - my go-to git tui</li>
      <li><a href="https://github.com/zyedidia/micro">micro</a> - nano but (way) better</li>
      <li><a href="https://github.com/thelocehiliosan/yadm">yadm</a> - my favourite dotfiles manager</li>
    </ul>

    <b>My projects</b>:
    <ul>
      <li>
        <a href="https://github.com/tippfehlr/activity-roles">Activity Roles</a>
        <img class="icon" src="img/typescript.svg">
        <br>  Discord bot to assign roles on presence events.
        <br>  400+ guilds.
      </li>
      <li>
        <a href="https://github.com/tippfehlr/switch-lamps">switch-lamps (WIP)</a>
        <img class="icon" src="img/rust.svg">
        <br>  A switch for all my lamps 🛋️
      </li>
      <li>more to come …</li>
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
      <a href="https://bain.cz">bain.cz</a>.
      // <a href="https://github.com/tippfehlr/website">GitHub</a>
    </p>
  </main>
</body>

</html>
