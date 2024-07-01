function likeVideo(button, videoId) {
    // Send a POST request to the server to like the video
    jQuery.post('ajax/likeVideo.php', {
        videoId: videoId
    }).done(function(data) {
        
        var likeButton = jQuery(button);
        var dislikeButton = jQuery(button).sibling('.dislikeButton');
        
        likeButton.addClass('active');
        dislikeButton.removeClass('active');
    });
}
