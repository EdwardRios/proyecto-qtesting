const { Given, When, Then } = require("cucumber");
const { expect } = require("chai");
const { Builder, By, Key, until } = require('selenium-webdriver');

const httpClient = require('request-promise')

let paginaPrincipal = "";
let httpOptions = {};

Given('La pagina principal', function () {
    paginaPrincipal = "http://localhost:8000"
  });

  When('Carga la pagina principal', async function () {
  chromeDriver = await new Builder().forBrowser('chrome').build();
  await chromeDriver.get('http://localhost:8080/ui');
  
  });
  Then('Se debe mostrar los <fondos> de la billetera', async function ($expected) {
    await chromeDriver.findElement(By.Id('monto')).getText().then(function (text) {
        showText = text;
      });
        except(showText).to.eql(expected) 
  });

