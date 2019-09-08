const { Given, When, Then } = require("cucumber");
const { expect } = require("chai");
const { Builder, By, Key, until } = require('selenium-webdriver');

const httpClient = require('request-promise')



Given('La pagina principal', function () {
    index = this.paginaPrincipal
  });

  When('Carga la pagina principal', async function () {
  chromeDriver = await new Builder().forBrowser('chrome').build();
  await chromeDriver.get(index);
  
  });
  Then('Se debe mostrar los fondos de la billetera', async function () {
    await chromeDriver.findElement(By.id('funds')).getText().then(function (text) {
        fundsText = text;
      });
        expect(fundsText).to.not.eql("") 
    await chromeDriver.quit();    
  });

