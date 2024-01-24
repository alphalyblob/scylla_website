/* CAROUSEL SEANCES */


const totalSeancesCount = document.getElementById('totalSeancesCount').textContent.trim();



const carousel = document.querySelector('.carousel__list');
const cells = carousel.querySelectorAll('.carousel__cell');

const cellWidth = carousel.offsetWidth;
const cellHeight = carousel.offsetHeight;
const cellSize = cellHeight;
const cellCount = totalSeancesCount;

const radius = Math.round((cellSize / 2) / Math.tan(Math.PI / cellCount));
const theta = 360 / cellCount;

let selectedIndex = 0;

function rotateCarousel() {
    const angle = theta * selectedIndex * -1;
    carousel.style.transform = 'translateZ(' + -radius + 'px) ' + 'rotateX(' + -angle + 'deg)';
    
    const cellIndex = selectedIndex < 0 ? (cellCount - ((selectedIndex * -1) % cellCount)) : (selectedIndex % cellCount);
    
    const cells = document.querySelectorAll('.carousel__cell');
    cells.forEach((cell, index) => {
        if(cellIndex === index) {
            if(!cell.classList.contains('selected'))
                cell.classList.add('selected');
        }
        else {
            if(cell.classList.contains('selected')) {
                cell.classList.remove('selected');
            }
        }
    });
}

function selectPrev() {
    selectedIndex--;
    rotateCarousel();    
}

function selectNext() {
    selectedIndex++;
    rotateCarousel();    
}

let prevButton = document.querySelector('.previous-button');
prevButton.addEventListener('click', selectPrev);

let nextButton = document.querySelector('.next-button');
nextButton.addEventListener('click', selectNext);

function initCarousel() {    
    for(let i = 0; i < cells.length; i++) {
        const cell = cells[i];
        const cellAngle = theta * i;
        cell.style.transform = 'rotateX(' + -cellAngle + 'deg) translateZ(' + radius + 'px)';
    }

    rotateCarousel();
}

initCarousel();



/* FIN CAROUSEL SEANCES */





/* CAROUSEL EVENEMENTS */

const totalEventsCount = document.getElementById('totalEventsCount').textContent.trim();

const carousel2 = document.querySelector('.carousel__list2');
const cells2 = carousel2.querySelectorAll('.carousel__cell2');

const cellWidth2 = carousel2.offsetWidth;
const cellHeight2 = carousel2.offsetHeight;
const cellSize2 = cellHeight2;
const cellCount2 = totalEventsCount;

const radius2 = Math.round((cellSize2 / 2) / Math.tan(Math.PI / cellCount2));
const theta2 = 360 / cellCount2;

let selectedIndex2 = 0;

function rotateCarousel2() {
    const angle2 = theta2 * selectedIndex2 * -1;
    carousel2.style.transform = 'translateZ(' + -radius2 + 'px) ' + 'rotateX(' + -angle2 + 'deg)';
    
    const cellIndex2 = selectedIndex2 < 0 ? (cellCount2 - ((selectedIndex2 * -1) % cellCount2)) : (selectedIndex2 % cellCount2);
    
    const cells2 = document.querySelectorAll('.carousel__cell2');
    cells2.forEach((cell2, index2) => {
        if(cellIndex2 === index2) {
            if(!cell2.classList.contains('selected'))
                cell2.classList.add('selected');
        }
        else {
            if(cell2.classList.contains('selected')) {
                cell2.classList.remove('selected');
            }
        }
    });
}

function selectPrev2() {
    selectedIndex2--;
    rotateCarousel2();    
}

function selectNext2() {
    selectedIndex2++;
    rotateCarousel2();    
}

let prevButton2 = document.querySelector('.previous-button2');
prevButton2.addEventListener('click', selectPrev2);

let nextButton2 = document.querySelector('.next-button2');
nextButton2.addEventListener('click', selectNext2);

function initCarousel2() {
    
    
    for(let j = 0; j < cells2.length; j++) {
        const cell2 = cells2[j];
        const cellAngle2 = theta2 * j;
        cell2.style.transform = 'rotateX(' + -cellAngle2 + 'deg) translateZ(' + radius2 + 'px)';
    }

    rotateCarousel2();
}

initCarousel2();

/* FIN CAROUSEL EVENEMENTS */