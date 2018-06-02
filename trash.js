
var subscription_object = {maxRows:5, x:1};

jQuery("#add").click(function ($) {
    
       
    if(subscription_object.x <= subscription_object.maxRows) {
        var html = '<div>name: <input type="text" name="name" id="childname">age: <input type="text" name="age" id="childage">height: <input type="text" name="height" id="childheight"><a href="#" class="remove">X</a></div'; 
        jQuery( html ).insertBefore( jQuery( "#add" ) );        
    }
    subscription_object.x++;
    
}); 
//Remove rows from the form 
$("#canal-walk-kids-newsletter-subscription").on('click', '.remove', function (e) {
    e.preventDefault();
    $(this).parent('div').remove();
    subscription_object.x--;
});


////Populate values from the first row 
$("#container").on('dblclick', '#childname', function (e) {
    $(this).val($('#name').val());
});




