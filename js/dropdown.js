function show(value, index) {
    const textBoxes = document.querySelectorAll(".text-box");
    textBoxes[index].value = value;
}

let dropdowns = document.querySelectorAll(".dropdown");
dropdowns.forEach((dropdown, index) => {
    dropdown.onclick = function() {
        dropdown.classList.toggle("active");
    }
});
