document.addEventListener('DOMContentLoaded', function () {
    console.log('DOM fully loaded and parsed');

    var searchIcon = document.getElementById('search-icon');
    if (searchIcon) {
        console.log('Search icon found');
        searchIcon.addEventListener('click', function (event) {
            event.preventDefault(); // ������������� ����������� ��������
            sessionStorage.setItem('focusSearchInput', 'true'); // ������������� ���� � sessionStorage
            window.location.href = 'product.php'; // �������������� �� �������� ��������
        });
    } else {
        console.log('Search icon not found');
    }

    if (sessionStorage.getItem('focusSearchInput') === 'true') {
        console.log('Focus flag found in sessionStorage');
        sessionStorage.removeItem('focusSearchInput'); // ������� ����
        var searchInput = document.getElementById('search-input');
        if (searchInput) {
            console.log('Search input found');
            // ��������� ������� ��������� ���������
            var x = window.scrollX, y = window.scrollY;
            // ������������� ����� ��� ���������
            searchInput.focus();
            window.scrollTo(x, y); // ��������������� ��������� ���������
        } else {
            console.log('Search input not found');
        }
    } else {
        console.log('Focus flag not found in sessionStorage');
    }
});