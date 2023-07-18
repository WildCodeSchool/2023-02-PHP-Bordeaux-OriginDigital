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

    let btLike = document.querySelector('.ws-btn-like-fav-pg');

    axios.get(url)
        .then((response) => {
            if (icone.classList.contains('yellow-star-like')) {
                icone.classList.replace('yellow-star-like', 'white-star-like');
                if (btLike) {
                    btLike.style.display = "none";
                }
            } else {
                icone.classList.replace('white-star-like', 'yellow-star-like');
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
window.onclickBtnLike = onclickBtnLike
