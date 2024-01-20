function scramble(el, time, originalText = "") {
  const duds = "=-/\\~_+^?!#&%$@*";
  const orig = originalText || el.innerText;
  const end = new Date().getTime() + time;
  let chars = orig.split("");
  const ridx = a => Math.floor(Math.random() * a.length);
  const inner = () => {
    const now = new Date().getTime();
    if (now > end) {
      el.innerText = orig;
      return;
    }
    for (let i = 0; i < 2; i++) {
      const j = ridx(chars);
      // tendency to restore the original text in the last 500ms
      chars[j] = Math.random() < Math.min(.5, (end - now) / 1000)
        ? `<span class="dud">${duds[ridx(duds)]}</span>`
        : orig[j];
    }
    el.innerHTML = chars.join("");
    requestAnimationFrame(inner);
  };
  requestAnimationFrame(inner);
}

let header = document.querySelector(".name");
setInterval(() => scramble(header, 1200, header.innerHTML), 8096);
scramble(header, 1200);

const project_mappings = {
  "activity-roles": '<a href="https://github.com/tippfehlr/activity-roles">Activity Roles</a>',
  "website": '<a href="https://github.com/tippfehlr/website">this website</a>',
  "wrestic": '<a href="https://github.com/alvaro17f/wrestic">wrestic</a> (<a href="https://aur.archlinux.org/packages/wrestic">AUR</a>)',
  "avr-hal": '<a href="https://github.com/Rahix/avr-hal">avr-hal</a>',
  "radicle-cli-bin": '<a href="https://aur.archlinux.org/packages/radicle-cli-bin">radicle-cli-bin (AUR)</a>',
  "radicle-node-bin": '<a href="https://aur.archlinux.org/packages/radicle-node-bin">radicle-node-bin (AUR)</a>',
  "radicle-httpd-bin": '<a href="https://aur.archlinux.org/packages/radicle-httpd-bin">radicle-httpd-bin (AUR)</a>',
  "mcman": '<a href="https://github.com/ParadigmMC/mcman">mcman</a>',
  "epd-waveshare": '<a href="https://github.com/caemor/epd-waveshare">epd-waveshare</a>',
};

const url = "https://wakapi.tippfehlr.dev/api/v1/users/tippfehlr/stats";
let wakapi = document.querySelectorAll(".wakapi");
fetch(url)
  .then(res => res.json())
  .then(data => {
    data = data.data;
    const time = data.human_readable_total;
    const range = data.human_readable_range.toLowerCase();
    const topLang = data.languages[0].name;
    const topLang2 = data.languages[1].name;
    const topLang3 = data.languages[2].name;
    let topProject = data.projects[0].name;
    let topProject2 = data.projects[1].name;
    let topProject3 = data.projects[2].name;
    const topEditor = data.editors[0].name;
    const topOS = data.operating_systems[0].name;

    if (topProject in project_mappings) topProject = project_mappings[topProject];
    if (topProject2 in project_mappings) topProject2 = project_mappings[topProject2];
    if (topProject3 in project_mappings) topProject3 = project_mappings[topProject3];

    for (const el of wakapi) {
      el.innerHTML = el.innerHTML
        .replace("{{time}}", time)
        .replace("{{range}}", range)
        .replace("{{topProject}}", topProject)
        .replace("{{topProject2}}", topProject2)
        .replace("{{topProject3}}", topProject3)
        .replace("{{topLang}}", topLang)
        .replace("{{topLang2}}", topLang2)
        .replace("{{topLang3}}", topLang3)
        .replace("{{topEditor}}", topEditor)
        .replace("{{topOS}}", topOS);
    }
  })
  .catch(err => {
    console.error(err);
    wakapi.innerText = "Can’t load Wakapi stats.";
  });


