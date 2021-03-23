$(document).ready(function () {
    $("#activities-link").addClass("active");

    var deleteActivityId = -1;

});

function navigateToNewActivity() {
    window.location.href = "new-activity.php";
}

function navigateToModifyActivity(activityId) {
    window.location.href = "modify-activity.php?id=" + activityId;
}


function setDeleteActivityId(activityId) {
    deleteActivityId = activityId;
}

function deleteActivity() {
    $.post(
        "../controller/delete-activity-controller.php",
        {
            activityId: deleteActivityId
        },
        function (response) {
            if (response.success) {
                window.location.href = "activities.php";
            }
        }
    )
}