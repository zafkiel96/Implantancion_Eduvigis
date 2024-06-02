let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => item.classList.remove("hovered"));
  this.classList.add("hovered");
}
list.forEach((item) => item.addEventListener("mouseover", activeLink));

function goBack() {
  location.href = "dashboard.html";
}

document.querySelectorAll(".button.alternative").forEach((button) => {
  let div = document.createElement("div"),
    letters = button.textContent.trim().split("");

  function elements(letter, index, array) {
    let element = document.createElement("span"),
      part = index >= array.length / 2 ? -1 : 1,
      position =
        index >= array.length / 2
          ? array.length / 2 - index + (array.length / 2 - 1)
          : index,
      move = position / (array.length / 2),
      rotate = 1 - move;

    element.innerHTML = !letter.trim() ? "&nbsp;" : letter;
    element.style.setProperty("--move", move);
    element.style.setProperty("--rotate", rotate);
    element.style.setProperty("--part", part);

    div.appendChild(element);
  }

  letters.forEach(elements);

  button.innerHTML = div.outerHTML;

  button.addEventListener("mouseenter", (e) => {
    if (!button.classList.contains("out")) {
      button.setAttribute("data-original", button.textContent);
      button.textContent = button.getAttribute("data-hover");
      button.classList.add("in");
    }
  });

  button.addEventListener("mouseleave", (e) => {
    if (button.classList.contains("in")) {
      button.textContent = button.getAttribute("data-original");
      button.classList.add("out");
      setTimeout(() => button.classList.remove("in", "out"), 950);
    }
  });
});
