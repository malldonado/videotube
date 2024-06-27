function likeVideo(button, videoId) {
    // Send a POST request to the server to like the video
    jQuery.post('ajax/likeVideo.php', {
        videoId: videoId
    }).done(function(data) {
        // Update the button text with the new number of likes
        button.innerText = data.likes;
        // Toggle the 'liked' class on the button
        button.classList.toggle('likeButton--liked');
    });
}
