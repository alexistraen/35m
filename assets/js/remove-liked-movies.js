let testButton = document.querySelectorAll(".remove-to-watch-movie");

console.log(testButton);

testButton.forEach(button => {
    button.addEventListener("click", async function () {

        let response = await fetch("../Controllers/remove-liked-movies-ajax.php", {
            method: "POST",
            body: "toWatchId=" + button.id,
            headers: {
                "Content-type": "application/x-www-form-urlencoded"
            }
        });

        let result = await response.json();

        if (result === true) {
            button.parentElement.classList.add("hidden-class");
            setTimeout(() => {
                button.parentNode.remove();
            }, 360);
        }
    })
});