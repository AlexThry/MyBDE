const searchInput = document.querySelector('#search-custom');

searchInput.addEventListener('input', function() {
    console.log(searchInput.value);
    const searchValue = searchInput.value.toLowerCase();

    const userRows = document.querySelectorAll('.user-row');

    userRows.forEach(function(row) {
        const userName = row.querySelector('td:first-child').textContent.toLowerCase();

        if (!userName.includes(searchValue)) {
            row.style.display = 'none';
        } else {
            row.style.display = '';
        }
    });
});
