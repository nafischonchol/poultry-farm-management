
//this is for only one image
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imgshow')
                .attr('src', e.target.result)
                .width(200)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

//this is for multiple image
function dynamic(input,id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        id="#"+id;
        
        console.log(id);
        reader.onload = function (e) {
            $(id)
                .attr('src', e.target.result)
                .width(200)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

//this is for multiple image
function shop_banner(input,id) {
    
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        id="#"+id;
        
        reader.onload = function (e) {
            $(id)
                .attr('src', e.target.result)
                .width(780)
                .height(400);
        };

        reader.readAsDataURL(input.files[0]);
    }
}