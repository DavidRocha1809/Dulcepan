function searchContent(event) {
    event.preventDefault();
    const query = document.getElementById('search-input').value.toLowerCase();
    const content = document.getElementById('content');
    const paragraphs = content.getElementsByTagName('p');
    
    // Remove previous highlights
    for (const paragraph of paragraphs) {
        paragraph.innerHTML = paragraph.textContent;
    }

    // Highlight new search results
    if (query) {
        for (const paragraph of paragraphs) {
            const text = paragraph.textContent.toLowerCase();
            if (text.includes(query)) {
                const regex = new RegExp(`(${query})`, 'gi');
                paragraph.innerHTML = paragraph.textContent.replace(regex, '<span class="highlight">$1</span>');
            }
        }
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const menuIcon = document.querySelector('.fa-bars');
    const menu = document.querySelector('.menu');

    menuIcon.addEventListener('click', function() {
        menu.classList.toggle('show');
    });
});

$(document).ready(function(){
    $('.container-options span:first').addClass('active');
    $('.container-products').hide();
    $('.container-products:first').show();

    $('.container-options span').click(function(){
        $('.container-options span').removeClass('active');
        $(this).addClass("active");
        $('.container-products').hide();

        var activeTab = $(this).data('target');
        $(activeTab).show();
        return false;
        
    })
});

function searchContent(event) {
    event.preventDefault();
    const query = document.getElementById('search-input').value.toLowerCase();
    const content = document.getElementById('content');
    const paragraphs = content.getElementsByTagName('p');
    
    // Remove previous highlights
    for (const paragraph of paragraphs) {
        paragraph.innerHTML = paragraph.textContent;
    }

    // Highlight new search results
    if (query) {
        for (const paragraph of paragraphs) {
            const text = paragraph.textContent.toLowerCase();
            if (text.includes(query)) {
                const regex = new RegExp(`(${query})`, 'gi');
                paragraph.innerHTML = paragraph.textContent.replace(regex, '<span class="highlight">$1</span>');
            }
        }
    }
}
