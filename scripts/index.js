let hamburgerIcon = document.getElementById("hamburgerMenuIcon");
let dropdownLinks=document.getElementById("dropdownLinks");
hamburgerIcon.onclick = () => {
    dropdownLinks.classList.toggle("dropdownLinksShow");
}
