const product = [
    {
      id: 0,
      image: 'image/p1.png',
      title: 'Z Flip Foldable Mobile',
      price: 120,
    },
    {
      id: 1,
      image: 'image/hh-2.jpg',
      title: 'Air Pods Pro',
      price: 60,
    },
    {
      id: 2,
      image: 'image/ee-3.jpg',
      title: '250D DSLR Camera',
      price: 230,
    },
    {
      id: 3,
      image: 'image/aa-1.jpg',
      title: 'Head Phones',
      price: 100,
    },
  ];
  
  const categories = [...new Set(product.map((item) => item.title))];
  let i = 0;
  
  document.getElementById('root').innerHTML = categories
    .map((item) => {
      var { image, title, price } = product.find((productItem) => productItem.title === item);
      return (
        `<div class='box'>
          <div class='img-box'>
            <img class='images' src="${image}">
          </div>
          <div class='bottom'>
            <p>${title}</p>
            <h2>Taka ${price}.00</h2>
            <button onclick='addtocart(${i})'>Add to cart</button>
          </div>
        </div>`
      );
    })
    .join('');
  
  var cart = [];
  
  function addtocart(a) {
    cart.push({ ...product[a] });
    displaycart();
  }
  
  function delElement(a) {
    cart.splice(a, 1);
    displaycart();
  }
  
  function displaycart() {
    document.getElementById('count').innerHTML = cart.length;
    if (cart.length == 0) {
      document.getElementById('cartItem').innerHTML = 'Your cart is empty';
      document.getElementById('total').innerHTML = 'Taka ' + 0 + '.00';
    } else {
      let total = 0;
      document.getElementById('cartItem').innerHTML = cart
        .map((items, j) => {
          var { image, title, price } = items;
          total += price;
          document.getElementById('total').innerHTML = 'Taka ' + total + '.00';
          return (
            `<div class='cart-item'>
              <div class='row-img'>
                <img class='rowimg' src="${image}">
              </div>
              <p style='font-size:12px;'>${title}</p>
              <h2 style='font-size: 15px;'>Taka ${price}.00</h2>
              <i class='fa-solid fa-trash' onclick='delElement(${j})'></i>
            </div>`
          );
        })
        .join('');
    }
  }
  