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

const url = `https://wakapi.tippfehlr.dev/api/v1/users/tippfehlr/stats?is_including_today=true`;
let wakapi = document.querySelector(".wakapi");
fetch(url)
  .then(res => res.json())
  .then(data => {
    const time = data.human_readable_total;
    const topLang = data.languages[0].name;
    const topProject = data.projects[0].name;
    const topEditor = data.editors[0].name;
    const topOS = data.operating_systems[0].name;
    wakapi.innerText = `Time: ${time} Mostly: ${topProject} - ${topLang} - ${topEditor} - ${topOS}.`;
  })
  .catch(err => {
    console.error(err);
    wakapi.innerText = "Can’t load Wakapi stats.";
  });


