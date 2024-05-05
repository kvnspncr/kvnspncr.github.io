function search() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    const errorList = document.getElementById("postlist");
    const errors = errorList.getElementsByTagName("li");

    for (let i = 0; i < errors.length; i++) {
        const errorText = errors[i].textContent.toLowerCase();
        if (errorText.includes(input)) {
            errors[i].style.display = "block";
        } else {
            errors[i].style.display = "none";
        }
    }
}

