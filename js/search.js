document.addEventListener('DOMContentLoaded', function () {
    console.log('DOM fully loaded and parsed');

    var searchIcon = document.getElementById('search-icon');
    if (searchIcon) {
        console.log('Search icon found');
        searchIcon.addEventListener('click', function (event) {
            event.preventDefault(); // Предотвращаем стандартное действие
            sessionStorage.setItem('focusSearchInput', 'true'); // Устанавливаем флаг в sessionStorage
            window.location.href = 'product.php'; // Перенаправляем на страницу каталога
        });
    } else {
        console.log('Search icon not found');
    }

    if (sessionStorage.getItem('focusSearchInput') === 'true') {
        console.log('Focus flag found in sessionStorage');
        sessionStorage.removeItem('focusSearchInput'); // Удаляем флаг
        var searchInput = document.getElementById('search-input');
        if (searchInput) {
            console.log('Search input found');
            // Сохраняем текущее положение прокрутки
            var x = window.scrollX, y = window.scrollY;
            // Устанавливаем фокус без прокрутки
            searchInput.focus();
            window.scrollTo(x, y); // Восстанавливаем положение прокрутки
        } else {
            console.log('Search input not found');
        }
    } else {
        console.log('Focus flag not found in sessionStorage');
    }
});