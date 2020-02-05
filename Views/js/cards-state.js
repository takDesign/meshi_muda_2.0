$(".saved").on("click", function(e) {
    e.preventDefault();
});

$(".save").on("click", function(e) {
    e.preventDefault();
    if ($(this).hasClass("save")) {
        if (confirm("Do you want to make this food unavailable?")) {
            const card = $(this);
            const id = $(this).data("id");

            $.ajax({
                url:
                    "index.php?controller=deals&route=makeUnavailable&id=" + id,
                type: "get",
                success: function() {
                    card.removeClass("save").addClass("saved");

                    card.parents(".card")
                        .removeClass("card-active")
                        .addClass("card-inactive");
                    alert("success");
                },
                error: function() {
                    alert("Sorry something went wrong..");
                    return false;
                }
            });
        }
    }
});
