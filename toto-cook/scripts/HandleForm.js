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

  check(event) {
    this.reset();
    this.inputs.map(input => {
      if (input.value === "") return this.setErrorField(input);
      if (input.name === "phone")
        if (!this.checkPhone(input.value)) return this.setErrorField(input);
      if (input.name === "post")
        if (!this.checkPost(input.value)) return this.setErrorField(input);
      return;
    });
    if (!this.error) event.target.submit();
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

  setErrorField(input) {
    input.classList.add("error");
    this.error = true;
    return;
  }
}
