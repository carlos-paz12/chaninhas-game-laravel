$(document).ready(function () {
    let soundMeow = new Audio("../audio/meow.mp3");
    let soundTheme = new Audio("../audio/theme-background.mp3");

    let hits = 0;
    let misses = 0;
    let attempts = 0;
    let onTarget = false;

    let timeInSeconds = 30;
    let timeInMilliseconds = timeInSeconds * 1000;
    let checkTimeInSeconds = 0;
    let chronometerTimeInMilliseconds = 0;

    function playGame() {
        soundTheme.play();

        $("#game_btn-play").attr("disabled", true);
        $("#game_scene").on("click", listenerClickMouseEvent);

        checkTimeInSeconds = setInterval(decreaseTime, 1000);
        chronometerTimeInMilliseconds = setTimeout(
            stopGame,
            timeInMilliseconds
        );
    }

    function listenerClickMouseEvent(event) {
        let mouseX = event.clientX;
        let mouseY = event.clientY;
        let alvoRect = $("#game_target")[0].getBoundingClientRect();

        if (
            mouseX >= alvoRect.left &&
            mouseX <= alvoRect.right &&
            mouseY >= alvoRect.top &&
            mouseY <= alvoRect.bottom
        ) {
            onTarget = true;
            updateScoreboard();
            changePositionTarget();

            soundMeow.play();
        } else {
            onTarget = false;
            updateScoreboard();
        }
    }

    function decreaseTime() {
        --timeInSeconds;
        $("#status_time").text(timeInSeconds);
    }

    function stopGame() {
        soundTheme.pause();

        $("#game_scene").off("click", listenerClickMouseEvent);

        clearInterval(checkTimeInSeconds);
        clearTimeout(chronometerTimeInMilliseconds);

        showPopup();
    }

    function showPopup() {
        $("#game_popup").modal({
            backdrop: "static",
            keyboard: false,
        });

        $("#game_popup__form_hits").val(hits);
        $("#game_popup__form_misses").val(misses);

        $("#game_popup").modal("show");
    }

    function changePositionTarget() {
        const cWidth = $("#game_scene").width();
        const cHeight = $("#game_scene").height();

        const aWidth = $("#game_target").width();
        const aHeight = $("#game_target").height();

        $("#game_target").css(
            "left",
            Math.floor(Math.random() * (cWidth - aWidth)) + "px"
        );
        $("#game_target").css(
            "top",
            Math.floor(Math.random() * (cHeight - aHeight)) + "px"
        );
    }

    function updateScoreboard() {
        $("#status_attempts").text(++attempts);

        if (onTarget) {
            $("#status_hits").text(++hits);
        } else {
            $("#status_misses").text(++misses);
        }
    }

    $("#game_btn-play").on("click", playGame);
});
