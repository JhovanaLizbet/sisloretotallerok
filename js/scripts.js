function changeColor(element) {
    // Remueve la clase "clicked" de todos los elementos de la lista
    const menuItems = document.querySelectorAll('li');
    menuItems.forEach(item => item.classList.remove('clicked'));

    // Agrega la clase "clicked" al elemento que se hizo clic
    element.classList.add('clicked');
}
