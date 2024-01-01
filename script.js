function scramble(el, time, originalText = "") {
	const duds = "=-/\\~_+^?!#&%$@*";
	const orig = originalText || el.innerText;
	const end = new Date().getTime() + time;
	let chars = orig.split("");
	const ridx = a => Math.floor(Math.random()*a.length);
	const inner = () => {
		const now = new Date().getTime();
		if (now > end) {
			el.innerText = orig;
			return;
		}
		for (let i = 0; i < 2; i++) {
			const j = ridx(chars);
			// tendency to restore the original text in the last 500ms
			chars[j] = Math.random() < Math.min(.5, (end-now)/1000)
				? `<span class="dud">${duds[ridx(duds)]}</span>`
				: orig[j];
		}
		el.innerHTML = chars.join("");
		requestAnimationFrame(inner);
	}
	requestAnimationFrame(inner);
}
let el = document.querySelector(".name");
let text = el.innerText;
let itv = setInterval(() => scramble(el, 1200, text), 5000);
scramble(el, 1200);

