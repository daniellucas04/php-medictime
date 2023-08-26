const medicationItemCard = document.querySelectorAll(".medication-item");
const editCard = document.querySelectorAll(".edit-card");

function mouseOnItem(id){
  editCard[id].classList.toggle("animation-edit");
}

medicationItemCard.forEach((item, idx) => {
  item.addEventListener("click", () => mouseOnItem(idx));
})