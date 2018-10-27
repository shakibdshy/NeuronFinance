(function($){

    $(document).ready(function() {
        $('button#media_image').on("click", function (e) { 
            e.preventDefault();
            

            var imageUploader = wp.media({
                'title': 'Upload Image',
                'button':{
                    'text': 'Set the Image',
                    'multiple': false,
                }
            });
            imageUploader.open();

            imageUploader.on("select", function(){
               var image = imageUploader.stat().get("selection").first().toJSON();

               var image_link = image.url;

                $("input.image").val(image_link);
                $(".image_show img").attr('src', link);
            });

        });
    });



}(jQuery))
