/**
 * Created by eric on 7/22/14.
 */
var gallery = function(){

};

gallery.prototype.goToGalleryPage = function(albumName){
    window.location = '/galleries?galleryName='+albumName;
}

$(document).ready(function(){
    $('.content').on("click",".photoGallery", function(){
        gallery.prototype.goToGalleryPage($(this).attr('data-gallery-name'))
    })
})

