/**
 * Created by eric on 8/22/14.
 */
var albumObject = function(){};

albumObject.prototype.showSelectedAlbum = function(element){
    var albumName = element.attr('data-album-name');
    this.hideUnselectedAlbums();
    $('.songListings article.albumContainer[data-album-name="'+albumName+'"]').show();
};

albumObject.prototype.hideUnselectedAlbums = function(){
    $('article.albumContainer').hide();
};

albumObject.prototype.unHighlightSelectedAlbum = function(){
    $('.albumCovers').css({borderColor:'#000000'})
};

albumObject.prototype.highlightSelectedAlbum = function(element){
    element.css({borderColor:'#ff0000'})
};

$(document).ready(function(){
    $('.albumCovers').click(function(){
        albumObject.prototype.unHighlightSelectedAlbum();
        albumObject.prototype.highlightSelectedAlbum($(this));
        albumObject.prototype.showSelectedAlbum($(this));
    })
})