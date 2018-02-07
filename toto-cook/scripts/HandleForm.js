class HandleForm {
  constructor() {
    // Init
    this.error = false;
    // Get data
    this.inputs = Array.from(
      document.querySelectorAll(
        "#inscription_form input:not([type=radio]):not([type=submit])"
      )
    );
  }

  check() {
    this.reset();
    this.inputs.map(input => {
      if (input.value === "") {
        input.classList.add("error");
        this.error = true;
        return;
      }
      if (input.name === "phone") if (this.checkPhone(input.value)) return;
      if (input.name === "post") if (this.checkPost(input.value)) return;
      input.classList.add("error");
      this.error = true;
      return;
    });
  }

  reset() {
    this.inputs.map(input => {
      if (input.classList.contains("error")) input.classList.remove("error");
      this.error = false;
    });
  }

  checkPhone(string) {
    const check = new RegExp("^0[0-9][ .-]?([0-9]{2}[ .-]?){3}[0-9]{2}$");
    return check.test(string);
  }

  checkPost(string) {
    const check = new RegExp("^[0-9]{5}$");
    return check.test(string);
  }
}
