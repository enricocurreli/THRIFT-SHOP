
document.addEventListener("DOMContentLoaded", function() {
    
    const navbar = document.querySelector(".navbar");
    const dropmenu_custom = document.querySelector("#dropmenu_custom");
    
    window.addEventListener("scroll", () => {
        if (window.scrollY > 0){
            navbar.classList.add("navbar_scrolled");
        }
        else{
            navbar.classList.remove("navbar_scrolled");
        }
    });

    

    window.addEventListener("scroll", () => {
        if (window.scrollY > 0){
            dropmenu_custom.classList.add("dropmenu_scrolled");
        }
        else{
            dropmenu_custom.classList.remove("dropmenu_scrolled");
        }
    })
});



    