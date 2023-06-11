const inputs = document.getElementsByTagName('input');
let placeholders = {};

document.body.addEventListener('onload',() => inputs.forEach(e => placeholders[e.id] = e.getAttribute('placeholder')));

for (let i = 0; i < inputs.length; i++) {
    let input = inputs[i];

    //input.setAttribute('placeholder', '')

    //input.addEventListener('focusout', () => this.setAttribute('placeholder', ''));

    //input.addEventListener('focus', () => this.setAttribute('placeholder',placeholders[this.id]));
}