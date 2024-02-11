import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener('DOMContentLoaded', function () {
    var titleCells = document.querySelectorAll('.title-toggle .truncate');
    var descriptionCells = document.querySelectorAll('.description-toggle .truncate');

    titleCells.forEach(function (cell) {
        if (cell.scrollWidth > cell.clientWidth) {
            cell.addEventListener('click', function () {
                cell.classList.toggle('expanded');
            });
        }
    });

    descriptionCells.forEach(function (cell) {
        if (cell.scrollWidth > cell.clientWidth) {
            cell.addEventListener('click', function () {
                cell.classList.toggle('expanded');
            });
        }
    });
});

