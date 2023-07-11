import axios from "axios";

let jsLikeLinks = document.querySelectorAll('a.like-dislike');

jsLikeLinks.forEach((link) => {
    link.addEventListener('click', onclickBtnLike);
});

function onclickBtnLike(event)
{
    event.preventDefault();

    const url = this.href;
    const icone = this.querySelector('i');

    axios.get(url)
        .then((response) => {
          console.log(response);
            if (icone.classList.contains('fa-heart')) {
                icone.classList.replace('fa-heart', 'fa-heart-o');
            } else {
                icone.classList.replace('fa-heart-o', 'fa-heart');
            }
        })
        .catch((error) => {
            if (error.response.status === 403) {
                window.alert('You must be connected to like');
            } else if (error.response.status === 404) {
                window.alert('Error');
            }
        })
    ;
}
