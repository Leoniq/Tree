function createRoot() {
    var createButton = $("#create-button").val();
    $.ajax({
        url: "handling.php",
        type: "POST",
        data: ({ createButton: createButton }),
        dataType: "html",
        success: function() {
            $("#result-output").load("index.php #result-output");
        }
    });
}

function addNode(button) {
    $.ajax({
        url: "handling.php",
        type: "POST",
        data: ({ addNode: button.id }),
        dataType: "html",
        success: function() {
            $("#result-output").load("index.php #result-output");
        }
    });
}

function delNode(button) {
    var x = 20,
        timer;

        $('#main-popup').show();
        funcTimer();

        function funcTimer(){
            $('#timer').html(x);
            x--;
            if(x<0){
                $('#main-popup').hide();
                clearTimeout(timer);
                $("#result-output").load("index.php #result-output");
                button = false;
            } else {
                timer = setTimeout(funcTimer, 1000);
            }
        }

        $(".closePopup").each(function() {
            $(this).on("click", function() {
                $('#main-popup').hide();
                clearTimeout(timer);
            });
        });

        $("#delNode").on("click", function() {
            $.ajax({
                url: "handling.php",
                type: "POST",
                data: ({ delNode: button.id }),
                dataType: "html",
                success: function() {
                    $('#main-popup').hide();
                    clearTimeout(timer);
                    $("#result-output").load("index.php #result-output");
                }
            });     
        });
}
