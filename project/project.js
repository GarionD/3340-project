// this js is to load common template options on pages
window.addEventListener('DOMContentLoaded', () =>
{
    // check if the local variables to flag the common template modes have been switched
    if (localStorage.getItem('darkMode') === 'true')
    {
        document.body.classList.add('dark-mode');
    }
    if (localStorage.getItem('altFont') === 'true')
    {
        document.body.classList.add('alt-font');
    }
    if (localStorage.getItem('bold') === 'true')
    {
        document.body.classList.add('bold-font');
    }
});

// toggle dark mode
function toggleDarkMode()
{
    // update current page
    document.body.classList.toggle('dark-mode');
    // save change to local storage to update future pages
    localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
}

// toggle alternate font
function toggleFont()
{
    // update current page
    document.body.classList.toggle('alt-font');
    // save change to local storage to update future pages
    localStorage.setItem('altFont', document.body.classList.contains('alt-font'));
}

// toggle scaled font weight
function toggleFontWeight()
{
    // update current page
    document.body.classList.toggle("bold-font");
    // save change to local storage to update future pages
    localStorage.setItem('bold', document.body.classList.contains('bold-font'));
}

