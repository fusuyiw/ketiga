$("#imageModal").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var image = button.data("image"); // Extract info from data-* attributes
    var modal = $(this);
    modal.find("#modalImage").attr("src", image);
});
