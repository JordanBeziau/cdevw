const burger = () => {
  document.querySelector("#burger").addEventListener("click", event => {
    event.target.classList.toggle("active_menu");
    menu.classList.toggle("active_menu");
  });
};

const getAsyncCompletionData = value => {
  const dataContainer = document.querySelector("#autoCompletion");
  const xhr = new XMLHttpRequest();

  // Watch server response
  xhr.onreadystatechange = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      dataContainer.innerHTML = xhr.responseText;
      Array.from(document.querySelectorAll("#autoCompletion li")).forEach(
        element => {
          element.addEventListener("click", event => {
            document.querySelector(
              "#inscription_form input[name=post]"
            ).dataset.post =
              event.target.value;
            document.querySelector("#inscription_form input[name=post]").value =
              event.target.innerHTML;
            dataContainer.innerHTML = "";
          });
        }
      );
    }
  };

  xhr.open("POST", "async_region_data.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(`region=${value}`);
};
