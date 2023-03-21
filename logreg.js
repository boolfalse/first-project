

$(document).ready(function(){

    setEqualHeight($('#loguser, #reguser'));

    $('#logbutton').click(function(){
        $('#loguser').slideUp('slow');
        $('#loguser').removeClass('show');
        $('#reguser').removeClass('hide');
        $('#reguser').slideDown('show');
    });
    $('#regbutton').click(function(){
        $('#reguser').slideUp('slow');
        $('#reguser').removeClass('show');
        $('#loguser').removeClass('hide');
        $('#loguser').slideDown('show');
    });
    
});

// ?????????????????????????????????????????????? xi chi ashxatum
function setEqualHeight(columns) {
    var tallestColumn = 0;
    var currentHeight;
    columns.each(function () {
        currentHeight = $(this).height();
        if(currentHeight > tallestColumn){
            tallestColumn = currentHeight;
        }
    });
    columns.height(tallestColumn);
}