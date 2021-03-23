$(document).ready(function () {
    $("#food-link").addClass("active");

    var deleteFoodId = -1;
});

function navigateToNewFood() {
    window.location.href = "new-food.php";
}

function navigateToModifyFood(foodId) {
    window.location.href = "modify-food.php?id=" + foodId;
}


function setDeleteFoodId(foodId) {
    deleteFoodId = foodId;
}

function deleteFood() {
    $.post(
        "../controller/delete-food-controller.php",
        {
            foodId: deleteFoodId
        },
        function (response) {
            if (response.success) {
                window.location.href = "food.php";
            }
        }
    )
}