document.addEventListener('DOMContentLoaded', function() {
    let page = 1;
    let isLoading = false;

    function loadMoreFeed() {
        if (isLoading) return;
        console.log('Loading more feed...');
        isLoading = true;
        page++;
        fetch(`/CHiM/controllers/handlers/load_more_feed.php?page=${page}`)
            .then(response => response.text())
            .then(data => {
                if (data.trim() !== "") {
                    document.querySelector('.feed-background').insertAdjacentHTML('beforeend', data);
                    isLoading = false;
                } else {
                    window.removeEventListener('scroll', onScroll);
                }
            })
            .catch(error => {
                console.error('Error fetching more feed:', error);
                isLoading = false;
            });
    }

    function onScroll() {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 500) {
            loadMoreFeed();
        }
    }

    window.addEventListener('scroll', onScroll);
});
