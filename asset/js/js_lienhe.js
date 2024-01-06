const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const tabItemBtns = $$('.tab-contact-items');
const contactItems = $$('.box__contact-item');

tabItemBtns.forEach((tab, index) => {
    const contactItem = contactItems[index];

    tab.onclick = function () {
        $('.tab-contact-items.tabs-click').classList.remove('tabs-click');
        this.classList.add('tabs-click');

        $('.box__contact-item.active').classList.remove('active');
        contactItem.classList.add('active');
    }
})