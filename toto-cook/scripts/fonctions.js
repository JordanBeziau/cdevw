const burger = () => {
  document.querySelector("#burger").addEventListener("click", event => {
    event.target.classList.toggle("active_menu");
    menu.classList.toggle("active_menu");
  });
};
