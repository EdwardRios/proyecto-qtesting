const { Given, When, Then } = require("cucumber");
const { expect } = require("chai");
const { Builder, By, Key, until } = require('selenium-webdriver');

  Given('El monto a llenar', function () {
        this.setValue(50)
  });

  When('Navego a la pagina del formulario', async function () {
    chromeDriver = await new Builder().forBrowser('chrome').build();
    await chromeDriver.get(this.paginaPrincipal);
    await chromeDriver.findElement(By.id('funds')).getText().then(function (text) {
      fundsInitial = text;
    });
    this.setFundsInitial(fundsInitial)
  });

  When('Lleno el campo de monto a adicionar',async function () {
    await chromeDriver.findElement(By.id('value')).sendKeys(this.value);
  });

  When('Hace click en el boton enviar', async function () {
    await chromeDriver.findElement(By.id('button-add')).click();
  });
  Then('Se debe mostrar el monto de la billetera actualizado', async function () {
    await chromeDriver.findElement(By.id('funds')).getText().then(function (text) {
       fundsFinal = text;
    });
    this.setFundsFinal()    
    expect(parseInt(fundsFinal)).to.eql(this.fundsFinal);   
    await chromeDriver.quit();        
  });
