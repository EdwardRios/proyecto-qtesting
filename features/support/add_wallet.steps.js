const { Given, When, Then } = require("cucumber");
const { expect } = require("chai");
const { Builder, By, Key, until } = require('selenium-webdriver');
let inputFunds = 0


Given('El monto a llenar', function () {
        inputFunds = 50
  });

  When('Navego a la pagina del formulario', async function () {
    chromeDriver = await new Builder().forBrowser('chrome').build();
    await chromeDriver.get('http://localhost:8080/ui');
  });

  When('Lleno el campo de monto a adicionar',async function () {
    await chromeDriver.findElement(By.Id('add')).sendKeys(inputFunds);
  });

  When('Hace click en el boton enviar', async function () {
    await chromeDriver.findElement(By.Id('button-add')).click();
  });
  Then('Se debe mostrar el monto de la billetera actualizado', async function (inputFunds) {
    await chromeDriver.findElement(By.Id('label-monto'))
    .getText().then(function (text) {
      showText = text;
    });

  expect(showText).to.eql(inputFunds);
  });