Feature: Gestion de la billetera

Scenario: Se tiene el acceso para consultar y mostrar los fondos de la billetera 
 Given La pagina principal
 When Carga la pagina principal
 Then Se debe mostrar los <fondos> de la billetera

Scenario: Llenado de monto y actualizacion de la billetera de los fondos de la billetera 
 Given El monto a llenar
 When Navego a la pagina del formulario
 When Lleno el campo de monto a adicionar
 When Hace click en el boton enviar
 Then Se debe mostrar el monto de la billetera actualizado