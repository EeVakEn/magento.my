document.addEventListener("DOMContentLoaded", function (event) {
    const searchButton = document.querySelector('.search-link')
    const popupSearch = document.querySelector('.search-box')
    let isShow = false

    searchButton.addEventListener('click', (e) => {
        e.preventDefault()
        if (isShow === false) {
            popupSearch.classList.add('show')
            searchButton.style.setProperty("--display", "inline-block")
            isShow = true
        } else {
            popupSearch.classList.remove('show')
            searchButton.style.setProperty("--display", "none")
            isShow = false
        }
    })

    document.addEventListener("mouseup", (e)=>{
        if(e.target!==popupSearch && popupSearch.hasAttribute(e.target).length===0){
            popupSearch.classList.remove('show')
            searchButton.style.setProperty("--display", "none")
            isShow = false
        }
    })
});

