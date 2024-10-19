document.addEventListener('DOMContentLoaded', function() {
    const seeMoreLinks = document.querySelectorAll('.see-more');

    seeMoreLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Get data from clicked link
            const itemName = this.getAttribute('data-name');
            const itemDescription = this.getAttribute('data-description');

            // Populate the modal
            document.getElementById('modal-title').innerText = itemName;
            document.getElementById('modal-description').innerText = itemDescription;
        });
    });
});
