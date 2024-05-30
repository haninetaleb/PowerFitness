const wrapper = document.querySelector(".sliderWrapper");
const menuItems = document.querySelectorAll(".menuItem");

const wrapperr = document.querySelector(".SliderWrapper");
const menuItemss = document.querySelectorAll(".MenuItem");

const currentProductImg = document.querySelector(".productImg");
const currentProductLogo = document.querySelector(".productLogo");
const currentProductPrice = document.querySelector(".productPrice");
const currentProductFlavors = document.querySelector(".productFlavor");
const currentProductOverview = document.querySelector(".productOverview");
const currentProductSize = document.querySelector(".productSize");



const products = [
  {
    id: 1,
    price: 12000,
    description: `High protein content
    Muscle mass support
    Intensive taste premium solubility
    Added sugar free`,
    logo: "./Assets/Galvanize Logo.png",
  }
];


let chosenProduct = products[0]


//slider1
menuItems.forEach((item, index) => {
    item.addEventListener("click", () => {

      wrapper.style.transform = `translateX(${-100 * index}vw)`;
    });
});

//slider2
menuItemss.forEach((item, index) => {
  item.addEventListener("click", () => {

    wrapperr.style.transform = `translateX(${-100 * index}vw)`;

  });
});

//products details



