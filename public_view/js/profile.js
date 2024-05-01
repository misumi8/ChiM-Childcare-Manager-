document.addEventListener("DOMContentLoaded", function() {
    const addMoreInfo = document.getElementById("pr-add-more-info-button");
    const childDataForm = document.getElementById("pr-child-data-form");
    const arrow = document.getElementById("pr-timeline");
    const closeButton = document.getElementById("pr-close-2col-form");
    addMoreInfo.addEventListener("click", function() {
        childDataForm.style.display = "flex";
        closeButton.style.display = "flex";
        arrow.style.display = "none";
    });
    closeButton.addEventListener("click", function() {
        childDataForm.style.display = "none";
        closeButton.style.display = "none";
        arrow.style.display = "grid";
    });
});