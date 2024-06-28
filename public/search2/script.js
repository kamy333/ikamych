document.addEventListener('DOMContentLoaded', () => {
    const searchBox = document.getElementById('search-box');
    const itemList = document.getElementById('item-list');
    const items = itemList.getElementsByTagName('li');
    let currentIndex = -1;

    searchBox.addEventListener('input', () => {
        const filter = searchBox.value.toLowerCase();
        currentIndex = -1;

        for (let i = 0; i < items.length; i++) {
            const item = items[i];
            const text = item.textContent || item.innerText;

            if (text.toLowerCase().includes(filter)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }

            item.classList.remove('highlight');
        }
    });

    searchBox.addEventListener('keydown', (e) => {
        const visibleItems = Array.from(items).filter(item => item.style.display !== 'none');

        if (e.key === 'ArrowDown') {
            e.preventDefault();
            if (visibleItems.length > 0) {
                currentIndex = (currentIndex + 1) % visibleItems.length;
                updateHighlight(visibleItems);
            }
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            if (visibleItems.length > 0) {
                currentIndex = (currentIndex - 1 + visibleItems.length) % visibleItems.length;
                updateHighlight(visibleItems);
            }
        } else if (e.key === 'Enter') {
            e.preventDefault();
            if (currentIndex >= 0 && currentIndex < visibleItems.length) {
                searchBox.value = visibleItems[currentIndex].textContent;
                clearHighlights();
                itemList.style.display = 'none';  // Hide the list after selection
            }
        }
    });

    itemList.addEventListener('click', (e) => {
        if (e.target.tagName === 'LI') {
            searchBox.value = e.target.textContent;
            clearHighlights();
            itemList.style.display = 'none';  // Hide the list after selection
        }
    });

    function updateHighlight(visibleItems) {
        clearHighlights();
        if (visibleItems.length > 0 && currentIndex >= 0) {
            visibleItems[currentIndex].classList.add('highlight');
        }
    }

    function clearHighlights() {
        Array.from(items).forEach(item => item.classList.remove('highlight'));
    }
});

