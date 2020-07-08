/*
    This function assists in changing the text of 
    a button to match the text inside a drop down menu
    Can be seen in action when you approve or decline a submission
*/
function changeButtonText(id_of_Text, id_button) {
    var select = document.getElementById(id_of_Text);
    select = select.options[select.selectedIndex].text;
    var button = document.getElementById(id_button);
    button.textContent = select;
}
/* Needed to make project read only blades. 
    Assists on the show view.
    This helps in recycling Blade code.
    Assists in automata
    Makes everything readonly and enables specific button groups
*/
function make_project_readonly() {
    $("#showHolder :input").attr("readonly", true); //Make read only everything, #showHolder holds all show blade view
    $("#showHolder button").prop("disabled",true);
    //Enable back these buttons
    $("#buttonHolder :input").prop("disabled", false); // all buttons on this div
    $("#toggleMapButton").prop("disabled", false);
}

function remove_readonly(element){
    $("#"+element).prop("readonly",false)
}

function display4To10(name){
    if($('select[name="'+name +'"]').val() == 1) {
        $('#4To10Holder').attr("hidden",false);
    }else{
        $('#4To10Holder').attr("hidden",true);
    }
}

const toggleTA = (name) => {
    if($('input[name="'+ name +'"]').is(':checked')) {
        console.log('checked');
        $('textarea[name="description_'+ name +'"]').show();
    }else{
        console.log('not checked');
        $('textarea[name="description_'+ name +'"]').hide();
    }
};

const displayBox = (name) => {
    if($('select[name="'+name +'"]').val() == 1) {
        $('textarea[name="description_' + name +'"]').show();
    }
    else {
        $('textarea[name="description_' + name +'"]').hide();
    }
};