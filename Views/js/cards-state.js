$(".card-active").on("click", function() {
    if ($(this).hasClass("card-active")) {
        if (confirm("Do you want to make this food unavailable?")) {
            const card = $(this);
            const id = $(this).data("id");
            console.log(id);

            card.removeClass("card-active")
                .addClass("card-inactive")
                .css("opacity", "0.5");

            // $.ajax({
            //     url:
            //         "index.php?controller=deal&route=changeAvailability&id=" +
            //         id,
            //     type: "get",
            //     success: function() {

            //     },
            //     error: function() {
            //         return false;
            //     }
            // });
        }
    }
});