Feature: Mostrar fondos a la billetera

Scenario: Se tiene el acceso para consultar los fondos de la billetera 
 Given La pagina principal
 When Carga la pagina principal
 Then Se debe mostrar los <fondos> de la billetera