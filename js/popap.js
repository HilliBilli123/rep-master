const edits = document.querySelectorAll(".icon-edit")
edits.forEach(element => {
    element.addEventListener("click" , (e) =>{
        e.preventDefault()
        parrent = e.target.closest(".table__title")
        popap = parrent.querySelector(".popap__window")
        popap.style.display = "flex"
    })
    parrent = element.closest(".table__title")
    popapButton = parrent.querySelector(".popap__out")
    popapButton.addEventListener("click", (e) =>{
        parent = e.target.closest(".popap__window")
        parent.style.display = "none"
    })
}
)
windows = document.querySelectorAll(".popap__window")
windows.forEach(element =>{
    element.addEventListener("click", (e) =>{
        if(e.target.style.display === "flex"){
            e.target.style.display = "none"
        }
    })
})

const addButton = document.querySelector(".button__add")
const closes = document.querySelector(".buttons__add")
addButton.addEventListener("click",(e) =>{
    e.preventDefault()
    parrent = e.target.closest(".buttons__add")
    popap = parrent.querySelector(".popap__window")
    popap.style.display = "flex"
})
popap = closes.querySelector(".popap__window")
closeButton = popap.querySelector(".popap__out")
closeButton.addEventListener("click", () =>{
    popap.style.display = "none"
})