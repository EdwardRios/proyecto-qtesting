const { setWorldConstructor } = require("cucumber");

class CustomWorld {
  constructor() {
    this.value = 0;
    this.fundsInitial = 0 
    this.fundsFinal = 0
    this.paginaPrincipal = "http://localhost:8000/formulario.php"
  }

  setFundsInitial(number) {
    this.fundsInitial = number;
  }
  setValue(number) {
    this.value = number;
  }
  setFundsFinal() {
    this.fundsFinal = parseInt(this.fundsInitial) + parseInt(this.value);
  } 
  setTo(number) {
    this.variable = number;
  }

  incrementBy(number) {
    this.variable += number;
  }
}

setWorldConstructor(CustomWorld);