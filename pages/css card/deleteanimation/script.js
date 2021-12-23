
const parent = function (el, match, last) {
    var result = [];
    for (var p = el && el.parentElement; p; p = p.parentElement) {
        result.push(p);
        if (p.matches(match)) {
            break;
        }
    }
    if (last == 1) {
        return result[result.length - 1];
    } else {
        return result;
    }
};

document.querySelector('.reset-button').addEventListener('click', function (e) {
    document.querySelectorAll('.item').forEach(function (item) {
        if (item.classList.contains('shred')) {
            item.setAttribute('class', 'item shred');
        } else {
            item.setAttribute('class', 'item');
        }
        document.querySelectorAll('.animation-assets > div').forEach(function (item) {
            item.remove();
        });
    })
});

document.querySelectorAll('.delete').forEach(function (item) {
    item.addEventListener('click', function (e) {
        let newClass = this.getAttribute('data-delete');
        let getParent = parent(this, '.item', 1);
        if (newClass === 'shredder') {
            getParent.classList.add('shredding');
            // Shredder animation
            // Slices
            let shredAmount = 10;
            let width = document.querySelector('.item.shred').getBoundingClientRect().width / shredAmount;
            let animationName = 'spinALittle';
            let animationDelay = 0;
            for (let x = 0; x <= shredAmount; ++x) {
                animationDelay += 1;
                if (x % 2 === 0) {
                    animationName = 'spinALittleAlt';
                } else {
                    animationName = 'spinALittle';
                }
                if (x % 3 === 0) {
                    animationDelay = 0;
                }
                let newEl = document.createElement('div');
                newEl.classList.add('item-wrap');
                newEl.innerHTML = `<div class="item">${getParent.innerHTML}</div>`;
                newEl.querySelector('.animation-assets').innerHTML = '';
                let clip = `clip-path: inset(0px ${(shredAmount - x - 1) * width}px 0 ${(x * width)}px); animation-delay: 0.${animationDelay}s; transform-origin: ${x * width}px 125px; animation-name: ${animationName};`
                newEl.children[0].setAttribute('style', clip);
                getParent.querySelector('.animation-assets').append(newEl);
            }
        } else {
            getParent.classList.add(newClass);
        }
    });
});
