$(function () {
    $("#Dropdown").click(function () {
        if ($(".DropdownMenu").hasClass("active")) {
            $(this).removeClass("active");
            $(".DropdownMenu").removeClass("active");
        } else {
            $(this).addClass("active");
            $(".DropdownMenu").addClass("active");
        }
    });

    $(".delete")
        .mouseover(function () {
            $(this).attr("src", "images/trash_h.png");
        })
        .mouseout(function () {
            $(this).attr("src", "images/trash.png");
        });

    $(".modal-open").click(function () {
        var target = $(this).attr("data-target");
        var modal = document.getElementById(target);
        $(modal).addClass("active");
        return false;
    });
    $(document).click(function (e) {
        if (!$(e.target).closest(".modal-body").length) {
            $(".modal-wind").removeClass("active");
        }
    });
});
