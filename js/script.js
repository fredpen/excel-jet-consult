

function register() {
    alert("how u doing ");

    $.post("includes/handlers/ajax/loveQuote.php", { quoteId: quoteId, userId: userId }, function (data) {
        if (data === "success") {
           console.log("data");
           
        } else if (data === "failure") {
            
        }
    });
    
}





$(document).ready(function () {

    console.log("we are here");
    
});
