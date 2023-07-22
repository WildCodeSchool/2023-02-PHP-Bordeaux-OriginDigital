import axios from "axios";

function onclickBtnLike(event)
{
    event.preventDefault();

    const url = event.currentTarget;
    const link = url.href

    let btLike = document.querySelector('.ws-btn-like-fav-pg');

    axios.get(link)
        .then((response) => {
            const favIcon = url.firstElementChild
            if (favIcon.classList.contains('yellow-star-like')) {
                favIcon.classList.replace('yellow-star-like', 'white-star-like');
                if (btLike) {
                    btLike.style.display = "none";
                }
            } else {
                favIcon.classList.replace('white-star-like', 'yellow-star-like');
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
