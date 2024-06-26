function darkmode() {
  var SetTheme = document.body;
  SetTheme.classList.toggle("dark-mode");
  var theme;
  if (SetTheme.classList.contains("dark-mode")) {
    console.log("Dark mode");
    theme = "DARK";
  } else {
    console.log("Light mode");
    theme = "LIGHT";
  }
  // save to localStorage
  localStorage.setItem("PageTheme", JSON.stringify(theme));
  // ensure you convert to JSON like i have done -----JSON.stringify(theme)
}

setInterval(() => {
  let GetTheme = JSON.parse(localStorage.getItem("PageTheme"));
  console.log(GetTheme);
  if (GetTheme === "DARK") {
    document.body.classList = "dark-mode";
  } else {
    document.body.classList = "";
  }
}, 5);
function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 150;

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    }
  }
}

window.addEventListener("scroll", reveal);
