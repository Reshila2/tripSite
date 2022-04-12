// Счетчик

try {
    const plus = document.querySelector(".count-plus");
    const minus = document.querySelector(".count-minus");
    const total = document.querySelector(".count-total");

    let count = 1;

    total.textContent = count;

    plus.addEventListener("click", () => {
        if (count >= 1) {
            total.textContent = ++count;
        }
    });

    minus.addEventListener("click", () => {
        if (count > 1) {
            total.textContent = --count;
        }
    });
} catch {}
