# function_collection
Pequeña colección de funciones hechas para PHP que abarcan varias pequeñas tareas en las que se pueden utilizar, solo basta seguir sus instrucciones

## Uso 🚀

Para utilizarlas solo se debe copiar la función deseada y pegarla dentro del proyecto, pero si se desea importar el archivo directamente se debe hacer lo siguiente:

- Pegar el archivo en la carpeta donde se guardan las funciones
- Agregar el archivo a trabes de un include o similar

```php
require_once 'ruta/archivo.php';
```

De forma alternativa se puede agregar seguridad al agregar este archivo. para esto debes agregar la siguiente linea antes del include que agregaste anteriormente

```php
define('XMBCXRXSKGC', 1);
```

Esta linea es una variable global que se ejecuta solo del lado servidor, la cual es validada al comienzo de cada archivo de esta coleccion de funciones, si no deseas utilizarlo, solo debes borrarlo del principio de cada archivo

```php
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo (Access Code 1003-004).');
}
```

## Licencia 📄
Este proyecto está bajo la Licencia GPL-3.0 license - ve el archivo [LICENSE](LICENSE) para detalles

## Contacto 📖
Puedes contactarte conmigo a traves de cualquier de los siguientes canales:
- [Github](https://github.com/tenshi98)
- [Linkedin](https://www.linkedin.com/in/victor-reyes-galvez/)
- [Portafolio](https://tenshi98.github.io/portafolio/)
- [Mi Web](https://web.digitalcreations.cl/)

## Contribuciones 🎁
Estamos agradecidos por las contribuciones de la comunidad a este proyecto. Si encontraste cualquier valor en este proyecto o quieres contribuir, aquí está lo que puedes hacer:

- Comparte este proyecto con otros
- Invítame un café ☕
- Inicia un nuevo problema o contribuye con un PR
- Muestra tu agradecimiento diciendo gracias en un nuevo problema.

---

⌨️ por [Victor Reyes](https://github.com/tenshi98) 😊
